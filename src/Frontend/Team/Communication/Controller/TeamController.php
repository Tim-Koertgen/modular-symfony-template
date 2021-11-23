<?php

/**
 * This file is part of the Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Frontend\Team\Communication\Controller;

use App\Client\Team\TeamClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{

    /**
     * @var TeamClientInterface
     */
    private TeamClientInterface $teamClient;

    /**
     * @param TeamClientInterface $teamClient
     */
    public function __construct(TeamClientInterface $teamClient)
    {
        $this->teamClient = $teamClient;
    }

    /**
     * @return Response
     */
    #[Route('/team', name: 'team')]
    public function index(): Response
    {
        $teamCollectionTransfer = $this->teamClient->list();

        return $this->render(
            '@frontend/Team/Presentation/index.html.twig',
            ['teamCollectionTransfer' => $teamCollectionTransfer]
        );
    }

}
