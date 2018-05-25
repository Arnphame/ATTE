<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function ShowProfile()
    {
        if($this->getUser()->getisDisabled() == 1){
            return $this->render(
                'main/index.html.twig',
                array('error' => 'Your account is disabled. Please contact administrator for more information',
                ));
        }
        if($this->getUser()->getisActive() == 0){
            return $this->render(
                'email_authenticate/index.html.twig',
                array('error' => 'You must authenticate before entering this',
                ));
        }

            return $this->render('profile/index.html.twig', [
                'controller_name' => 'ProfileController',
            ]);
    }

    /**
     * @Route("/disableuser/{id}", name="disableuser")
     */
    public function DisableUser($id, Request $request)
    {
        if($this->getUser()->getRole() == 2)
        {
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id' => $id]);

            if(!$user) {
                return $this->render(
                    'profile/index.html.twig',
                    array('error' => 'No user with this ID found',
                    ));
            }
            if($user && $user->getRole() != 2){
                $em = $this->getDoctrine()->getManager();
                $user->setisDisabled(1);
                $em->flush();
                return $this->render(
                    'profile/index.html.twig',
                    array('success' => 'Successfully disabled!',
                    ));
            }
            else{
                return $this->render(
                    'profile/index.html.twig',
                    array('error' => 'This user is administrator!',
                    ));
            }
        }
        return $this->redirectToRoute('profile');
    }
}
