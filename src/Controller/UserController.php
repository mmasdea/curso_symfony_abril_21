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
     * @Route("/login_api", name="login_api")
     */
    public function login_apiAction()
    {
        return $this->render('login_api.html.twig');
    }  

    /**
     * @Route("/validation", name="validation")
     */
    public function loginValidation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $email = $request->get('login_email');
        $password = $request->get('login_password');
        $resultado = $em->getRepository(Users::class)->findBy(
            array(
                'email' => $email,
                'password' => $password
            )
        ); 

        if(count($resultado)==0){
            $resultado="Credenciales Invalidas - Reingrese";
            return $this->render('login.html.twig',["res" => $resultado]);
        } else {
            return $this->render('Welcome.html.twig',["usuario" => $resultado]);            
        }
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
