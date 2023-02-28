<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Entity\Sortie;
use App\Form\CampusType;
use App\Repository\CampusRepository;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(Request $request, SortieRepository $sortieRepository)
    {


        //affichage des sorties
        $sorties = $sortieRepository->findAll();

        // dd($this->getUser());
       if (!$this->getUser()) {

            return $this->redirectToRoute('app_login');
        }
        return $this->render('main/home.html.twig', [
            'sortie' => $sorties,
        ]);
    }
}