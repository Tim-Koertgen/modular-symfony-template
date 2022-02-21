<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Frontend\StartPage\Communication\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StartPageController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/', name: 'start_page')]
    public function index(): Response
    {
        return $this->render(
            '@frontend/StartPage/Presentation/index.html.twig'
        );
    }
}
