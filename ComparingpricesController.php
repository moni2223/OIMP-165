<?php

namespace App\Controller;

use App\Entity\HardDrive;
use App\Entity\Motherboards;
use App\Entity\Processors;
use App\Entity\RAM;
use App\Entity\VideoCards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComparingpricesController extends AbstractController
{
    /**
     * @Route("/compare", name="compareprices")
     */
    public function index()
    {
        return $this->render('comparingprices/prices.html.twig', [
            'controller_name' => 'ComparingpricesController',
        ]);
    }


    /**
     * @Route("/compare/processor", name="compareprocessor")
     */
    public function processorshow()
    {
     return $this->render('comparingprices/Processors/priceswithbrand.html.twig',[
         'controller_name' =>'ComparingpricesController',
         ]);
    }


    /**
     * @Route("/compare/processor/amd", name="amd")
     */
    public function amdshow()
    {
    $repository = $this->getDoctrine()->getRepository(Processors::class);
    $processors=$repository->findBy(
        ['Brand'=>'AMD']
    );
    //var_dump($processors);
     return $this->render('comparingprices/Processors/pricesAMD.html.twig',array('processors'=>$processors));
    }


    /**
     * @Route("/compare/processor/intel", name="intel")
     */
    public function intelshow()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processors=$repository->findBy(
            ['Brand'=>'Intel']
        );
        //var_dump($processors);
        return $this->render('comparingprices/Processors/pricesIntel.html.twig',array('processors'=>$processors));
    }


    /**
     * @Route("/compare/processor/all", name="all123")
     */
    public function allprocessorsshow()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processors = $repository->findAll();
        //var_dump($processors);
        return $this->render('comparingprices/Processors/pricesall.html.twig',array('processors'=>$processors));
    }


//-----------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/compare/videocard", name="comparevideocard")
     */
    public function videocardshow()
    {
        return $this->render('comparingprices/Videocards/priceswithbrandvideo.html.twig',[
            'controller_name' =>'ComparingpricesController',
        ]);
    }


    /**
     * @Route("/compare/videocard/amd", name="amd1")
     */
    public function amd1show()
    {
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $videocards=$repository->findBy(
            ['Brand'=>'AMD']
        );
        //var_dump($processors);
        return $this->render('comparingprices/Videocards/pricesAMDvideo.html.twig',array('videocards'=>$videocards));
    }


    /**
     * @Route("/compare/videocard/nvidia", name="Nvidia")
     */
    public function nvidiashow()
    {
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $videocards=$repository->findBy(
            ['Brand'=>'Nvidia']
        );
        //var_dump($processors);
        return $this->render('comparingprices/Videocards/pricesNvidia.html.twig',array('videocards'=>$videocards));
    }


    /**
     * @Route("/compare/videocard/all", name="allvideo")
     */
    public function allvideocardsshow()
    {
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $videocard = $repository->findAll();
        //var_dump($processors);
        return $this->render('comparingprices/Videocards/pricesallvideo.html.twig',array('videocards'=>$videocard));
    }


//-----------------------------------------------------------------------------------------------------------------------//


    /**
     * @Route("/compare/motherboard", name="comparemotherboard")
     */
    public function motherboardshow()
    {
        return $this->render('comparingprices/Motherboards/priceswithsocket.html.twig',[
            'controller_name' =>'ComparingpricesController',
        ]);
    }


    /**
     * @Route("/compare/motherboard/lga", name="LGA")
     */
    public function lgashow()
    {
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $motherboard=$repository->findBy(
            ['Socket'=>'LGA 1151']
        );
        //var_dump($processors);
        return $this->render('comparingprices/Motherboards/priceslga.html.twig',array('motherboards'=>$motherboard));
    }


    /**
     * @Route("/compare/motherboard/am4", name="AM4")
     */
    public function am4show()
    {
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $motherboard=$repository->findBy(
            ['Socket'=>'AM4']
        );
        //var_dump($processors);
        return $this->render('comparingprices/Motherboards/pricesam4.html.twig',array('motherboards'=>$motherboard));
    }


    /**
     * @Route("/compare/motherboard/all", name="allsocket")
     */
    public function allmotherboardsshow()
    {
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $motherboard = $repository->findAll();
        //var_dump($processors);
        return $this->render('comparingprices/Motherboards/pricesallsockets.html.twig',array('motherboards'=>$motherboard));
    }




//-----------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/compare/ram", name="compareram")
     */
    public function ramshow()
    {
        return $this->render('comparingprices/ram/priceswithsize.html.twig',[
            'controller_name' =>'ComparingpricesController',
        ]);
    }


    /**
     * @Route("/compare/ram/ddr4", name="8gb")
     */
    public function eightgbshow()
    {
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram=$repository->findBy(
            ['Type'=>'DDR4']
        );
        //var_dump($processors);
        return $this->render('comparingprices/ram/prices8gb.html.twig',array('rams'=>$ram));
    }


    /**
     * @Route("/compare/ram/ddr3", name="4gb")
     */
    public function fourgbshow()
    {
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram=$repository->findBy(
            ['Type'=>'DDR3']
        );
        //var_dump($processors);
        return $this->render('comparingprices/ram/prices4gb.html.twig',array('rams'=>$ram));
    }


    /**
     * @Route("/compare/ram/all", name="all")
     */
    public function allramsshow()
    {
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram = $repository->findAll();
        //var_dump($processors);
        return $this->render('comparingprices/ram/pricesall.html.twig',array('rams'=>$ram));
    }




    //-----------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/compare/hard", name="comparehard")
     */
    public function hardshow()
    {    $repository = $this->getDoctrine()->getRepository(HardDrive::class);
        $hard = $repository->findAll();
        //var_dump($processors);
        return $this->render('comparingprices/priceallharddisk.html.twig',array('hards'=>$hard));
    }

//-----------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/allproducts", name="allproducts")
     */
    public function allproducts()
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
        return $this->render('index/allproducts.html.twig',['processor' => $processor,
            'videocard' => $videocard,
            'motherboard' => $motherboard,
            'ram' => $ram]);
    }

}
