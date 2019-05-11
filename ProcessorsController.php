<?php

namespace App\Controller;

use App\Entity\Processors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;

class ProcessorsController extends AbstractController
{
    /**
     * @Route("/processor/add", name="processors-add")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $processor = new Processors();
        $processor->setName('Intel Pdsdsdsdsdsdsdsentium Gold G5400 Dual-Core 3.7GHz');
        $processor->setType('	Intel Pentium Gold');
        $processor->setCores(2);
        $processor->setSocket('Intel Socket 1151');
        $processor->setClockrate('	3700 Mhz');
        $processor->setCache('4 MB');
        $processor->setBrand('Intel');

        $processor->setPricedes(185.00);

        $processor->setPriceardes(162.00);

        $processor->setPriceemag(177.60);

        $processor->setPricejar(164.12);

        $processor->setUrldes('https://desktop.bg/desktop_cpus-intel-Pentium_dual_core-intel_pentium_gold_g5400');

        $processor->setUrlardes('https://ardes.bg/product/intel-pentium-gold-g5400-3-70ghz-bx80684g5400sr3x9-109739');

        $processor->setUrlemag('https://www.emag.bg/procesor-intel-pentium-gold-g5400-coffee-lake-3-7ghz-4mb-54w-lga1151-box-intel-g5400-box/pd/DLJY9VBBM/?X-Search-Id=b8192cd1ad01b4a1f35b&X-Product-Id=36490321&X-Search-Page=1&X-Search-Position=0&X-Section=search&X-MB=0&X-Search-Action=view');

        $processor->setUrljar('https://www.jarcomputers.com/p/CPUPINTELBX80684G5400SR3X9/?ref=intel%20pentium%20gold%20g5400');

        $processor->setImage('https://desktop.bg/system/images/193696/normal/intel_pentium_gold_g5400.jpg');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($processor);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$processor->getId());
    }

    /**
     * @Route("/processor/{id}", name="processor_show")
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $processor= $this->getDoctrine()
            ->getRepository(Processors::class)
            ->find($id);


        //Live update price for Desktop.bg
         $processorUrldes=$processor->getUrldes();
         var_dump($processorUrldes);
         echo error_reporting();
         $processorhtml=file_get_contents($processorUrldes);
         $m=[];
         $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if(preg_match($re,$processorhtml,$m))
        {
            $processor->setPricedes($m[1]);
        }
        else
            {
                $processor->setPricedes("0.00");
            }
       //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $processorUrlArdes=$processor->getUrlardes();
        $processor1html=file_get_contents($processorUrlArdes);
        $m1=[];
        $re1='/gProductPrice\s=\s(\d+\.?\d*)/m';
        if(preg_match($re1,$processor1html,$m1))
        {
            $processor->setPriceardes($m1[1]);
        }
        else
        {
            $processor->setPriceardes("0.00");
        }
        //End of code for updating price for Ardes.bg



        //Live update price for Emag.bg
        $processorUrlEmag=$processor->getUrlemag();
        $processor2html=file_get_contents($processorUrlEmag);
        $m2=[];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if(preg_match($re2,$processor2html,$m2))
        {
            $processor->setPriceemag($m2[1]);
        }
        else
        {
            $processor->setPriceemag("0.00");
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processorUrljar=$processor->getUrljar();
        $processor3html=file_get_contents($processorUrljar);
        $m3=[];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if(preg_match($re3,$processor3html,$m3))
        {
            $processor->setPricejar($m3[1]);
        }
        else
        {
            $processor->setPricejar("0.00");
        }
        //End of code for updating price for Jar.bg

        if (!$processor) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('processor/processor-product.html.twig', ['processor' => $processor]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }

    /**
     * @Route("/processor/delete/{id}", name="processor_delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $processor= $this->getDoctrine()
            ->getRepository(Processors::class)
            ->findOneBy($id);
        if (!$processor) {
            throw $this->createNotFoundException('No processor found for id '.$id);
        }
        $entityManager->remove($processor);
        $entityManager->flush();
        return new Response('Deleted processor');
    }

    /**
     * @Route("/processor/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $processor = $entityManager->getRepository(Processors::class)->find($id);

        if (!$processor) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //$processor->setPricedes(1129.00);

       // $processor->setPriceardes(1238.00);

       // $processor->setPriceemag(1126.80);

       // $processor->setPricejar(1109.00);
        $processor->seturldes('https://desktop.bg/search?utf8=%E2%9C%93&q=intel+i5+8400');

        $entityManager->flush();

        return new Response('Updated processor');
    }
    }

