<?php
namespace App\Controller;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal', name:'animal_index' )]
    public function index(AnimalRepository $animalRepository)
    {
        $data['animais'] = $animalRepository->findAll();

        return $this->render('animal/index.html.twig',$data);
    }
}