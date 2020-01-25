<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class AnocAuthenticationAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    private $entityManager;
    private $urlGenerator;
    private $csrfTokenManager;
    private $passwordEncoder;
    private  $request;
    private  $security;
    public function __construct(Security $security,UserPasswordEncoderInterface $passwordEncoder,EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->security = $security;
    }

    public function supports(Request $request)
    {
   $usr = $this->security->getUser();
        return 'app_login' === $request->attributes->get('_route')
            && $request->isMethod('POST');


    }

    public function getCredentials(Request $request)
    {
        $credentials = [
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token'),
            'mac' =>$request->request->get('mac'),
            "macCookie" => $request->cookies->get('mac'),
            "macbuckupCookie" =>$request->cookies->get("buckup")
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['email']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $credentials['email']]);
        /*$en = $this->passwordEncoder->encodePassword($user,"123");
        $user->setPassword($en);*/

        if (!$user) {
            // fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('mot de passe ou e-mail incorrect');
        }

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // Check the user's password or other credentials and return true or false
        // If there are no credentials to check, you can just return true
       //$passwd =  $this->passwordEncoder->encodePassword($user,"123");

        if(!$user->getRegistred())
            $macAdress = $credentials["mac"];

        if($user->getRegistred() || is_null($credentials["mac"]))
        $macAdress = $credentials["macCookie"]??$credentials["macbuckupCookie"]??"MArgoumAYOUBIStheCreAtorOfthiSSycuritySyStemlionViskame007A544a4e4ca@192.168.1.10";
        if($macAdress=="MArgoumAYOUBIStheCreAtorOfthiSSycuritySyStemlionViskame007A544a4e4ca")
            throw new CustomUserMessageAuthenticationException("Cet utilisateur est deja enregistre cette mac address");
        if(($connection = $user->getConnection() + 1)>$user->getConnectionallowed())
            throw  new CustomUserMessageAuthenticationException("Ce compte est déjà connecté sur une autre appareil");
        if(!$user->getActif())
            throw  new CustomUserMessageAuthenticationException("Votre compte est desactivé");
        if(!$this->passwordEncoder->isPasswordValid($user, $credentials['password']))
            throw  new CustomUserMessageAuthenticationException("Mot de passe ou e-mail incorrect");
        if(!in_array($macAdress,$user->getMacs()))
        throw  new CustomUserMessageAuthenticationException("Address mac est incorrect");

        $encod = $this->passwordEncoder->isPasswordValid($user, $credentials['password'])  && $user->getActif()  &&
            $user->getConnection() <= $user->getConnectionallowed() && in_array($macAdress,$user->getMacs());
        return $encod;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $u = $token->getUser();
        $conection = $u->getConnection();
        $conection++;
        $u->setConnection($conection) ;
        if($conection<= $u->getConnectionallowed()) {
            $this->entityManager->persist($u);
            $this->entityManager->flush();
            if (!$u->getRegistred())
                return new RedirectResponse("/checkin");
            if($request->getPathInfo() =="/login")
                return new RedirectResponse("/login");
            if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey))
                return new RedirectResponse($targetPath);
        }
        return new RedirectResponse("/login");



        // For example : return new RedirectResponse($this->urlGenerator->generate('some_route'));
        throw new \Exception('TODO: provide a valid redirect inside');
    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate('app_login');
    }

}
