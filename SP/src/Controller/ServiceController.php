<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\User;
use App\Form\ServiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ServiceController extends Controller
{
    /**
     * @Route("/serviceregistration", name="serviceregistration")
     */
   public function CreateService(Request $request, AuthorizationCheckerInterface $authorizationChecker)
   {
       if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
           if ($this->getUser()->getisActive() == 1 && $this->getUser()->getRole() == 2) {
               $service = new Service();
               $user = $this->getUser();
               $service->setRuler($user);
               $form = $this->createForm(ServiceType::class, $service);

               $form->handleRequest($request);
               if ($form->isSubmitted() && $form->isValid()) {
                   $entityManager = $this->getDoctrine()->getManager();
                   $getTotalPrice = $service->getPrice() * ($service->getDiscount() / 100);
                   $service->setTotalPrice($service->getPrice() - $getTotalPrice);
                   $entityManager->persist($service);
                   $entityManager->flush();
                   return $this->redirectToRoute('service');
               }
           } else if (!$authorizationChecker->isGranted('ROLE_ADMIN')) {
               return $this->render(
                   'main/index.html.twig',
                   array('error' => 'You do not have permissions to enter this',
                   ));
           }


           return $this->render(
               'service/registration.html.twig',
               array('form' => $form->createView(),
                   )
           );
       }
       else
       {
           return $this->render(
               'main/index.html.twig',
               array('error' => 'You do not have permissions to enter this',
               ));
       }
   }

    /**
     * @Route("/serviceedit/{id}", name="serviceedit")
     */
   public function EditService($id, Request $request)
   {
       $service = $this->getDoctrine()->getRepository(Service::class)->findOneBy(['id' => $id]);
       $em = $this->getDoctrine()->getManager();

       if(!$service){
           return $this->render(
               'profile/index.html.twig',
               array('error' => 'No service with this ID found',
               ));
       }

       $form = $this->createForm(ServiceType::class, $service);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           $getTotalPrice = $service->getPrice() * ($service->getDiscount() / 100);
           $service->setTotalPrice($service->getPrice() - $getTotalPrice);
           $em->flush();

           return $this->redirectToRoute('service');
       }

       return $this->render(
           'service/registration.html.twig',
           array('form' => $form->createView(),
               'error' => 'No service with this ID found',
               'service' => $service,
           ));
   }

    /**
     * @Route("/service", name="service")
     */
   public function ShowServices()
   {
       $service = $this->getDoctrine()->getRepository(Service::class)->findAll();

       return $this->render('service/index.html.twig', [
           'controller_name' => 'ServiceController',
           'services' => $service,
       ]);
   }
    /**
     * @Route("/servicedelete/{id}", name="servicedelete")
     */
   public function DeleteService($id, Request $request)
   {
       $service = $this->getDoctrine()->getRepository(Service::class)->findOneBy(['id' => $id]);
       if($service) {
           $em = $this->getDoctrine()->getManager();
           $em->remove($service);
           $em->flush();
       }
       return $this->redirectToRoute('service');
   }
}
