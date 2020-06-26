<?php

namespace App\Controller;

use App\Form\DepositForm;
use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/deposit/{id}", name="user_deposit")
     */
    public function deposit( Request $request ,  $id)
    {

         
        $repo = $this->getDoctrine()->getRepository(Account::class);
        $accountfound = $repo->findOneBy((['userid' => $id ]));
        dump($accountfound);
        $form = $this->createForm(DepositForm::class, $accountfound);
        

        $form->handleRequest($request);

       

         if($form->isSubmitted() && $form->isValid()){
             // on save dans la BDD
             // on creer une new variable et on passe la balance avec la new bariable 
             $newAmountdeposited = $accountfound->getBalance() + $form->get('amount')->getData();
             $accountfound->setBalance($newAmountdeposited);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($accountfound);
             $entityManager->flush();

                return $this->redirectToRoute('home');

        }


        return $this->render('user/deposit.html.twig', [
            'DepositForm' => $form->createView()
        ]);
    }



}
