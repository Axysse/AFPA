<?php

namespace App\Controller;

use App\Entity\Formations;
use App\Entity\Poles;
use App\Entity\QuizzQuestions;
use App\Entity\QuizzReponses;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

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
    public function pole($id, EntityManagerInterface $entity, SerializerInterface $serializer, SessionInterface $session, Request $request): Response
    {
        $quizzs = $entity->getRepository(QuizzQuestions::class)->findAll();
        $quizzzs = $entity->getRepository(QuizzReponses::class)->findAll();


        $data = array(
            'value' => null,
            'number' => 10,
            'string' => 'No value',
        );

        foreach($quizzzs as $value){
        $form = $this->createFormBuilder($data)
        
                     ->add('reponse1', RadioType::class, [
                        'attr' => ['placeholder' => $value->getReponse1()],
                        'label' => $value->getReponse1(),
                     ])
                     ->add('reponse2', RadioType::class, [
                        'attr' => ['placeholder' => $value->getReponse2()],
                        'label' => $value->getReponse2(),
                     ])
                     ->add('reponse3', RadioType::class, [
                        'attr' => ['placeholder' => $value->getReponse3()],
                        'label' => $value->getReponse3(),
                     ])
                     ->add('save', SubmitType::class)
                     ->getForm();
        }
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
        }
        

        $pole = $entity->getRepository(Poles::class)->findOneBy(['id' => $id]);
        if (is_null($pole)) {
            return $this->redirectToRoute('app_main');
        }

        $poles = $entity->getRepository(Poles::class)->findAll();

        

        $quizz = $entity->getRepository(QuizzQuestions::class)->findOneBy(['pole' => $id]);

        $formations = $entity->getRepository(Formations::class)->findAll();

        return $this->render('main/pole.html.twig', [
            'controller_name' => 'MainController',
            'id' => $id,
            'pole' => $pole,
            'poles' => $poles,
            'formations' => $formations,
            'quizzs' => $quizzs,
            'form' => $form->createView() 
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

    #[Route('/c/formations', name: 'app_formations')]
    public function formations(EntityManagerInterface $entity): Response
    {

        $formations = $entity->getRepository(Formations::class)->findAll();


        $poles = $entity->getRepository(Poles::class)->findAll();


        return $this->render('main/formations.html.twig', [
            'controller_name' => 'MainController',
            'poles' => $poles,
            'formations' => $formations
        ]);
    }
}
