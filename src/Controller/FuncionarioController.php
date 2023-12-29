<?php
namespace App\Controller;

use App\Entity\Funcionario;
use App\Form\FuncionarioType;
use App\Repository\FuncionarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioController extends AbstractController
{
    #[Route('/funcionario', name: 'funcionario_index')]
    public function index(FuncionarioRepository $funcionarioRepository)
    {

        $data['funcionarios'] = $funcionarioRepository->findAll();

        return $this->render('funcionario/index.html.twig',$data);
    }

    #[Route('/funcionario/adicionar', name: 'funcionario_adicionar')]
    public function adicionar(Request $request, EntityManagerInterface $em): Response
    {

        $funcionario = new Funcionario();

        $form = $this->createForm(FuncionarioType::class,$funcionario);
        $data['titulo'] = 'Adicionar Funcionário';

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($funcionario);
            $em->flush();
        }
        $data['form'] = $form;
        return $this->renderForm('funcionario/form.html.twig',$data);

    }

    #[Route('/funcionario/editar/{$id}', name: 'funcionario_editar')]
    public function editar($id, Request $request, EntityManagerInterface $em, FuncionarioRepository $funcionarioRepository): Response
    {

        $funcionario = $funcionarioRepository->find($id);
        $form = $this->createForm(FuncionarioType::class,$funcionario);
        $data['titulo'] = 'Editar Funcionário';

        $em->persist($funcionario);
        $em->flush();

        return $this->renderFOrm('funcionario/form.htmkl/twig',$data);

    }


}