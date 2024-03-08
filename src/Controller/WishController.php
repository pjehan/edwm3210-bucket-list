<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/souhaits')]
class WishController extends AbstractController
{
    #[Route('/', name: 'app_wish')]
    public function index(WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository->findLastWishes();

        return $this->render('wish/index.html.twig', [
            'wishes' => $wishes
        ]);
    }

    #[Route('/ajouter', name: 'app_wish_create')]
    #[IsGranted('ROLE_USER')]
    public function create(Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_USER');
        $wish = new Wish();
        $wish->setAuthor($this->getUser());
        $form = $this->createForm(WishType::class, $wish);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $image */
            $image = $form->get('image')->getData();
            if ($image) {
                $imageFilename = $fileUploader->upload($image);
                $wish->setImage($imageFilename);
            }

            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('success', 'Votre souhait est bien créé');

            return $this->redirectToRoute('app_wish');
        }

        return $this->render('wish/create.html.twig', [
            'formWish' => $form
        ]);
    }

    #[Route('/{slug}', name: 'app_wish_show')]
    public function show(Wish $wish): Response
    {
        return $this->render('wish/show.html.twig', [
            'wish' => $wish
        ]);
    }

    #[Route('/edit/{id}', name: 'app_wish_edit')]
    public function edit(Wish $wish, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WishType::class, $wish);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('success', 'Votre souhait est bien modifié');

            return $this->redirectToRoute('app_wish');
        }

        return $this->render('wish/edit.html.twig', [
            'wish' => $wish,
            'formWish' => $form
        ]);
    }
}
