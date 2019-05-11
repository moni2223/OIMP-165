<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 2/26/2019
 * Time: 9:57 PM
 */

namespace App\Controller;

use App\Entity\RAM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class RAMController extends AbstractController
{
    /**
     * @Route("/ram/add", name="ram-add")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $ram = new RAM();

        $ram->setName('Crucial 4GB DDR3 1600MHz');

        $ram->setMemory('4 GB');

        $ram->setMemoryfordb('4');

        $ram->setPack('1x4GB');

        $ram->setType('DDR3');

        $ram->setSpeed('1600MHz');

        $ram->setMulti('Single-Channel');

        $ram->setCAS('CL 9');

        $ram->setCooling('Да');

        $ram->setVoltage('1.5V');

        $ram->setPricedes(0.00);

        $ram->setPriceardes(0.00);

        $ram->setPriceemag(0.00);

        $ram->setPricejar(0.00);

        $ram->setUrldes('https://desktop.bg/desktop_rams-crucial-4gb_ddr3_1600mhz_crucial_ballistix_sport');

        $ram->setUrlardes('https://ardes.bg/product/4gb-ddr3-1600-crucial-ballistix-sport-72845');

        $ram->setUrlemag('https://www.emag.bg/pamet-crucial-4-gb-ddr3-1600-cl9-72845/pd/DPP203BBM/?X-Search-Id=149b24ca078e0bc86298&X-Product-Id=14317187&X-Search-Page=1&X-Search-Position=0&X-Section=search&X-MB=0&X-Search-Action=view');

        $ram->setUrljar('https://www.jarcomputers.com/p/MRAMCRUCIALBLS4G3D1609DS1S00CE/?ref=crucial%204gb%20ddr3%201600');

        $ram->setImage('https://desktop.bg/system/images/170785/normal/4gb_ddr3_1600mhz_crucial_ballistix_sport.jpg');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($ram);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$ram->getId());
    }
    /**
     * @Route("/ram/{id}", name="ram_show")
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $ram= $this->getDoctrine()
            ->getRepository(RAM::class)
            ->find($id);


        //Live update price for Desktop.bg
        $ramUrldes=$ram->getUrldes();
        $ramhtml=file_get_contents($ramUrldes);
        $m=[];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if(preg_match($re,$ramhtml,$m))
        {
            $ram->setPricedes($m[1]);
        }

        else
        {
            $ram->setPricedes("0.00");
        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $ramUrlArdes=$ram->getUrlardes();
        $ram1html=file_get_contents($ramUrlArdes);
        $m1=[];
        $re1='/gProductPrice\s=\s(\d+\.?\d*)/m';
        if(preg_match($re1,$ram1html,$m1))
        {
            $ram->setPriceardes($m1[1]);
        }

        else
        {
            $ram->setPriceardes("0.00");
        }
        //End of code for updating price for Ardes.bg



        //Live update price for Emag.bg
        $ramUrlEmag=$ram->getUrlemag();
        $ram2html=file_get_contents($ramUrlEmag);
        $m2=[];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if(preg_match($re2,$ram2html,$m2))
        {
            $ram->setPriceemag($m2[1]);
        }

        else
        {
            $ram->setPriceemag("0.00");
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.com
        $ramUrlJar=$ram->getUrljar();
        $ram3html=file_get_contents($ramUrlJar);
        $m3=[];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if(preg_match($re3,$ram3html,$m3))
        {
                $ram->setPricejar($m3[1]);

        }

        else
        {
            $ram->setPricejar("0.00");
        }

        if (!$ram) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('ram/ram-product.html.twig', ['ram' => $ram]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }
    /**
     * @Route("/ram/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $ram = $entityManager->getRepository(RAM::class)->find($id);

        if (!$ram) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //$ram->setPriceardes('0.00');

        $entityManager->flush();

        return new Response('Updated ram');
    }

}