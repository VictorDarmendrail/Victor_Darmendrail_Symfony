<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('prostage/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
	
	/**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises(): Response
    {
        return $this->render('prostage/entreprises.html.twig', [
            'controller_name' => 'EntreprisesController',
        ]);
    }
	
	/**
     * @Route("/formations", name="formations")
     */
    public function formations(): Response
    {
        return $this->render('prostage/formations.html.twig', [
            'controller_name' => 'FormationsController',
        ]);
    }
	
	/**
     * @Route("/stages/{id}", name="stagesId")
     */
    public function stagesId($id): Response
    {
        return $this->render('prostage/stagesId.html.twig', [
            'controller_name' => 'StagesIdController',
			'idStage'	=>	$id
        ]);
    }
}
