<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
	 * @Route("/", name="homepage")
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
	    $portalUrl = "$_SERVER[HTTP_HOST]";
	    
        return $this->render('dashboard/index.html.twig', [
            'portalUrl' => $portalUrl
        ]);
    }
}
