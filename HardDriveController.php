<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 2/26/2019
 * Time: 11:05 PM
 */

namespace App\Controller;
use App\Entity\HardDrive;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HardDriveController extends AbstractController
{
    /**
     * @Route("/hard/add", name="hard_add")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $hard = new HardDrive();

        $hard->setName('Western Digital Gold 3.5 8TB 7200rpm');

        $hard->setCapacity('8000 GB');

        $hard->setSpeed('7200rpm');

        $hard->setCache('256 MB');

        $hard->setMaxspeed('6 Gbps');

        $hard->setLaptop('Не');

        $hard->setInterface('SATA3');

        $hard->setPricedew('0.00');

        $hard->setPriceardes('0.00');

        $hard->setPriceemag('0.00');

        $hard->setPricejar('0.00');

        $hard->setUrldes('https://desktop.bg/desktop_harddrives-western_digital-WD8003FRYZ');

        $hard->setUrlardes('https://ardes.bg/product/8tb-wd-gold-wd8003fryz-wd8003fryz-98725');

        $hard->setUrlemag('https://www.emag.bg/hard-disk-8tb-wd-gold-7200-oborota-minuta-256-mb-sata-3-wd8003fryz/pd/DGRC4NBBM/?X-Search-Id=246ba6fe78750ca17daf&X-Product-Id=26063233&X-Search-Page=1&X-Search-Position=3&X-Section=search&X-MB=0&X-Search-Action=view');

        $hard->setUrljar('https://www.jarcomputers.com/8-TB-Western-Digital-Gold-WD8003FRYZ_prod_HDDPCWDWD8003FRYZ.html?ref=prod');

        $hard->setImage('https://desktop.bg/system/images/168194/normal/WD8003FRYZ.jpg');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($hard);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$hard->getId());
    }
    /**
     * @Route("/hard/{id}", name="hard_show")
     */
    public function show($id)
    {
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



        //Live update price for Ioncomputers.bg
        $hardUrlEmag=$hard->getUrlemag();
        $hard2html=file_get_contents($hardUrlEmag);
        $m2=[];
        $re2 = '/\=\"price"\>(\d+\.?\d*)/m';
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

        //return new Response('Check out this great product: '.$processor->getName());


        return $this->render('hard/hard-product.html.twig', ['hard' => $hard]);

        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);

    }
    /**
     * @Route("/hard/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $hard = $entityManager->getRepository(HardDrive::class)->find($id);

        if (!$hard) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        /*$hard->setpricedes('0.00');
        $hard->setpriceardes('0.00');
        $hard->setpriceemag('0.00');
        $hard->setpricejar('0.00');
        $hard->seturldes('https://desktop.bg/desktop_power_supplies-deepcool-deepcool_da500');
        $hard->seturlardes('https://ardes.bg/product/500w-deepcool-da500-dp-bz-da500-106244');
        $hard->seturlemag('https://www.emag.bg/zahranvasht-blok-deepcool-da500-500w-dp-bz-da500/pd/DK0159BBM/');*/
        $hard->seturljar('https://www.jarcomputers.com/2TB-Seagate-Barracuda-ST2000DM008_prodold_HDDPCSEAGATEST2000DM008.html?ref=seagate%20barracuda%203.5%202tb');
        //$hard->setimage('https://desktop.bg/system/images/160002/normal/deepcool_da500.jpg');


        $entityManager->flush();

        return new Response('Updated hard');
    }
}