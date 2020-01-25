<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        // ...
        $user = $this->security->getUser();

        return new Response("<h1> Access Denied </h1>", 403);
    }
}