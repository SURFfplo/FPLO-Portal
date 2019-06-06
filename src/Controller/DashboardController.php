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
	    $portalUrl = substr($portalUrl, 8);
	    
        return $this->render('dashboard/dashboard.html.twig', [
            'portalUrl' => $portalUrl
        ]);
    }
}
