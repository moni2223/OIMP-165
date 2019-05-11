<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
//use App\Security\StubAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="site_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, AuthorizationCheckerInterface $authorizationChecker): Response
    {
        if (true === $authorizationChecker->isGranted('ROLE_USER')) {
            return $this->render('index/exceptionLogged.html.twig');
        } else {
            $user = new User();
            $form = $this->createForm(RegistrationFormType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // encode the plain password
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('Password')->getData()
                    )
                );
                $user->setConfig1("");
                $user->setConfig2("");
                $user->setConfig3("");
                $user->setConfig4("");
                $user->setConfig5("");
                if (true === $authorizationChecker->isGranted('ROLE_USER')) {
                    return $this->render('index/exceptionLogged.html.twig');
                }

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                // do anything else you need here, like send an email

                return $this->redirectToRoute('app_login');
            }

            return $this->render('registration/register.html.twig', [
                'registrationForm' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/user/delete/{id}", name="user_delete")
     */
    public function removeuser($id)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);
        if (!$user) {
            throw $this->createNotFoundException('No user found for id ' . $id);
        }
        $entityManager->remove($user);
        $entityManager->flush();
        return new Response('Deleted user');
    }


    /**
     * @Route("/user/edit/{id}", name="user_edit")
     */


    public function edituser($id)

    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        //$processor->setPricedes(1129.00);

        // $processor->setPriceardes(1238.00);

        // $processor->setPriceemag(1126.80);

        // $processor->setPricejar(1109.00);
        $user->setConfig1('');

        $entityManager->flush();

        return new Response('Updated user');

    }
}

