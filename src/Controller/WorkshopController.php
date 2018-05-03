<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WorkshopController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        return $this->render('workshop/index.html.twig');
    }
}