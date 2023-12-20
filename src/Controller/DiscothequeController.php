<?php

namespace App\Controller;

<<<<<<< Updated upstream
=======
use App\Repository\ChansonRepository;
>>>>>>> Stashed changes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscothequeController extends AbstractController
{
    #[Route('/discotheque', name: 'app_discotheque')]
<<<<<<< Updated upstream
    public function index(): Response
    {
        return $this->render('discotheque/index.html.twig', [
            'controller_name' => 'DiscothequeController',
        ]);
    }
=======
    public function index(ChansonRepository $repoChanson): Response
    {
        $chansons = $repoChanson->findAll();
        ($chansons);
        return $this->render('discotheque/index.html.twig', [
            'controller_name' => 'DiscothequeController',
            'chansons' => $chansons,
        ]);
    }

>>>>>>> Stashed changes
}
