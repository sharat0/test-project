<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Dummy Page',
            'lorem_text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quaerat dicta consequuntur vel
            repellat beatae. Quo nisi doloribus ducimus sequi magnam provident iure dicta eligendi, laborum
            illo eaque minus quos.',
            'controller_line'=> 'Where education meets innovation',
        ]);
    }
}
