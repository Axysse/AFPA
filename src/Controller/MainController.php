<?php

namespace App\Controller;

use App\Entity\Formations;
use App\Entity\Poles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_main')]
    public function index(EntityManagerInterface $entity): Response
    {

        $poles = $entity->getRepository(Poles::class)->findAll();
        $formations = $entity->getRepository(Formations::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'formations' => $formations,
            'poles' => $poles
        ]);
    }

    #[Route('/pole/{id}', name: 'app_pole')]
    public function pole($id, EntityManagerInterface $entity): Response
    {

        $pole = $entity->getRepository(Poles::class)->findOneBy(['id' => $id]);
        if (is_null($pole)) {
            return $this->redirectToRoute('app_main');
        }

        $poles = $entity->getRepository(Poles::class)->findAll();


        $formations = $entity->getRepository(Formations::class)->findBy(["pole_id" => $id]);



        return $this->render('main/pole.html.twig', [
            'controller_name' => 'MainController',
            'id' => $id,
            'pole' => $pole,
            'poles' => $poles,
            'formations' => $formations
        ]);
    }

    #[Route('/formation/{id}', name: 'app_formation')]
    public function formation($id, EntityManagerInterface $entity): Response
    {

        $formations = $entity->getRepository(Formations::class)->findAll();

        $formation = $entity->getRepository(Formations::class)->findOneBy(['id' => $id]);

        $poles = $entity->getRepository(Poles::class)->findAll();

        if (is_null($formation)) {
            return $this->redirectToRoute('app_main');
        }

        return $this->render('main/formation.html.twig', [
            'controller_name' => 'MainController',
            'id' => $id,
            'poles' => $poles,
            'formation' => $formation,
            'formations' => $formations
        ]);
    }
}
