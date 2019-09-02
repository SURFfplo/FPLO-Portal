<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index()
    {
	    //get attributes from authenticated user:
	    $user = $this->getUser();
		$uid = $user->getUsername();
		
		//Call OOAPI for profile info:	    
	    $client = HttpClient::create();
		$response = $client->request('GET', getenv('API_URL').'/persons/'.$uid);		
		$content = $response->toArray();

        return $this->render('profile/profile.html.twig', [
            'data' => $content,
        ]);
    }
}
