<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BlogController extends AbstractController
{
    //#[Route('/blog', name: 'app_blog')]
    //public function index(): Response
    //{
    //    return $this->render('blog/index.html.twig', [
    //        'controller_name' => 'BlogController',
    //    ]);
    //}

    #[Route('/blog/articles', name: 'app_blog_articles')]
    public function showArticles(ArticleRepository $repoArticle): Response {
        $articles = $repoArticle->findAll();
        ($articles);
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
            'title' => 'Page Accueil',
        ]);
    }

    //#[Route('/blog/{id}/{name}', name: 'app_blog', requirements: ["name"=>"[a-zA-Z]{5,50}","id"=>"[0-9]{2,6}"])]
    //public function index(int $id, string $name): Response 
    //{
    //    //https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Regular_Expressions#exemples

    //    return $this->render('blog/index.html.twig',[
    //        'id' => $id,
    //        'name' => $name,
    //        
    //    ]);
    //}

    #[Route('/', name: 'hello_world')]
    public function helloWorld()
    {
        $content = "Hello World !";
        return new Response($content, Response::HTTP_OK);
    }

    

    

}
