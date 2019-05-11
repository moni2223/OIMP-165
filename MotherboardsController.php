<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 2/24/2019
 * Time: 8:40 PM
 */

namespace App\Controller;

use App\Entity\Motherboards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class MotherboardsController extends AbstractController
{
    /**
     * @Route("/motherboard/add", name="motherboard-add")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $motherboard = new Motherboards();

        $motherboard->setName('ASRock X370 Pro4');

        $motherboard->setSocket('AM4');

        $motherboard->setCpusocket('Socket AM4');

        $motherboard->setType('AMD');

        $motherboard->setTypememory('DDR4');

        $motherboard->setIntegrated('Да');

        $motherboard->setDVI('Да');

        $motherboard->setHDMI('Да');

        $motherboard->setDisplayPort('Не');

        $motherboard->setPrice(189.00);

        $motherboard->setPriceardes(199.00);

        $motherboard->setPriceemag(188.69);

        $motherboard->setPricejar(193.29);

        $motherboard->setUrldes('https://desktop.bg/motherboards-asrock-X370-asrock_x370_pro4');

        $motherboard->setUrlardes('https://ardes.bg/product/asrock-x370-pro4-asrock-x370-pro4-107145');

        $motherboard->setUrlemag('https://www.emag.bg/dynna-platka-asrock-x370-pro4-socket-am4-asrock-x370-pro4/pd/D12J7FBBM/?X-Search-Id=67dc5f895075694a27fc&X-Product-Id=32834257&X-Search-Page=1&X-Search-Position=0&X-Section=search&X-MB=0&X-Search-Action=view');

        $motherboard->setUrljar('https://www.jarcomputers.com/p/MBAASROCKX370PRO4/?ref=asrock%20x370%20pro4');

        $motherboard->setUrlimage('https://desktop.bg/system/images/162537/normal/asrock_x370_pro4.png');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($motherboard);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$motherboard->getId());
    }

    /**
     * @Route("/motherboard/{id}", name="motherboard_show")
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $motherboard= $this->getDoctrine()
            ->getRepository(Motherboards::class)
            ->find($id);


        //Live update price for Desktop.bg
        $motherboardUrldes=$motherboard->getUrldes();
        $motherboardhtml=file_get_contents($motherboardUrldes);
        $m=[];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if(preg_match($re,$motherboardhtml,$m))
        {
            $motherboard->setPrice($m[1]);
        }
        else
        {
            $motherboard->setPrice("0.00");
        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $motherboardUrlArdes=$motherboard->getUrlardes();
        $motherboard1html=file_get_contents($motherboardUrlArdes);
        $m1=[];
        $re1='/gProductPrice\s=\s(\d+\.?\d*)/m';
        if(preg_match($re1,$motherboard1html,$m1))
        {

            $motherboard->setPriceardes($m1[1]);
        }
        else
        {
            $motherboard->setPriceardes("0.00");
        }
        //End of code for updating price for Ardes.bg



        //Live update price for Emag.bg
        $motherboardUrlEmag=$motherboard->getUrlemag();
        $motherboard2html=file_get_contents($motherboardUrlEmag);
        $m2=[];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if(preg_match($re2,$motherboard2html,$m2))
        {
            $motherboard->setPriceemag($m2[1]);
        }

        else
        {
            $motherboard->setPriceemag("0.00");
        }
        //End of code for updating price for Emag.bg



        //Live update price for Jarcomputers.com
        $motherboardUrlJar=$motherboard->getUrljar();
        $motherboard3html=file_get_contents($motherboardUrlJar);
        $m3=[];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if(preg_match($re3,$motherboard3html,$m3))
        {
            $motherboard->setPricejar($m3[1]);
        }

        else
        {
            $motherboard->setPricejar("0.00");
        }
        //End of code for updating price for Jarcomputers.com




        if (!$motherboard) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('motherboards/motherboard-product.html.twig', ['motherboard' => $motherboard]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }

    /**
     * @Route("/motherboard/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $motherboard = $entityManager->getRepository(Motherboards::class)->find($id);

        if (!$motherboard) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $motherboard->setUrljar('https://www.jarcomputers.com/Asus-PRIME-H310M-K-R20_prodold_MBIASUSPRIMEH310MKR20.html?ref=asus%20prime%20h310m-k');
        /*$motherboard->setName('ASUS PRIME X470-PRO');

        $motherboard->setSocket('AM4');

        $motherboard->setCpusocket('Socket AM4');

        $motherboard->setType('AMD');

        $motherboard->setTypememory('DDR4');

        $motherboard->setIntegrated('Не');

        $motherboard->setDVI('Не');

        $motherboard->setHDMI('Да');

        $motherboard->setDisplayPort('Да');*/


        $entityManager->flush();

        return new Response('Updated motherboard with id'.$motherboard->getId());
    }
}