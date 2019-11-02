<?php

namespace App\Controller;

use App\Form\AddDriversType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddInfoController extends AbstractController
{
    /**
     * @Route("/addinfo", name="add_info")
     */
    public function index( Request $request)
    {
        $form=$this->createForm(AddDriversType::class);
        $form->handleRequest($request);







        return $this->render('add/addform.html.twig', [
             'adddriver' => $form->createView(),

        ]);
    }
}
