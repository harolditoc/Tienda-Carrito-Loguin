<?php

namespace App\Controller;

use App\Entity\Articulo;
use App\Form\ArticuloType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/productos')]
class ProductosController extends AbstractController
{
    #[Route('/', name: 'app_productos_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $articulos = $entityManager
            ->getRepository(Articulo::class)
            ->findAll();

        return $this->render('productos/index.html.twig', [
            'articulos' => $articulos,
        ]);
    }

    #[Route('/new', name: 'app_productos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $articulo = new Articulo();
        $form = $this->createForm(ArticuloType::class, $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($articulo);
            $entityManager->flush();

            return $this->redirectToRoute('app_productos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('productos/new.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    #[Route('/{idarticulo}', name: 'app_productos_show', methods: ['GET'])]
    public function show(Articulo $articulo): Response
    {
        return $this->render('productos/show.html.twig', [
            'articulo' => $articulo,
        ]);
    }

    #[Route('/{idarticulo}/edit', name: 'app_productos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Articulo $articulo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticuloType::class, $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_productos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('productos/edit.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    #[Route('/{idarticulo}', name: 'app_productos_delete', methods: ['POST'])]
    public function delete(Request $request, Articulo $articulo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articulo->getIdarticulo(), $request->request->get('_token'))) {
            $entityManager->remove($articulo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_productos_index', [], Response::HTTP_SEE_OTHER);
    }
}
