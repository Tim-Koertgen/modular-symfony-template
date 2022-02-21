<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\UserLogin\Communication\Controller;

use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('admin');
        }

        $error        = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            '@EasyAdmin/page/login.html.twig',
            [
                // parameters usually defined in Symfony login forms
                'error'                => $error,
                'last_username'        => $lastUsername,

                // OPTIONAL parameters to customize the login form:

                // the translation_domain to use (define this option only if you are
                // rendering the login template in a regular Symfony controller; when
                // rendering it from an EasyAdmin Dashboard this is automatically set to
                // the same domain as the rest of the Dashboard)
                'translation_domain'   => 'messages',

                // the title visible above the login form (define this option only if you are
                // rendering the login template in a regular Symfony controller; when rendering
                // it from an EasyAdmin Dashboard this is automatically set as the Dashboard title)
                //'page_title' => 'Admin Login',

                // the string used to generate the CSRF token. If you don't define
                // this parameter, the login form won't include a CSRF token
                'csrf_token_intention' => 'authenticate',

                // the URL users are redirected to after the login (default: '/admin')
                'target_path'          => $this->generateUrl('admin'),

                // the label displayed for the username form field (the |trans filter is applied to it)
                'username_label'       => 'Email',

                // the label displayed for the password form field (the |trans filter is applied to it)
                'password_label'       => 'Password',

                // the label displayed for the Sign In form button (the |trans filter is applied to it)
                'sign_in_label'        => 'Sign in',

                // the 'name' HTML attribute of the <input> used for the username field (default: '_username')
                'username_parameter'   => 'email',

                // the 'name' HTML attribute of the <input> used for the password field (default: '_password')
                'password_parameter'   => 'password',
            ]
        );
    }

    #[Route('/logout', name: 'logout')]
    public function logout()
    {
        throw new LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
