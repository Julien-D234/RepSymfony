<?php
//http://symfony.iut-blagnac.fr/~syfy18/symfony/public/discotheque
namespace App\Controller;

use App\Repository\ChansonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscothequeController extends AbstractController
{
    #[Route('/discotheque', name: 'app_chanson_index')]
    public function index(ChansonRepository $chansonRepository): Response
    {
        return $this->render('chanson/index.html.twig', [
            'chansons' => $chansonRepository->findAll(),
        ]);
    }

}