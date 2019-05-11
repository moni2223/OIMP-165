<?php

namespace App\Controller;

use App\Entity\VideoCards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VideoCardsController extends AbstractController
{
    /**
     * @Route("/videocard/add", name="videocard-add")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $videocard = new VideoCards();

        $videocard->setName('MSI Radeon RX Vega 56 8GB HBM2');

        $videocard->setType('	PCI-Express');

        $videocard->setBrand('AMD');

        $videocard->setChipset('AMD Radeon');

        $videocard->setCooling('Активно');

        $videocard->setCoolers('1');

        $videocard->setGPUspeed('1156 MHz');

        $videocard->setGPUmemory('800 MHz');

        $videocard->setMemory('8192 MB');

        $videocard->setOutput('HDMI/ DisplayPort');
        //$videocard->setOutput('HDMI/ DisplayPort');

        $videocard->setPricedes(559.00);

        $videocard->setPriceardes(562.00);

        $videocard->setPriceemag(561.00);

        $videocard->setPricejar(550.16);

        $videocard->setUrldes('https://desktop.bg/desktop_video_cards-amd-Radeon_RX_VEGA_56-msi_radeon_rx_vega_56_air_boost_8g_oc');

        $videocard->setUrlardes('https://ardes.bg/product/msi-radeon-rx-vega-56-8gb-air-boost-oc-rx-vega-56-air-boost-8g-oc-108558');

        $videocard->setUrlemag('https://www.emag.bg/video-karta-msi-radeon-rx-vega-56-8gb-air-boost-oc-hbm2-2048bit-hdmi-3-x-displayport-rx-vega-56-air-boost-8g-oc/pd/D6VC1FBBM/?X-Search-Id=98fce41238137ca5434a&X-Product-Id=32772955&X-Search-Page=1&X-Search-Position=0&X-Section=search&X-MB=0&X-Search-Action=view');

        $videocard->setUrljar('https://www.jarcomputers.com/p/VCRMSIRADEONRXVEGA56AIRBOOST8G/?ref=msi%20radeon%20rx%20vega%2056%208gb');

        $videocard->setImageurl('https://desktop.bg/system/images/172969/normal/msi_radeon_rx_vega_56_air_boost_8g_oc.png');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($videocard);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$videocard->getId());
    }
    /**
     * @Route("/videocard/{id}", name="videocard_show")
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $videocard= $this->getDoctrine()
            ->getRepository(VideoCards::class)
            ->find($id);


        //Live update price for Desktop.bg
        $videocardUrldes=$videocard->getUrldes();
        $videocardhtml=file_get_contents($videocardUrldes);
        $m=[];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if(preg_match($re,$videocardhtml,$m))
        {
            $videocard->setPricedes($m[1]);

        }

        else
        {
            $videocard->setPricedes("0.00");
        }
        //End of code for updating price for Desktop.bg


        //Live update price for Ardes.bg
        $videocardUrlArdes=$videocard->getUrlardes();
        $videocard1html=file_get_contents($videocardUrlArdes);
        $m1=[];
        $re1='/gProductPrice\s=\s(\d+\.?\d*)/m';
        if(preg_match($re1,$videocard1html,$m1))
        {
            $videocard->setPriceardes($m1[1]);
        }

        else
        {
            $videocard->setPriceardes("0.00");
        }
        //End of code for updating price for Ardes.bg



        //Live update price for Emag.bg
        $videocardUrlEmag=$videocard->getUrlemag();
        $videocard2html=file_get_contents($videocardUrlEmag);
        $m2=[];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if(preg_match($re2,$videocard2html,$m2))
        {
            $videocard->setPriceemag($m2[1]);
        }

        else
        {
            $videocard->setPriceemag("0.00");
        }
        //End of code for updating price for Emag.bg

         //Live update price for Jarcomputers.com
        $videocardUrlJar=$videocard->getUrljar();
        $videocard3html=file_get_contents($videocardUrlJar);
        $m3=[];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if(preg_match($re3,$videocard3html,$m3))
        {
            $videocard->setPricejar($m3[1]);
        }

        else
        {
            $videocard->setPricejar("0.00");
        }
        //End of code for updating price for Jarcomputers.bg

        if (!$videocard) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('video_cards/videocards-product.html.twig', ['videocard' => $videocard]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }
    /**
     * @Route("/videocard/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $videocard = $entityManager->getRepository(VideoCards::class)->find($id);

        if (!$videocard) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $videocard->setUrlemag('https://www.emag.bg/video-karta-gigabyte-geforcer-rtx-2070-windforce-8gb-gddr6-ga-vc-n2070wf3-8gc/pd/DL42YCBBM/?X-Search-Id=a7f6664e21a2e76b8dea&X-Product-Id=40818246&X-Search-Page=1&X-Search-Position=1&X-Section=search&X-MB=0&X-Search-Action=view');

        $entityManager->flush();

        return new Response('Updated videocard');
    }

}
