<?php

namespace App\Controller;

use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cliente;
class ClienteController extends AbstractController

{

    #[Route('/cliente', name:'cliente_index')]
    public function index(ClienteRepository $clienteRepository)
    {
        $data['titulo'] = 'Lista de clientes';
        $data['clientes'] = $clienteRepository->findAll();

        return $this->render('cliente/index.html.twig',$data);
    }

    #[Route('/cliente/adicionar',name:'cliente_adicionar')]
    public function adicionar(Request $request, EntityManagerInterface $em) : Response
    {

        $data['titulo'] = 'Adicionar cliente';

        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class,$cliente);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($cliente);
            $em->flush();

        }

        $data['form'] = $form;

        return $this->renderForm('cliente/form.html.twig',$data);


        
    }

}