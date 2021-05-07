<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Entity\Users;

class UserController extends AbstractController
{

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        return $this->render('login.html.twig');
    }   

        /**
     * @Route("/list_all_users", name="list_all_users")
     * 
     */
    public function getAllUser() {
        
            $em = $this->getDoctrine()->getManager();
            $listaUsuarios = $em->getRepository(Users::class)->findAll(); //Me traigo todos los usuarios
            //dump($listaUsuarios);
            //die();
            return $this->render('users/list_users.html.twig',["usuarios" => $listaUsuarios]);
        }
}
