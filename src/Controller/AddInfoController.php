<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddInfoController extends AbstractController
{
    /**
     * @Route("/addinfo", name="add_info")
     */
    public function index()
    {
        return $this->render('front/index.html.twig', [

        ]);
    }
}
