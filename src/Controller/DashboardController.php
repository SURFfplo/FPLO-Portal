<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

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

	try {
		//Call JWT service for LTI 1.3 tools
		$client = HttpClient::create();
		$response = $client->request('GET', getenv('JWT_URL').'/context');		
		$content = json_decode($response->getContent());
	}
	catch (TransportExceptionInterface $e) {
		$content = [];
	}


        return $this->render('dashboard/dashboard.html.twig', [
            'portalUrl' => $portalUrl,
            'context' => $content
        ]);
    }
}
