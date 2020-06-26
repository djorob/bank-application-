<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\DepositForm;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function index()
    {
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

     /**
     * @Route("/", name="home")
     */

    public function home()
    {

        $repo = $this->getDoctrine()->getRepository(Account::class);

        $account = $repo->findAll();


        return $this->render('account/home.html.twig', [
            'controller_name' => 'AccountController',
            'accounts' => $account
        ]);
    }



     /**
     * @Route("/show/{id}", name="account_show")
     */

    public function show($id, Request $request)
    {

       // on vérifie que le client est bien identifié 

       if (!$this->getUser()){
        return $this->redirectToRoute('app_login');
     }

     $repo = $this->getDoctrine()->getRepository(Account::class);
        $figure = $repo->find($id);
        // si  on ne trouve pas de compte  on retourne sur la page home 


        if (!$figure){
            return $this->redirectToRoute('home');

        }

        // on veut pouvoir avoir un reporting en téléchargant un pdf

        $pdfPath = $this->getParameter('dir.downloads').'/sample.pdf';

        return $this->file($pdfPath, 'reporting.pdf');

        return $this->render('account/show.html.twig', [
            'controller_name' => 'AccountController',
            
        ]);
    }

    

     /**
     * @Route("/account/new", name="account_create")
     */
    public function newAccount(Request $request)
    {
        $account = new Account();
        $form = $this->createForm(DepositForm::class, $account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // on controle les données

            // si le user n'est pas connécté je le redirige  vers le login

            if (!$this->getUser()){
                return $this->redirectToRoute('app_login');
             }

             $data = $form->getData();
             $nom = $form->get('Nom')->getData();
             //$description = $form->get('Description')->getData();
             $number = $form->get('number')->getData();
             
             
             $account = new Account();
             $account->setNom($nom);
             $account->setnumber($number);
             
             $this->addFlash(
                'notice',
                'Votre compte a ete ajouté !'
            );


           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($account);
            $entityManager->flush();

            return $this->redirectToRoute('home');

           
        }

        return $this->render('account/newAccount.html.twig', [
            'AccountForm' => $form->createView(),
        ]);
    }

    
    

}
