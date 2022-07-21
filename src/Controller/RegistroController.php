<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroController extends AbstractController
{
    #[Route('/registro', name: 'app_registro')]
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new Persona();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $user->setClave($passwordEncoder->encodePassword($user ,$form['clave']->getData()));
            $em->persist($user);
            $em->flush();
            $this->addFlash('Exito', 'Se ha registrado exitosamente.');
            return $this->redirectToRoute('app_registro');
        }
        return $this->render('registro/index.html.twig', [
            'controller_name' => 'RegistroController',
            'formulario'=>$form->createView()
        ]);
    }
}
