<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 3/3/2019
 * Time: 5:43 PM
 */

namespace App\Controller;
use App\Entity\Powersupply;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PowerSupplyController extends AbstractController
{
    /**
     * @Route("/powersupply/add", name="powersupply_add")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $power = new Powersupply();

        $power->setName('Deepcool DA500 500W Bronze');

        $power->setPower('500 W');

        $power->setPFC('Активна');

        $power->setSizeofcooler('120 мм');

        $power->setMax3('18 A');

        $power->setMax5('16 A');

        $power->setMax12v1('38 A');

        $power->setButton('Да');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($power);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$power->getId());
    }
    /**
     * @Route("/power/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $power = $entityManager->getRepository(Powersupply::class)->find($id);

        if (!$power) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $power->setpricedes('0.00');
        $power->setpriceardes('0.00');
        $power->setpriceemag('0.00');
        $power->setpricejar('0.00');
        $power->seturldes('https://desktop.bg/desktop_power_supplies-evga-evga_supernova_850_g3');
        $power->seturlardes('https://ardes.bg/product/850w-evga-supernova-850-g3-evga-ps-850w-gold3-101040');
        $power->seturlemag('https://www.emag.bg/zahranvasht-blok-evga-supernova-850-g3-gold-850w-evga-ps-850w-gold3/pd/DM7S70BBM/?X-Search-Id=7a9dac937d651ae3c71f&X-Product-Id=26937722&X-Search-Page=1&X-Search-Position=0&X-Section=search&X-MB=0&X-Search-Action=view');
        $power->seturljar('https://www.jarcomputers.com/EVGA-SuperNOVA-850-G3-Gold-220-G3-0850-X2_prod_PWRPCEVGA220G30850X2.html?ref=prod');
        $power->setimage('https://desktop.bg/system/images/183606/normal/evga_supernova_850_g3.jpg');


        $entityManager->flush();

        return new Response('Updated hard');
    }
    /**
     * @Route("/power/{id}", name="power_show")
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $power= $this->getDoctrine()
            ->getRepository(Powersupply::class)
            ->find($id);


        //Live update price for Desktop.bg
        $powerUrldes=$power->getUrldes();
        $powerhtml=file_get_contents($powerUrldes);
        $m=[];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if(preg_match($re,$powerhtml,$m))
        {
            $power->setPricedes($m[1]);
        }

        else
        {
            $power->setPricedes("0.00");
        }


        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $powerUrlArdes=$power->getUrlardes();
        $power1html=file_get_contents($powerUrlArdes);
        $m1=[];
        $re1='/gProductPrice\s=\s(\d+\.?\d*)/m';
        if(preg_match($re1,$power1html,$m1))
        {
            $power->setPriceardes($m1[1]);
        }
        else
        {
            $power->setPriceardes("0.00");
        }

        //End of code for updating price for Ardes.bg



        //Live update price for Emag.bg
        $powerUrlEmag=$power->getUrlemag();
        $power2html=file_get_contents($powerUrlEmag);
        $m2=[];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if(preg_match($re2,$power2html,$m2))
        {
            $power->setPriceemag($m2[1]);
        }

        else
        {
            $power->setPriceemag("0.00");
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.com
        $powerUrlJar=$power->getUrljar();
        $power3html=file_get_contents($powerUrlJar);
        $m3=[];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if(preg_match($re3,$power3html,$m3))
        {
            $power->setPricejar($m3[1]);
        }

        else
        {
            $power->setPricejar("0.00");
        }
        //End of code for updating price for jarcomputers.com


        if (!$power) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('power/power-product.html.twig', ['power' => $power]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }
}