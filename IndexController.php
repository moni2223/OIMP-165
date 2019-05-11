<?php

namespace App\Controller;

use App\Entity\HardDrive;
use App\Entity\News;
use App\Entity\RAM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Processors;
use App\Entity\VideoCards;
use App\Entity\Motherboards;

class IndexController extends AbstractController
{
    /**
     * @Route("", name="homepage")
     */
    public function index()
    {
        $id = 3;
        $entityManager = $this->getDoctrine()->getManager();
        $processor = $this->getDoctrine()
            ->getRepository(Processors::class)
            ->find($id);

        $id1 = 1;
        $entityManager1 = $this->getDoctrine()->getManager();
        $videocard = $this->getDoctrine()
            ->getRepository(VideoCards::class)
            ->find($id1);

        $id2 = 1;
        $entityManager2 = $this->getDoctrine()->getManager();
        $motherboard = $this->getDoctrine()
            ->getRepository(Motherboards::class)
            ->find($id2);

        $id3 = 5;
        $entityManager3 = $this->getDoctrine()->getManager();
        $ram = $this->getDoctrine()
            ->getRepository(RAM::class)
            ->find($id3);

        $entityManager6 = $this->getDoctrine()->getManager();
        $id6=6;
        $hard= $this->getDoctrine()
            ->getRepository(HardDrive::class)
            ->find($id6);

        $entityManager4 = $this->getDoctrine()->getManager();
        $id4=8;
        $news= $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id4);

        $title=$news->getTitle();
        $author=$news->getAuthor();
        $summary=$news->getSummary();
        $date=$news->getDate();


