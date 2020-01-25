<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use function mysql_xdevapi\getSession;

class SecurityController extends AbstractController
{
    private $user ;
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils,Request $request): Response
    {

        $user = $this->getUser();
        if ($user) {
            if($user->getRegistred())
                return  $this->redirectToRoute("home");

            return $this->redirectToRoute("app_checkin");
        }
        $attempt = 0;
        $attemptfull = false;
   $refer = $request->headers->get("referer");
           if(strpos($refer,"/login")) {
               $attempt = (int)$request->cookies->get("attempt") ?? 0;
               if (!($attemptfull = (int)$request->cookies->get("attempt") < 2 ? false : true) || $attempt = 0)
                   $attempt++;
               $a = $attempt;
           }
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $cp =$request->cookies->get('mac')??$request->cookies->get('buckup')??false;

        return $request->isXmlHttpRequest()? new Response("/login","400") :$this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error,
            "macAdress"=>$request->cookies->get('mac')??$request->cookies->get('buckup')??false,
            "attemptfull" => $attemptfull,
            "attempt"=>$attempt
            ]);
    }


    /**
     * @Route("/checkin", name="app_checkin")
     */
    public function checkin(Request $request,UserPasswordEncoderInterface $passwordEncoder) :Response
    {
        if($request->isMethod("POST") && $this->isCsrfTokenValid("checkin",$request->get("_csrf_token")))
            if(!($user = $this->getUser())->getRegistred())
                if ($passwordEncoder->isPasswordValid($user, $request->get("oldPassword")))
                    if ($request->get("newPassword") == $request->get("confirmPassword")) {
                        $user->setPassword($passwordEncoder->encodePassword($user, $request->get("newPassword")));
                        $user->setRegistred(true);
                        $user->addRole("ROLE_REGISTRED");
                        $user->setConnection(0);
                        $this->getDoctrine()->getManager()->persist($user);
                        $this->getDoctrine()->getManager()->flush();
                        $this->get('security.token_storage')->setToken(null);
                        $this->get('session')->invalidate();
                        $tmp  = $request->cookies->get("tmp");
                        $response = $this->render("security/activate.html.twig",[
                            "mac" =>  $tmp
                        ]);
                        $time = time() + (3600 * 24 * 730);
                        $response->headers->setCookie(new Cookie("mac",$tmp,$time));
                        $request->cookies->remove("tmp");
                        return $response;
                    }

            if($this->getUser())
                if($this->getUser()->getRegistred())
                return $this->redirectToRoute("app_login");







        return $request->isXmlHttpRequest()? new Response("/login","400") :$this->render('security/index.html.twig');
    }



    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }


    /**
     * @Route("/", name="app_home")
     */
    public function home(){
        return $this->redirectToRoute("app_login");
    }
}
