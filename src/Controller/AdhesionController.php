<?php

namespace App\Controller;

use App\Entity\Adhesion;
use App\Form\AdhesionType;
use App\Repository\AdhesionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;

#[Route('/adhesion')]
class AdhesionController extends DefaultLayoutController
{
    #[Route('/', name: 'app_adhesion_index', methods: ['GET'])]
    public function index(AdhesionRepository $adhesionRepository): Response
    {
         # Include vendors and javascript files for dashboard widgets
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        
        return $this->render('adhesion/index.html.twig', [
            'adhesions' => $adhesionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adhesion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adhesion = new Adhesion();
        $form = $this->createForm(AdhesionType::class, $adhesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adhesion);
            $entityManager->flush();

            return $this->redirectToRoute('app_adhesion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adhesion/new.html.twig', [
            'adhesion' => $adhesion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adhesion_show', methods: ['GET'])]
    public function show(Adhesion $adhesion): Response
    {
        return $this->render('adhesion/show.html.twig', [
            'adhesion' => $adhesion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adhesion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adhesion $adhesion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdhesionType::class, $adhesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adhesion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adhesion/edit.html.twig', [
            'adhesion' => $adhesion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adhesion_delete', methods: ['POST'])]
    public function delete(Request $request, Adhesion $adhesion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adhesion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adhesion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adhesion_index', [], Response::HTTP_SEE_OTHER);
    }
}
