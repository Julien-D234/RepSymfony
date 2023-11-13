<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog/{id}/{name}', name: 'app_blog', requirements: ["name"=>"[a-zA-Z]{5,50}"])]
    public function index(int $id,string $name): Response
    {
        return $this->render('blog/index.html.twig', [
            'id' => $id,
            'name'  => $name,
        ]);
    }
}