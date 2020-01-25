<?php


namespace App\Security;


use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use App\Entity\User;
class logoutListener implements LogoutHandlerInterface
{

    private $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * This method is called by the LogoutListener when a user has requested
     * to be logged out. Usually, you would unset session variables, or remove
     * cookies, etc.
     */
    public function logout(Request $request, Response $response, TokenInterface $token)
    {
       /* if(!isset($request->headers->get("Referer")))
            return;*/
       $refere = $request->headers->get("referer");
       if (is_null($refere))
           throw new Exception("can't call this url manulay");
        $user = $token->getUser();
        $connection = $user->getConnection();
        $user->setConnection($connection==0?0:--$connection);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        // $this->entityManager->getRepository(User::class)
       // ->entityManager->persist($user)->flush();
 $k= 5;




    }
}