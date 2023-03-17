<?php

namespace App\Controller;

use App\Entity\DetalleVenta;
use App\Form\DetalleVentaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/a/carrito')]
class ACarritoController extends AbstractController
{
    #[Route('/', name: 'app_a_carrito_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $detalleVentas = $entityManager
            ->getRepository(DetalleVenta::class)
            ->findAll();

        return $this->render('a_carrito/index.html.twig', [
            'detalle_ventas' => $detalleVentas,
        ]);
    }

    #[Route('/new', name: 'app_a_carrito_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $detalleVentum = new DetalleVenta();
        $form = $this->createForm(DetalleVentaType::class, $detalleVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($detalleVentum);
            $entityManager->flush();

            return $this->redirectToRoute('app_a_carrito_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('a_carrito/new.html.twig', [
            'detalle_ventum' => $detalleVentum,
            'form' => $form,
        ]);
    }

    #[Route('/{iddetalleVenta}', name: 'app_a_carrito_show', methods: ['GET'])]
    public function show(DetalleVenta $detalleVentum): Response
    {
        return $this->render('a_carrito/show.html.twig', [
            'detalle_ventum' => $detalleVentum,
        ]);
    }

    #[Route('/{iddetalleVenta}/edit', name: 'app_a_carrito_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DetalleVenta $detalleVentum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DetalleVentaType::class, $detalleVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_a_carrito_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('a_carrito/edit.html.twig', [
            'detalle_ventum' => $detalleVentum,
            'form' => $form,
        ]);
    }

    #[Route('/{iddetalleVenta}', name: 'app_a_carrito_delete', methods: ['POST'])]
    public function delete(Request $request, DetalleVenta $detalleVentum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detalleVentum->getIddetalleVenta(), $request->request->get('_token'))) {
            $entityManager->remove($detalleVentum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_a_carrito_index', [], Response::HTTP_SEE_OTHER);
    }
}
