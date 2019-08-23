<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Meals;
use App\Entity\Tables;
use App\Form\CommsType;
use App\Form\MealsType;
use App\Form\RegisterType;
use App\Repository\CommsRepository;
use App\Repository\MealsRepository;
use App\Repository\OrderRepository;
use App\Repository\TablesRepository;
use App\Repository\MealsTypeRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        // if (!$this->getUser()->getUsername()){
        //     return $this->render('main/interface.html.twig');
        // }
            return $this->render('main/login.html.twig');


    }
    /**
    * @Route("/interface", name="interface")
     */
    public function interface(TablesRepository $tablesrepo)
    {
        $tables=$tablesrepo->findAll();
        return $this->render('main/interface.html.twig', [
            'tables'=> $tables

        ]);
    }


    /**
     * @Route("/ajout", name="main_registration")
     */
     public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
     {
         $user = new User();
 
         $form = $this->createForm(RegisterType::class, $user);
 
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $hash = $encoder->encodePassword($user, $user->getpassword());
 
             $user->setpassword($hash);
             $manager->persist($user);
             $manager->flush();
 
             return $this->redirectToRoute('home');
         }
 
         return $this->render('main/registration.html.twig', [
             'form' => $form->createView(),
 
         ]);
     }

/**
* @Route("/orders", name="main_order")
 */
public function order(CommsRepository $comsrepo, MealsRepository $mealrepo, MealsTypeRepository $mealstyperepo)
{
    $mealsType=$mealstyperepo->findAll();
    $meals = $mealrepo->findAll();
    $comms = $comsrepo->findAll();
    $formcoms = $this->createForm(CommsType::class);
    return $this->render('main/order.html.twig', [
        'meals' => $meals,
        'form_order' => $formcoms->createView(),
        'oreder' => $comms,
        'mealsType' => $mealsType
    ]);
}











 
     /**
      * @Route("/login", name="main_login")
      */
     public function login()
     {
 
         return $this->render('main/login.html.twig');
     }
 
 /**
  * @Route("/deconnexion", name="main_logout")
  */
     public function logout()
     {
 
     }
 
}
