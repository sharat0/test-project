<?php

namespace App\Controller;

use App\Entity\Items;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddItemsController extends AbstractController
{
    #[Route('/add_items', name: 'app_add_items')]
    public function createItem(EntityManagerInterface $entityManager): Response
    {
        $items = new items();
        $items->setName('HP');
        $items->setPrice('1999');
        $items->setDescription('HP best gaming keyboard');
        $items->setCategory('1');
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($items);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id ' . $items->getId());
        // return $this->render('item/index.html.twig', ['items' => $items]);
    }
}