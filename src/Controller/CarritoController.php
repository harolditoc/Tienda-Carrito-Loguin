<?php

namespace App\Controller;

use App\Entity\Venta;
use App\Form\VentaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/carrito')]
class CarritoController extends AbstractController
{
    #[Route('/', name: 'app_carrito_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ventas = $entityManager
            ->getRepository(Venta::class)
            ->findBy(['estado'=>'0']);

        return $this->render('carrito/index.html.twig', [
            'ventas' => $ventas,
        ]);
    }

    #[Route('/new', name: 'app_carrito_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ventum = new Venta();
        $form = $this->createForm(VentaType::class, $ventum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ventum);
            $entityManager->flush();

            return $this->redirectToRoute('app_carrito_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carrito/new.html.twig', [
            'ventum' => $ventum,
            'form' => $form,
        ]);
    }

    #[Route('/{idventa}', name: 'app_carrito_show', methods: ['GET'])]
    public function show(Venta $ventum): Response
    {
        return $this->render('carrito/show.html.twig', [
            'ventum' => $ventum,
        ]);
    }

    #[Route('/{idventa}/edit', name: 'app_carrito_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Venta $ventum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VentaType::class, $ventum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_carrito_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carrito/edit.html.twig', [
            'ventum' => $ventum,
            'form' => $form,
        ]);
    }

    #[Route('/{idventa}', name: 'app_carrito_delete', methods: ['POST'])]
    public function delete(Request $request, Venta $ventum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ventum->getIdventa(), $request->request->get('_token'))) {
            $entityManager->remove($ventum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_carrito_index', [], Response::HTTP_SEE_OTHER);
    }
}