        if (!$news) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }


        $entityManager5 = $this->getDoctrine()->getManager();
        $id5=9;
        $news2= $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id5);

        $title2=$news2->getTitle();
        $author2=$news2->getAuthor();
        $summary2=$news2->getSummary();
        $date2=$news2->getDate();


        if (!$news) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }


        return $this->render('index/index.html.twig',
            ['processor' => $processor,
                'videocard' => $videocard,
                'motherboard' => $motherboard,
                'ram' => $ram,
                'hard'=>$hard,
                'title' => $title,
                'author' => $author,
                'summary' => $summary,
                'date' => $date,
                'news'=>$news,
                'news2'=>$news2,
                'title2'=>$title2,
                'author2'=>$author2,
                'summary2'=>$summary2,
                'date2'=>$date2]);
    }

    /**
     * @Route("/processor/3", name="processor3")
     */
    public function processor()
    {
        $id = 3;
        $entityManager = $this->getDoctrine()->getManager();
        $processor = $this->getDoctrine()
            ->getRepository(Processors::class)
            ->find($id);
        //Live update price for Desktop.bg
        $processorUrldes = $processor->getUrldes();
        $processorhtml = file_get_contents($processorUrldes);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $processorhtml, $m)) {
            $processor->setPricedes($m[1]);
        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $processorUrlArdes = $processor->getUrlardes();
        $processor1html = file_get_contents($processorUrlArdes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $processor1html, $m1)) {
            $processor->setPriceardes($m1[1]);
        }
        //End of code for updating price for Ardes.bg


        //Live update price for Emag.bg
        $processorUrlEmag = $processor->getUrlemag();
        $processor2html = file_get_contents($processorUrlEmag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $processor2html, $m2)) {
            $processor->setPriceemag($m2[1]);
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processorUrljar = $processor->getUrljar();
        $processor3html = file_get_contents($processorUrljar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $processor3html, $m3)) {
            $processor->setPricejar($m3[1]);
        }


        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('processor/processor-product.html.twig', ['processor' => $processor]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/videocard/1", name="videocard1")
     */
    public function videocard()
    {
        $id = 1;
        $entityManager = $this->getDoctrine()->getManager();
        $videocard = $this->getDoctrine()
            ->getRepository(VideoCards::class)
            ->find($id);
        //Live update price for Desktop.bg
        $videocardUrldes = $videocard->getUrldes();
        $videocardhtml = file_get_contents($videocardUrldes);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $videocardhtml, $m)) {
            $videocard->setPricedes($m[1]);

        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $videocardUrlArdes = $videocard->getUrlardes();
        $videocard1html = file_get_contents($videocardUrlArdes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $videocard1html, $m1)) {
            $videocard->setPriceardes($m1[1]);
        }
        //End of code for updating price for Ardes.bg


        //Live update price for Emag.bg
        $videocardUrlEmag = $videocard->getUrlemag();
        $videocard2html = file_get_contents($videocardUrlEmag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $videocard2html, $m2)) {
            $videocard->setPriceemag($m2[1]);
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.com
        $videocardUrlJar = $videocard->getUrljar();
        $videocard3html = file_get_contents($videocardUrlJar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $videocard3html, $m3)) {
            $videocard->setPricejar($m3[1]);
        }

        //End of code for updating price for Jarcomputers.bg


        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('video_cards/videocards-product.html.twig', ['videocard' => $videocard]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }

    /**
     * @Route("/motherboard/1", name="motherboard1")
     */
    public function motherboard()
    {
        $id = 1;
        $entityManager = $this->getDoctrine()->getManager();
        $motherboard = $this->getDoctrine()
            ->getRepository(Motherboards::class)
            ->find($id);
        //Live update price for Desktop.bg
        $motherboardUrldes = $motherboard->getUrldes();
        $motherboardhtml = file_get_contents($motherboardUrldes);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $motherboardhtml, $m)) {
            $motherboard->setPrice($m[1]);
        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $motherboardUrlArdes = $motherboard->getUrlardes();
        $motherboard1html = file_get_contents($motherboardUrlArdes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $motherboard1html, $m1)) {
            $motherboard->setPriceardes($m1[1]);
        }
        //End of code for updating price for Ardes.bg


        //Live update price for Emag.bg
        $motherboardUrlEmag = $motherboard->getUrlemag();
        $motherboard2html = file_get_contents($motherboardUrlEmag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $motherboard2html, $m2)) {
            $motherboard->setPriceemag($m2[1]);
        }
        //End of code for updating price for Emag.bg


        //Live update price for Jarcomputers.com
        $motherboardUrlJar = $motherboard->getUrljar();
        $motherboard3html = file_get_contents($motherboardUrlJar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $motherboard3html, $m3)) {
            $motherboard->setPricejar($m3[1]);
        }
        //End of code for updating price for Jarcomputers.com

        return $this->render('motherboards/motherboard-product.html.twig', ['motherboard' => $motherboard]);
    }

    /**
     * @Route("/ram/5", name="ram_show1")
     */
    public function show()
    {
        $id=5;
        $entityManager = $this->getDoctrine()->getManager();
        $ram = $this->getDoctrine()
            ->getRepository(RAM::class)
            ->find($id);


        //Live update price for Desktop.bg
        $ramUrldes = $ram->getUrldes();
        $ramhtml = file_get_contents($ramUrldes);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $ramhtml, $m)) {
            $ram->setPricedes($m[1]);
        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $ramUrlArdes = $ram->getUrlardes();
        $ram1html = file_get_contents($ramUrlArdes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $ram1html, $m1)) {
            $ram->setPriceardes($m1[1]);
        }
        //End of code for updating price for Ardes.bg


        //Live update price for Emag.bg
        $ramUrlEmag = $ram->getUrlemag();
        $ram2html = file_get_contents($ramUrlEmag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $ram2html, $m2)) {
            $ram->setPriceemag($m2[1]);
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.com
        $ramUrlJar = $ram->getUrljar();
        $ram3html = file_get_contents($ramUrlJar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $ram3html, $m3)) {
            $ram->setPricejar($m3[1]);

        }


        if (!$ram) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('ram/ram-product.html.twig', ['ram' => $ram]);

    }
    /**
     * @Route("/hard/6", name="hard_show1")
     */
    public function hardshow()
    {
        $id=6;
        $entityManager = $this->getDoctrine()->getManager();
        $hard= $this->getDoctrine()
            ->getRepository(HardDrive::class)
            ->find($id);


        //Live update price for Desktop.bg
        $hardUrldes=$hard->getUrldes();
        $hardhtml=file_get_contents($hardUrldes);
        $m=[];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if(preg_match($re,$hardhtml,$m))
        {
            $hard->setPricedew($m[1]);
        }

        else
        {
            $hard->setPricedew("0.00");
        }

//End of code for updating price for Desktop.bg


//Live update price for Ardes.bg
        $hardUrlArdes=$hard->getUrlardes();
        $hard1html=file_get_contents($hardUrlArdes);
        $m1=[];
        $re1='/gProductPrice\s=\s(\d+\.?\d*)/m';
        if(preg_match($re1,$hard1html,$m1))
        {
            $hard->setPriceardes($m1[1]);
        }
        else
        {
            $hard->setPriceardes("0.00");
        }

//End of code for updating price for Ardes.bg



//Live update price for Emag.bg
        $hardUrlEmag=$hard->getUrlemag();
        $hard2html=file_get_contents($hardUrlEmag);
        $m2=[];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if(preg_match($re2,$hard2html,$m2))
        {
            $hard->setPriceemag($m2[1]);
        }
        else
        {
            $hard->setPriceemag("0.00");
        }
//End of code for updating price for Emag.bg

//Live update price for Jarcomputers.com
        $hardUrlJar=$hard->getUrljar();
        $hard3html=file_get_contents($hardUrlJar);
        $m3=[];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if(preg_match($re3,$hard3html,$m3))
        {
            $hard->setPricejar($m3[1]);
        }

        else
        {
            $hard->setPricejar("0.00");
        }
        if (!$hard) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return $this->render('hard/hard-product.html.twig', ['hard' => $hard]);


    }

}
