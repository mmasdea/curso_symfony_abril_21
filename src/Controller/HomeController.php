<?php

namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
 
class HomeController extends AbstractController
{

    /**
     * @Route("/default", name="default")
     */
    public function defaultAction(Request $request)
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        return $this->render('home/index.html.twig');
    }

     /**
     * @Route("/trabajos/tpn1", name="trabajos_tpn1")
     */
    public function verTpn1()
    {
        return $this->render('trabajos/tpn1.html.twig');
    }

         /**
     * @Route("/trabajos/tpn2", name="trabajos_tpn2")
     */
    public function verTpn2()
    {
        return $this->render('trabajos/tpn2.html.twig',["valor" => 1]);
    }

    
}

