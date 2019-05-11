<?php

namespace App\Controller;

use App\Entity\Contact;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends AbstractController
{
    /**
     * @Route("/about-us", name="about_us")
     */
    public function index()
    {

        return $this->render('about_us/about-us.html.twig', [
            'controller_name' => 'AboutUsController',
        ]);
    }

    /**
     * @Route("/take", name="take")
     */
    public function take()
    {
        $id=2;
        $result=$_POST['email'];
        $result2=$_POST['text'];
        //echo $result;
        //echo "\r\n";
        //echo $result2;


        //$result = $result.'';
        //$result = serialize($result);
        $entityManager = $this->getDoctrine()->getManager();
        $contact = new Contact();
        $contact ->setEmail($result);
        $contact ->setDescription($result2);
        $entityManager->persist($contact);
        $entityManager->flush();
        //$power->setPFC($result);
        //$entityManager->flush();
        //$unserialized_result = unserialize($result);
        //var_dump($unserialized_result);
        return new Response(
           'New Comment added'
        );
    }
}
