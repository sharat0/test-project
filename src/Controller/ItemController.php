<?php

namespace App\Controller;

use App\Entity\Items;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    // #[Route('/items', name: 'app_item')]
    #[Route('/item/{id}', name: 'app_item')]

    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $items = $entityManager->getRepository(items::class)->findby(['category' => $id]);

        if (!$items) {
            throw $this->createNotFoundException(
                'No items found for category '.$id
            );
        }

        // return new Response('Check out this great items: '.$items->getName() .' only at rs '.$items->getPrice());

        // or render a template
        // in the template, print things with {{ items.name }}
        return $this->render('item/index.html.twig', ['items' => $items]);
    }
}
