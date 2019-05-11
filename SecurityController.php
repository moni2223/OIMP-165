<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 4/17/2019
 * Time: 9:26 AM
 */

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
        public function login(AuthenticationUtils $authenticationUtils,AuthorizationCheckerInterface $authorizationChecker): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        if(true===$authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->render('index/exceptionLogged.html.twig');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
    /**
     * @Route("/changerole", name="user_changerole")
     */
    public function changerole()
    {
        $id=12;
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

             $user->setRoles(['ROLE_ADMIN']);

        $entityManager->flush();

        return new Response('Updated user');

    }
}