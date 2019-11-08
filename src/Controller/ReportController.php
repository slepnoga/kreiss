<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{

    /**
     * @Route("/report", name="app_report_main")
     */


    public function index()
    {
        return $this->render(
            'otchet/index.html.twig',
            [

            ]
        );
    }
}
