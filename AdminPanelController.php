<?php

namespace App\Controller;

use App\Entity\News;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPanelController extends AbstractController
{
    /**
     * @Route("/admin/panel", name="admin_panel")
     */
    public function index()
    {
        return $this->render('admin_panel/admin.html.twig', [
            'controller_name' => 'AdminPanelController',
        ]);
    }
    /**
     * @Route("/admin/panel/createnews", name="admin_panel_create")
     */
    public function createnews()
    {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $summary = $_POST['summary'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        echo $title;
        echo $date;
        echo $summary;
        echo $author;
        echo $description;

        $entityManager = $this->getDoctrine()->getManager();
        $news = new News();
        $news ->setTitle($title);
        $news ->setDate($date);
        $news ->setSummary($summary);
        $news ->setAuthor($author);
        $news ->setDescription($description);

        $entityManager->persist($news);
        $entityManager->flush();
        return new Response("stana e ");



        //return $this->render('admin_panel/admin.html.twig', ['controller_name' => 'AdminPanelController',]);
    }

    /**
     * @Route("/admin/panel/delete/news", name="news_delete")
     */
    public function deletenews()
    {
        $title = $_POST['title'];
        $entityManager = $this->getDoctrine()->getManager();
        $news= $this->getDoctrine()
            ->getRepository(News::class)
            ->findOneBy(['title'=>$title]);
        if (!$news) {
            throw $this->createNotFoundException('No news found for title '.$title);
        }
        $entityManager->remove($news);
        $entityManager->flush();
        return new Response('Deleted news');



        //return $this->render('admin_panel/admin.html.twig', ['controller_name' => 'AdminPanelController',]);
    }

    /**
     * @Route("/news/{id}", name="news_show")
     */
    public function showfull($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $processor= $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);

        if (!$processor) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('admin_panel/news.html.twig', ['news' => $processor]
        );
    }

}
