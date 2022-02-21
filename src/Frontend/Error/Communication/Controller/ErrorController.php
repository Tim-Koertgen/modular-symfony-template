<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Frontend\Error\Communication\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/404', name: '404')]
    public function index(): Response
    {
        return $this->render(
            '@frontend/Error/Presentation/404.html.twig'
        );
    }
}
