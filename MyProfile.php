<?php

namespace App\Controller;

use App\Entity\HardDrive;
use App\Entity\Motherboards;
use App\Entity\Powersupply;
use App\Entity\Processors;
use App\Entity\RAM;
use App\Entity\User;
use App\Entity\VideoCards;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class MyProfile extends AbstractController
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @Route("/change/password", name="changepassword")
     */
    public function load(UserInterface $user,AuthorizationCheckerInterface $authorizationChecker)
    {
        if(false===$authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->render('index/exceptionLogged.html.twig');
        }
        return $this->render('profile/profile-edit.html.twig', [
            'controller_name' => 'MyProfile',
        ]);
    }


    /**
     * @Route("/change/passworda", name="button_take")
     */
    public function change(UserInterface $user, UserPasswordEncoderInterface $encoder,AuthorizationCheckerInterface $authorizationChecker)
    {
        if(false===$authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->render('index/exceptionLogged.html.twig');
        }
        $user = $this->getUser();
        $user_id = $user->getId();
        $oldpass = $_POST['old1'];
        $newpass = $_POST['new1'];


        $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);
        //Require and decode password
        if($this->passwordEncoder->isPasswordValid($user,$oldpass))
        {
            $encoded = $encoder->encodePassword($user, $newpass);
            $userdata->setPassword($encoded);
            $entityManager->flush();
        }
        else throw new Exception("Паролите не съвпадат");

        return new Response(' ');
    }

    /**
     * @Route("/myconfigurations", name="myconfig")
     */
    public function myconfig(AuthorizationCheckerInterface $authorizationChecker)
    {
        if(false===$authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->render('index/exceptionLogged.html.twig');
        }
        $user = $this->getUser();
        $user_id = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($user_id);
        $serialised_config1 = $user->getConfig1();
        $serialised_config2 = $user->getConfig2();
        $serialised_config3 = $user->getConfig3();
        $serialised_config4 = $user->getConfig4();
        $serialised_config5 = $user->getConfig5();

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $user_id
            );
        }
        $unserialized_config1 = unserialize($serialised_config1);
        $unserialized_config2 = unserialize($serialised_config2);
        $unserialized_config3 = unserialize($serialised_config3);
        $unserialized_config4 = unserialize($serialised_config4);
        $unserialized_config5 = unserialize($serialised_config5);
        return $this->render('profile/saved-configurations.html.twig', [
            'controller_name' => 'MyProfile',
            'user' => $user,
            'config1' => $unserialized_config1,
            'config2' => $unserialized_config2,
            'config3' => $unserialized_config3,
            'config4' => $unserialized_config4,
            'config5' => $unserialized_config5
        ]);

    }

    /**
     * @Route("/delete1", name="button_delete_1")
     */
    public function delete(UserInterface $user)
    {


        $user = $this->getUser();
        $user_id = $user->getId();
        //get the proccesor as index
        $configname1 = $_POST['Name1'];
        echo $configname1;
        $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);

        if (!$userdata) {
            throw $this->createNotFoundException('No user found for id ' . $user_id);
        }

        $serialised_config1 = $userdata->getConfig1();
        if ($configname1 == "Конфигурация 1:") {
            $userdata->setConfig1("");
            $entityManager->flush();
        }
        return new Response("bravo stana we");

    }

    /**
     * @Route("/delete2", name="button_delete_2")
     */
    public function delete2(UserInterface $user)
    {

        $user = $this->getUser();
        $user_id = $user->getId();
        //get the proccesor as index
        $configname2 = $_POST['Name2'];
        $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);

        if (!$userdata) {
            throw $this->createNotFoundException('No user found for id ' . $user_id);
        }

        $serialised_config2 = $user->getConfig2();


        if ($configname2 == "Конфигурация 2:") {
            $userdata->setConfig2("");
            $entityManager->flush();
        }
        //    $entityManager->remove($serialised_config2);
        //    $entityManager->flush();
        // }
        return new Response("bravo stana we");

    }

    /**
     * @Route("/delete3", name="button_delete_3")
     */
    public function delete3(UserInterface $user)
    {

        $user = $this->getUser();
        $user_id = $user->getId();
        //get the proccesor as index
        $configname3 = $_POST['Name3'];
        echo $configname3;
        $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);

        if (!$userdata) {
            throw $this->createNotFoundException('No user found for id ' . $user_id);
        }

        $serialised_config3 = $user->getConfig3();


        if ($configname3 == "Конфигурация 3:") {
            $userdata->setConfig3("");
            $entityManager->flush();
        }
        //    $entityManager->remove($serialised_config2);
        //    $entityManager->flush();
        // }
        return new Response("bravo stana we");

    }

    /**
     * @Route("/delete4", name="button_delete_4")
     */
    public function delete4(UserInterface $user)
    {

        $user = $this->getUser();
        $user_id = $user->getId();
        //get the proccesor as index
        $configname4 = $_POST['Name4'];
        $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);

        if (!$userdata) {
            throw $this->createNotFoundException('No user found for id ' . $user_id);
        }

        $serialised_config4 = $user->getConfig4();


        if ($configname4 == "Конфигурация 4:") {
            $userdata->setConfig4("");
            $entityManager->flush();
        }
        //    $entityManager->remove($serialised_config2);
        //    $entityManager->flush();
        // }
        return new Response("bravo stana we");

    }

    /**
     * @Route("/delete5", name="button_delete_5")
     */
    public function delete5(UserInterface $user)
    {
        $user = $this->getUser();
        $user_id = $user->getId();
        //get the proccesor as index
        $configname5 = $_POST['Name5'];
        echo $configname5;
        $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);

        if (!$userdata) {
            throw $this->createNotFoundException('No user found for id ' . $user_id);
        }

        $serialised_config5 = $user->getConfig5();


        if ($configname5 == "Конфигурация 5:") {
            $userdata->setConfig5("");
            $entityManager->flush();
        }
        //    $entityManager->remove($serialised_config2);
        //    $entityManager->flush();
        // }
        return new Response("bravo stana we");

    }

    /**
     * @Route("/calculate", name="button_calculate")
     */
    public function calculate()
    {
        $allArray = Array();
        $user = $this->getUser();
        $user_id = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($user_id);
        $serialised_config1 = $user->getConfig1();
        $serialised_config2 = $user->getConfig2();
        $serialised_config3 = $user->getConfig3();
        $serialised_config4 = $user->getConfig4();
        $serialised_config5 = $user->getConfig5();

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $user_id
            );
        }
        $unserialized_config1 = unserialize($serialised_config1);
        $unserialized_config2 = unserialize($serialised_config2);
        $unserialized_config3 = unserialize($serialised_config3);
        $unserialized_config4 = unserialize($serialised_config4);
        $unserialized_config5 = unserialize($serialised_config5);

        //getting part names
        $part = $_POST['Processor'];
//------------------------------------------------------------------------------------------------------------//
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findOneBy([
            'Name' => $part
        ]);
        $processorURLdesktop = $processor->getUrldes();
        $processorURLardes = $processor->getUrlardes();
        $processorURLemag = $processor->getUrlemag();
        $processsorURLjar = $processor->getUrljar();

        //Live price for Desktop.bg
        $processorhtml = file_get_contents($processorURLdesktop);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $processorhtml, $m)===0) {
            $price = floatval(100000.00);
        }
        else {
            $price = floatval($m[1]);
        }

        //Live price for Ardes.bg
        $processor1html = file_get_contents($processorURLardes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $processor1html, $m1)) {
            if($m1[1]=='0.00')
            {
                $price2 = floatval(100000.00);

            }
            else $price2 = floatval($m1[1]);
        }
        else
        {
            $price2 = floatval($m1[1]);

        }



        //Live price for Emag.bg
        $processor2html = file_get_contents($processorURLemag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $processor2html, $m2)) {
            if($m2[1]=='0.00')
            {
                $price3 = floatval(100000.00);

            }
            else $price3 = floatval($m2[1]);
        }
        else
        {
            $price3 = floatval($m2[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processor3html = file_get_contents($processsorURLjar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $processor3html, $m3)) {
            if($m3[1]=='0.00')
            {
                $price4 = floatval(100000.00);

            }
            else $price4 = floatval($m3[1]);
        }
        else
        {
            $price4 = floatval($m3[1]);

        }

        $lowestprice = min($price, $price2, $price3, $price4);
        if ($lowestprice == $price) {
            $lowestpricesite = "Desktop.bg";
        } else if ($lowestprice == $price2) {
            $lowestpricesite = "Ardes.bg";
        } else if ($lowestprice == $price3) {
            $lowestpricesite = "Emag.bg";
        } else if ($lowestprice == $price4) {
            $lowestpricesite = "Jarcomputers.bg";
        }

        $processorArray = array('lowestPriceSite' => $lowestpricesite,
            'lowestPrice' => $lowestprice);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part2 = $_POST['Dunno'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $part = $repository->findOneBy([
            'name' => $part2
        ]);
        $partURLdesktop = $part->getUrldes();
        $partURLardes = $part->getUrlardes();
        $partURLemag = $part->getUrlemag();
        $partURLjar = $part->getUrljar();

        //Live price for Desktop.bg
        $parthtml = file_get_contents($partURLdesktop);
        $m4 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $parthtml, $m4)===0) {
            $price5 = floatval(100000.00);
        } else {
            $price5 = floatval($m4[1]);
        }

        //Live price for Ardes.bg
        $part1html = file_get_contents($partURLardes);
        $m5 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $part1html, $m5)) {
            if($m5[1]=='0.00')
            {
                $price6 = floatval(100000.00);

            }
            else $price6 = floatval($m5[1]);
        }
        else
        {
            $price6 = floatval($m5[1]);

        }


        //Live price for Emag.bg
        $part2html = file_get_contents($partURLemag);
        $m6 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $part2html, $m6)) {
            if($m6[1]=='0.00')
            {
                $price7 = floatval(100000.00);

            }
            else $price7 = floatval($m6[1]);
        }
        else
        {
            $price7 = floatval($m6[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $part3html = file_get_contents($partURLjar);
        $m7 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $part3html, $m7)) {
            if($m7[1]=='0.00')
            {
                $price8 = floatval(100000.00);

            }
            else $price8 = floatval($m7[1]);
        }
        else
        {
            $price8 = floatval($m7[1]);

        }

        $lowestprice1 = min($price5, $price6, $price7, $price8);
        if ($lowestprice1 == $price5) {
            $lowestprice1site = "Desktop.bg";
        } else if ($lowestprice1 == $price6) {
            $lowestprice1site = "Ardes.bg";
        } else if ($lowestprice1 == $price7) {
            $lowestprice1site = "Emag.bg";
        } else if ($lowestprice1 == $price8) {
            $lowestprice1site = "Jarcomputers.bg";
        }

        $motherboardArray = array('lowestPriceSite' => $lowestprice1site,
            'lowestPrice' => $lowestprice1);
        //---------------------------------------------------------------------------------------------------------------------------//

        //getting part names
        $part3 = $_POST['RAM'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram = $repository->findOneBy([
            'name' => $part3
        ]);
        $ramURLdesktop = $ram->getUrldes();
        $ramURLardes = $ram->getUrlardes();
        $ramURLemag = $ram->getUrlemag();
        $ramURLjar = $ram->getUrljar();

        //Live price for Desktop.bg
        $ramhtml = file_get_contents($ramURLdesktop);
        $m8 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $ramhtml, $m8)===0) {
            $price9 = floatval(100000.00);
        } else {
            $price9 = floatval($m8[1]);
        }

        //Live price for Ardes.bg
        $ram2html = file_get_contents($ramURLardes);
        $m9 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $ram2html, $m9)) {
            if($m9[1]=='0.00')
            {
                $price10 = floatval(100000.00);

            }
            else $price10 = floatval($m9[1]);
        }
        else
        {
            $price10 = floatval($m9[1]);

        }


        //Live price for Emag.bg
        $ram3html = file_get_contents($ramURLemag);
        $m10 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $ram3html, $m10)) {
            if($m10[1]=='0.00')
            {
                $price11 = floatval(100000.00);

            }
            else $price11 = floatval($m10[1]);
        }
        else
        {
            $price11 = floatval($m10[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $ram4html = file_get_contents($ramURLjar);
        $m11 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $ram4html, $m11)) {
            if($m11[1]=='0.00')
            {
                $price12 = floatval(100000.00);

            }
            else $price12 = floatval($m11[1]);
        }
        else
        {
            $price12 = floatval($m11[1]);

        }

        $lowestprice2 = min($price9, $price10, $price11, $price12);
        if ($lowestprice2 == $price9) {
            $lowestprice2site = "Desktop.bg";
        } else if ($lowestprice2 == $price10) {
            $lowestprice2site = "Ardes.bg";
        } else if ($lowestprice2 == $price11) {
            $lowestprice2site = "Emag.bg";
        } else if ($lowestprice2 == $price12) {
            $lowestprice2site = "Jarcomputers.bg";
        }
        $ramArray = array('lowestPriceSite' => $lowestprice2site,
            'lowestPrice' => $lowestprice2);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part4 = $_POST['Hard'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(HardDrive::class);
        $hard = $repository->findOneBy([
            'Name' => $part4
        ]);
        $hardURLdesktop = $hard->getUrldes();
        $hardURLardes = $hard->getUrlardes();
        $hardURLemag = $hard->getUrlemag();
        $hardURLjar = $hard->getUrljar();

        //Live price for Desktop.bg
        $hardhtml = file_get_contents($hardURLdesktop);
        $m12 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $hardhtml, $m12)===0) {
            $price13 = floatval(100000.00);
        } else {
            $price13 = floatval($m12[1]);
        }

        //Live price for Ardes.bg
        $hard2html = file_get_contents($hardURLardes);
        $m13 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $hard2html, $m13)) {
            if($m13[1]=='0.00')
            {
                $price14 = floatval(100000.00);

            }
            else $price14 = floatval($m13[1]);
        }
        else if(preg_match($re1, $hard2html, $m13)===0)
        {
            $price14=10000;
        }

        //Live price for Emag.bg
        $hard3html = file_get_contents($hardURLemag);
        $m14 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $hard3html, $m14)) {
            if($m14[1]=='0.00')
            {
                $price15 = floatval(100000.00);

            }
            else $price15 = floatval($m14[1]);
        }
        else
        {
            $price15 = floatval($m14[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $hard4html = file_get_contents($hardURLjar);
        $m15 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $hard4html, $m15)) {
            if($m15[1]=='0.00')
            {
                $price16 = floatval(100000.00);

            }
            else $price16 = floatval($m15[1]);
        }
        else if(preg_match($re3, $hard4html, $m15)===0)
        {
            $price16 = 100000;

        }

        $lowestprice3 = min($price13, $price14, $price15, $price16);
        if ($lowestprice3 == $price13) {
            $lowestprice3site = "Desktop.bg";
        } else if ($lowestprice3 == $price14) {
            $lowestprice3site = "Ardes.bg";
        } else if ($lowestprice3 == $price15) {
            $lowestprice3site = "Emag.bg";
        } else if ($lowestprice3 == $price16) {
            $lowestprice3site = "Jarcomputers.bg";
        }
        $hardArray = array('lowestPriceSite' => $lowestprice3site,
            'lowestPrice' => $lowestprice3);
//---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part5 = $_POST['GPU'];
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $gpu = $repository->findOneBy([
            'name' => $part5
        ]);
        $gpuURLdesktop = $gpu->getUrldes();
        $gpuURLardes = $gpu->getUrlardes();
        $gpuURLemag = $gpu->getUrlemag();
        $gpuURLjar = $gpu->getUrljar();

        //Live price for Desktop.bg
        $gpuhtml = file_get_contents($gpuURLdesktop);
        $m16 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $gpuhtml, $m16)===0) {
            $price17 = floatval(100000.00);
        } else {
            $price17 = floatval($m16[1]);
        }

        //Live price for Ardes.bg
        $gpu2html = file_get_contents($gpuURLardes);
        $m17 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $gpu2html, $m17)) {
            if($m17[1]=='0.00')
            {
                $price18 = floatval(100000.00);

            }
            else $price18 = floatval($m17[1]);
        }
        else
        {
            $price18 = floatval($m17[1]);

        }


        //Live price for Emag.bg
        $gpu3html = file_get_contents($gpuURLemag);
        $m18 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $gpu3html, $m18)) {
            if($m18[1]=='0.00')
            {
                $price19 = floatval(100000.00);

            }
            else $price19 = floatval($m18[1]);
        }
        else
        {
            $price19 = floatval($m18[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $gpu4html = file_get_contents($gpuURLjar);
        $m19 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $gpu4html, $m19)) {
            if($m19[1]=='0.00')
            {
                $price20 = floatval(100000.00);

            }
            else $price20 = floatval($m19[1]);
        }
        else
        {
            $price20 = floatval($m19[1]);

        }

        $lowestprice4 = min($price17, $price18, $price19, $price20);
        if ($lowestprice4 == $price17) {
            $lowestprice4site = "Desktop.bg";
        } else if ($lowestprice4 == $price18) {
            $lowestprice4site = "Ardes.bg";
        } else if ($lowestprice4 == $price19) {
            $lowestprice4site = "Emag.bg";
        } else if ($lowestprice4 == $price20) {
            $lowestprice4site = "Jarcomputers.bg";
        }

        $gpuArray = array('lowestPriceSite' => $lowestprice4site,
            'lowestPrice' => $lowestprice4);
//---------------------------------------------------------------------------------------------------------//
        //getting part names

        $part6 = $_POST['Power'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Powersupply::class);
        $power = $repository->findOneBy([
            'name' => $part6
        ]);
        $powerURLdesktop = $power->getUrldes();
        $powerURLardes = $power->getUrlardes();
        $powerURLemag = $power->getUrlemag();
        $powerURLjar = $power->getUrljar();

        //Live price for Desktop.bg
        $powerhtml = file_get_contents($powerURLdesktop);
        $m20 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $powerhtml, $m20)===0) {
            $price21 = floatval(100000.00);
        } else {
            $price21 = floatval($m20[1]);
        }

        //Live price for Ardes.bg
        $power2html = file_get_contents($powerURLardes);
        $m21 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $power2html, $m21)) {
            if($m21[1]=='0.00')
            {
                $price22 = floatval(100000.00);

            }
            else $price22 = floatval($m21[1]);
        }
        else if(preg_match($re1, $power2html, $m21)===0)
        {
            $price22 = 10000;

        }


        //Live price for Emag.bg
        $power3html = file_get_contents($powerURLemag);
        $m22 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $power3html, $m22)) {
            if($m22[1]=='0.00')
            {
                $price23 = floatval(100000.00);

            }
            else $price23 = floatval($m22[1]);
        }
        else
        {
            $price23 = floatval($m22[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $power4html = file_get_contents($powerURLjar);
        $m23 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $power4html, $m23)) {
            if($m23[1]=='0.00')
            {
                $price24 = floatval(100000.00);

            }
            else $price24 = floatval($m5[1]);
        }
        else
        {
            $price24 = floatval($m5[1]);

        }

        $lowestprice5 = min($price21, $price22, $price23, $price24);
        if ($lowestprice5 == $price21) {
            $lowestprice5site = "Desktop.bg";
        } else if ($lowestprice5 == $price22) {
            $lowestprice5site = "Ardes.bg";
        } else if ($lowestprice5 == $price23) {
            $lowestprice5site = "Emag.bg";
        } else if ($lowestprice5 == $price24) {
            $lowestprice5site = "Jarcomputers.bg";
        }
        $powerSupplyArray = array('lowestPriceSite' => $lowestprice5site,
            'lowestPrice' => $lowestprice5);

        array_push($allArray, $processorArray, $motherboardArray, $ramArray, $hardArray, $gpuArray, $powerSupplyArray);

        echo json_encode($allArray);
        return new Response(" ");

    }


    /**
     * @Route("/calculate2", name="button_calculate2")
     */
    public function calculate2()
    {
        $allArray = Array();
        $user = $this->getUser();
        $user_id = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($user_id);
        $serialised_config1 = $user->getConfig1();
        $serialised_config2 = $user->getConfig2();
        $serialised_config3 = $user->getConfig3();
        $serialised_config4 = $user->getConfig4();
        $serialised_config5 = $user->getConfig5();

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $user_id
            );
        }
        $unserialized_config1 = unserialize($serialised_config1);
        $unserialized_config2 = unserialize($serialised_config2);
        $unserialized_config3 = unserialize($serialised_config3);
        $unserialized_config4 = unserialize($serialised_config4);
        $unserialized_config5 = unserialize($serialised_config5);

        //getting part names
        $part = $_POST['Processor2'];

//------------------------------------------------------------------------------------------------------------//
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findOneBy([
            'Name' => $part
        ]);
        $processorURLdesktop = $processor->getUrldes();
        $processorURLardes = $processor->getUrlardes();
        $processorURLemag = $processor->getUrlemag();
        $processsorURLjar = $processor->getUrljar();

        //Live price for Desktop.bg
        $processorhtml = file_get_contents($processorURLdesktop);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $processorhtml, $m)===0) {
            $price = floatval(100000.00);


        } else
            {
                $price = floatval($m[1]);

        }

        //Live price for Ardes.bg
        $processor1html = file_get_contents($processorURLardes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $processor1html, $m1)) {
            if($m1[1]=='0.00')
            {
                $price2 = floatval(100000.00);

            }
            else $price2 = floatval($m1[1]);
        }
        else
        {
            $price2 = floatval($m1[1]);

        }


        //Live price for Emag.bg
        $processor2html = file_get_contents($processorURLemag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $processor2html, $m2)) {
            if($m2[1]=='0.00')
            {
                $price3 = floatval(100000.00);

            }
            else $price3 = floatval($m2[1]);
        }
        else
        {
            $price3 = floatval($m2[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processor3html = file_get_contents($processsorURLjar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $processor3html, $m3)) {
            if($m3[1]=='0.00')
            {
                $price4 = floatval(100000.00);

            }
            else $price4 = floatval($m3[1]);
        }
        else
        {
            $price4 = floatval($m3[1]);

        }


        $lowestprice = min($price, $price2, $price3, $price4);
        if ($lowestprice == $price) {
            $lowestpricesite = "Desktop.bg";
        } else if ($lowestprice == $price2) {
            $lowestpricesite = "Ardes.bg";
        } else if ($lowestprice == $price3) {
            $lowestpricesite = "Emag.bg";
        } else if ($lowestprice == $price4) {
            $lowestpricesite = "Jarcomputers.bg";
        }

        $processorArray = array('lowestPriceSite' => $lowestpricesite,
            'lowestPrice' => $lowestprice);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part2 = $_POST['Dunno2'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $part = $repository->findOneBy([
            'name' => $part2
        ]);
        $partURLdesktop = $part->getUrldes();
        $partURLardes = $part->getUrlardes();
        $partURLemag = $part->getUrlemag();
        $partURLjar = $part->getUrljar();

        //Live price for Desktop.bg
        $parthtml = file_get_contents($partURLdesktop);
        $m4 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $parthtml, $m4)===0)
        {
            $price5 = 100000.00;
        }
        else $price5 = floatval($m4[1]);
        //Live price for Ardes.bg
        $part1html = file_get_contents($partURLardes);
        $m5 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $part1html, $m5)) {
            if($m5[1]=='0.00')
            {
                $price6 = floatval(100000.00);

            }
          else $price6 = floatval($m5[1]);
        }
        else
            {
                $price6 = floatval($m5[1]);

            }


        //Live price for Emag.bg
        $part2html = file_get_contents($partURLemag);
        $m6 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $part2html, $m6)) {
            if($m6[1]=='0.00')
            {
                $price7 = floatval(100000.00);

            }
            else $price7 = floatval($m6[1]);
        }
        else
        {
            $price7 = floatval($m6[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $part3html = file_get_contents($partURLjar);
        $m7 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $part3html, $m7)===1) {
            if ($m7[1]=='0.00')
            {
                $price8 = floatval(100000.00);

            }
            else $price8 = floatval($m7[1]);

        } else
            {  $price8 = floatval($m7[1]);

        }

        $lowestprice1 = min($price5, $price6, $price7, $price8);
        if ($lowestprice1 == $price5) {
            $lowestprice1site = "Desktop.bg";
        } else if ($lowestprice1 == $price6) {
            $lowestprice1site = "Ardes.bg";
        } else if ($lowestprice1 == $price7) {
            $lowestprice1site = "Emag.bg";
        } else if ($lowestprice1 == $price8) {
            $lowestprice1site = "Jarcomputers.bg";
        }

        $motherboardArray = array('lowestPriceSite' => $lowestprice1site,
            'lowestPrice' => $lowestprice1);
        //---------------------------------------------------------------------------------------------------------------------------//

        //getting part names
        $part3 = $_POST['RAM2'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram = $repository->findOneBy([
            'name' => $part3
        ]);
        $ramURLdesktop = $ram->getUrldes();
        $ramURLardes = $ram->getUrlardes();
        $ramURLemag = $ram->getUrlemag();
        $ramURLjar = $ram->getUrljar();

        //Live price for Desktop.bg
        $ramhtml = file_get_contents($ramURLdesktop);
        $m8 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $ramhtml, $m8)===0) {
            $price9 = floatval(100000.00);

        } else {
            $price9 = floatval($m8[1]);

        }

        //Live price for Ardes.bg
        $ram2html = file_get_contents($ramURLardes);
        $m9 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $ram2html, $m9)) {
            if ($m9[1]=='0.00')
            {
                $price10 = floatval(100000.00);

            }
            else $price10 = floatval($m9[1]);

        } else if (preg_match($re1, $ram2html, $m9)===0)
        {  $price10 = 10000;

        }


        //Live price for Emag.bg
        $ram3html = file_get_contents($ramURLemag);
        $m10 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $ram3html, $m10)) {
            if ($m10[1]=='0.00')
            {
                $price11 = floatval(100000.00);

            }
            else $price11 = floatval($m10[1]);

        } else
        {  $price11 = floatval($m10[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $ram4html = file_get_contents($ramURLjar);
        $m11 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $ram4html, $m11)) {
            if ($m11[1]=='0.00')
            {
                $price12 = floatval(100000.00);

            }
            else $price12 = floatval($m11[1]);

        } else
        {  $price12 = floatval($m11[1]);

        }

        $lowestprice2 = min($price9, $price10, $price11, $price12);
        if ($lowestprice2 == $price9) {
            $lowestprice2site = "Desktop.bg";
        } else if ($lowestprice2 == $price10) {
            $lowestprice2site = "Ardes.bg";
        } else if ($lowestprice2 == $price11) {
            $lowestprice2site = "Emag.bg";
        } else if ($lowestprice2 == $price12) {
            $lowestprice2site = "Jarcomputers.bg";
        }
        $ramArray = array('lowestPriceSite' => $lowestprice2site,
            'lowestPrice' => $lowestprice2);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part4 = $_POST['Hard2'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(HardDrive::class);
        $hard = $repository->findOneBy([
            'Name' => $part4
        ]);
        $hardURLdesktop = $hard->getUrldes();
        $hardURLardes = $hard->getUrlardes();
        $hardURLemag = $hard->getUrlemag();
        $hardURLjar = $hard->getUrljar();

        //Live price for Desktop.bg
        $hardhtml = file_get_contents($hardURLdesktop);
        $m12 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $hardhtml, $m12)===0) {
            $price13 = floatval(100000.00);

        } else {
            $price13 = floatval($m12[1]);
        }

        //Live price for Ardes.bg
        $hard2html = file_get_contents($hardURLardes);
        $m13 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $hard2html, $m13)) {
            if ($m13[1]=='0.00')
            {
                $price14 = floatval(100000.00);

            }
            else $price14 = floatval($m13[1]);

        } else
        {  $price14 = floatval($m13[1]);

        }


        //Live price for Emag.bg
        $hard3html = file_get_contents($hardURLemag);
        $m14 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $hard3html, $m14)) {
            if ($m14[1]=='0.00')
            {
                $price15 = floatval(100000.00);

            }
            else $price15 = floatval($m14[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $hard4html = file_get_contents($hardURLjar);
        $m15 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $hard4html, $m15)) {
            if ($m15[1]=='0.00'||$m15[1]=="0")
            {
                $price16 = floatval(100000.00);

            }
            else $price16 = floatval($m15[1]);

        }
        else if (preg_match($re3, $hard4html, $m15)===0)
        {
           $price16=10000;
        }


        $lowestprice3 = min($price13, $price14, $price15, $price16);
        if ($lowestprice3 == $price13) {
            $lowestprice3site = "Desktop.bg";
        } else if ($lowestprice3 == $price14) {
            $lowestprice3site = "Ardes.bg";
        } else if ($lowestprice3 == $price15) {
            $lowestprice3site = "Emag.bg";
        } else if ($lowestprice3 == $price16) {
            $lowestprice3site = "Jarcomputers.bg";
        }
        $hardArray = array('lowestPriceSite' => $lowestprice3site,
            'lowestPrice' => $lowestprice3);
//---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part5 = $_POST['GPU2'];
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $gpu = $repository->findOneBy([
            'name' => $part5
        ]);
        $gpuURLdesktop = $gpu->getUrldes();
        $gpuURLardes = $gpu->getUrlardes();
        $gpuURLemag = $gpu->getUrlemag();
        $gpuURLjar = $gpu->getUrljar();

        //Live price for Desktop.bg
        $gpuhtml = file_get_contents($gpuURLdesktop);
        $m16 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $gpuhtml, $m16)===0) {
            $price17 = floatval(100000.00);
        } else {
            $price17 = floatval($m16[1]);
        }

        //Live price for Ardes.bg
        $gpu2html = file_get_contents($gpuURLardes);
        $m17 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $gpu2html, $m17)) {
            if ($m17[1]=='0.00')
            {
                $price18 = floatval(100000.00);

            }
            else $price18 = floatval($m17[1]);

        } else
        {  $price18 = floatval($m17[1]);

        }



        //Live price for Emag.bg
        $gpu3html = file_get_contents($gpuURLemag);
        $m18 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $gpu3html, $m18)) {
            if ($m18[1]=='0.00')
            {
                $price19 = floatval(100000.00);

            }
            else $price19 = floatval($m18[1]);

        } else
        {  $price19 = floatval($m18[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $gpu4html = file_get_contents($gpuURLjar);
        $m19 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $gpu4html, $m19)) {
            if ($m19[1]=='0.00')
            {
                $price20 = floatval(100000.00);

            }
            else $price20 = floatval($m19[1]);

        } else
        {  $price20 = floatval($m19[1]);

        }


        $lowestprice4 = min($price17, $price18, $price19, $price20);
        if ($lowestprice4 == $price17) {
            $lowestprice4site = "Desktop.bg";
        } else if ($lowestprice4 == $price18) {
            $lowestprice4site = "Ardes.bg";
        } else if ($lowestprice4 == $price19) {
            $lowestprice4site = "Emag.bg";
        } else if ($lowestprice4 == $price20) {
            $lowestprice4site = "Jarcomputers.bg";
        }

        $gpuArray = array('lowestPriceSite' => $lowestprice4site,
            'lowestPrice' => $lowestprice4);
//---------------------------------------------------------------------------------------------------------//
        //getting part names

        $part6 = $_POST['Power2'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Powersupply::class);
        $power = $repository->findOneBy([
            'name' => $part6
        ]);
        $powerURLdesktop = $power->getUrldes();
        $powerURLardes = $power->getUrlardes();
        $powerURLemag = $power->getUrlemag();
        $powerURLjar = $power->getUrljar();

        //Live price for Desktop.bg
        $powerhtml = file_get_contents($powerURLdesktop);
        $m20 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $powerhtml, $m20)===0) {
            $price21 = floatval(10000.00);
        } else {
            $price21 = floatval($m20[1]);
        }

        //Live price for Ardes.bg
        $power2html = file_get_contents($powerURLardes);
        $m21 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $power2html, $m21)) {
            if ($m21[1]=='0.00')
            {
                $price22 = floatval(100000.00);

            }
            else $price22 = floatval($m21[1]);

        }
        else if (preg_match($re1, $power2html, $m21)===0)
        {
            $price22 = 10000;

        }


        //Live price for Emag.bg
        $power3html = file_get_contents($powerURLemag);
        $m22 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $power3html, $m22)) {
            if ($m22[1]=='0.00')
            {
                $price23 = floatval(100000.00);

            }
            else $price23 = floatval($m22[1]);

        } else
        {  $price23 = floatval($m22[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $power4html = file_get_contents($powerURLjar);
        $m23 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $power4html, $m23)) {
            if ($m23[1]=='0.00')
            {
                $price24 = floatval(100000.00);

            }
            else $price24 = floatval($m23[1]);

        } else
        {  $price24 = floatval($m23[1]);

        }


        $lowestprice5 = min($price21, $price22, $price23, $price24);
        if ($lowestprice5 == $price21) {
            $lowestprice5site = "Desktop.bg";
        } else if ($lowestprice5 == $price22) {
            $lowestprice5site = "Ardes.bg";
        } else if ($lowestprice5 == $price23) {
            $lowestprice5site = "Emag.bg";
        } else if ($lowestprice5 == $price24) {
            $lowestprice5site = "Jarcomputers.bg";
        }
        $powerSupplyArray = array('lowestPriceSite' => $lowestprice5site,
            'lowestPrice' => $lowestprice5);

        array_push($allArray, $processorArray, $motherboardArray, $ramArray, $hardArray, $gpuArray, $powerSupplyArray);

        echo json_encode($allArray);
        return new Response(" ");


    }


    /**
     * @Route("/calculate3", name="button_calculate3")
     */
    public function calculate3()
    {
        $allArray = Array();
        $user = $this->getUser();
        $user_id = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($user_id);
        $serialised_config1 = $user->getConfig1();
        $serialised_config2 = $user->getConfig2();
        $serialised_config3 = $user->getConfig3();
        $serialised_config4 = $user->getConfig4();
        $serialised_config5 = $user->getConfig5();

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $user_id
            );
        }
        $unserialized_config1 = unserialize($serialised_config1);
        $unserialized_config2 = unserialize($serialised_config2);
        $unserialized_config3 = unserialize($serialised_config3);
        $unserialized_config4 = unserialize($serialised_config4);
        $unserialized_config5 = unserialize($serialised_config5);

        //getting part names
        $part = $_POST['Processor3'];

//------------------------------------------------------------------------------------------------------------//
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findOneBy([
            'Name' => $part
        ]);
        $processorURLdesktop = $processor->getUrldes();
        $processorURLardes = $processor->getUrlardes();
        $processorURLemag = $processor->getUrlemag();
        $processsorURLjar = $processor->getUrljar();

        //Live price for Desktop.bg
        $processorhtml = file_get_contents($processorURLdesktop);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $processorhtml, $m)) {
            $price = floatval($m[1]);

        } else {
            $price = floatval(100000.00);

        }

        //Live price for Ardes.bg
        $processor1html = file_get_contents($processorURLardes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $processor1html, $m1)) {
            $price2 = floatval($m1[1]);
        } else {
            $price2 = floatval(100000.00);
        }


        //Live price for Emag.bg
        $processor2html = file_get_contents($processorURLemag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $processor2html, $m2)) {
            $price3 = floatval($m2[1]);
        } else {
            $price3 = floatval(100000.00);
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processor3html = file_get_contents($processsorURLjar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $processor3html, $m3)) {
            $price4 = floatval($m3[1]);
        } else {
            $price4 = floatval(100000.00);
        }

        $lowestprice = min($price, $price2, $price3, $price4);
        if ($lowestprice == $price) {
            $lowestpricesite = "Desktop.bg";
        } else if ($lowestprice == $price2) {
            $lowestpricesite = "Ardes.bg";
        } else if ($lowestprice == $price3) {
            $lowestpricesite = "Emag.bg";
        } else if ($lowestprice == $price4) {
            $lowestpricesite = "Jarcomputers.bg";
        }

        $processorArray = array('lowestPriceSite' => $lowestpricesite,
            'lowestPrice' => $lowestprice);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part2 = $_POST['Dunno3'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $part = $repository->findOneBy([
            'name' => $part2
        ]);
        $partURLdesktop = $part->getUrldes();
        $partURLardes = $part->getUrlardes();
        $partURLemag = $part->getUrlemag();
        $partURLjar = $part->getUrljar();

        //Live price for Desktop.bg
        $parthtml = file_get_contents($partURLdesktop);
        $m4 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $parthtml, $m4)===0)
        {
            $price5 = 100000.00;
        }
        else $price5 = floatval($m4[1]);
        //Live price for Ardes.bg
        $part1html = file_get_contents($partURLardes);
        $m5 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $part1html, $m5)) {
            if($m5[1]=='0.00')
            {
                $price6 = floatval(100000.00);

            }
            else $price6 = floatval($m5[1]);
        }
        else
        {
            $price6 = floatval($m5[1]);

        }


        //Live price for Emag.bg
        $part2html = file_get_contents($partURLemag);
        $m6 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $part2html, $m6)) {
            if($m6[1]=='0.00')
            {
                $price7 = floatval(100000.00);

            }
            else $price7 = floatval($m6[1]);
        }
        else
        {
            $price7 = floatval($m6[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $part3html = file_get_contents($partURLjar);
        $m7 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $part3html, $m7)===1) {
            if ($m7[1]=='0.00')
            {
                $price8 = floatval(100000.00);

            }
            else $price8 = floatval($m7[1]);

        } else
        {  $price8 = floatval($m7[1]);

        }

        $lowestprice1 = min($price5, $price6, $price7, $price8);
        if ($lowestprice1 == $price5) {
            $lowestprice1site = "Desktop.bg";
        } else if ($lowestprice1 == $price6) {
            $lowestprice1site = "Ardes.bg";
        } else if ($lowestprice1 == $price7) {
            $lowestprice1site = "Emag.bg";
        } else if ($lowestprice1 == $price8) {
            $lowestprice1site = "Jarcomputers.bg";
        }

        $motherboardArray = array('lowestPriceSite' => $lowestprice1site,
            'lowestPrice' => $lowestprice1);
        //---------------------------------------------------------------------------------------------------------------------------//

        //getting part names
        $part3 = $_POST['RAM3'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram = $repository->findOneBy([
            'name' => $part3
        ]);
        $ramURLdesktop = $ram->getUrldes();
        $ramURLardes = $ram->getUrlardes();
        $ramURLemag = $ram->getUrlemag();
        $ramURLjar = $ram->getUrljar();

        //Live price for Desktop.bg
        $ramhtml = file_get_contents($ramURLdesktop);
        $m8 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $ramhtml, $m8)===0) {
            $price9 = floatval(100000.00);

        } else {
            $price9 = floatval($m8[1]);

        }

        //Live price for Ardes.bg
        $ram2html = file_get_contents($ramURLardes);
        $m9 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $ram2html, $m9)) {
            if ($m9[1]=='0.00')
            {
                $price10 = floatval(100000.00);

            }
            else $price10 = floatval($m9[1]);

        } else
        {  $price10 = floatval($m9[1]);

        }


        //Live price for Emag.bg
        $ram3html = file_get_contents($ramURLemag);
        $m10 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $ram3html, $m10)) {
            if ($m10[1]=='0.00')
            {
                $price11 = floatval(100000.00);

            }
            else $price11 = floatval($m10[1]);

        } else
        {  $price11 = floatval($m10[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $ram4html = file_get_contents($ramURLjar);
        $m11 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $ram4html, $m11)) {
            if ($m11[1]=='0.00')
            {
                $price12 = floatval(100000.00);

            }
            else $price12 = floatval($m11[1]);

        } else
        {  $price12 = floatval($m11[1]);

        }

        $lowestprice2 = min($price9, $price10, $price11, $price12);
        if ($lowestprice2 == $price9) {
            $lowestprice2site = "Desktop.bg";
        } else if ($lowestprice2 == $price10) {
            $lowestprice2site = "Ardes.bg";
        } else if ($lowestprice2 == $price11) {
            $lowestprice2site = "Emag.bg";
        } else if ($lowestprice2 == $price12) {
            $lowestprice2site = "Jarcomputers.bg";
        }
        $ramArray = array('lowestPriceSite' => $lowestprice2site,
            'lowestPrice' => $lowestprice2);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part4 = $_POST['Hard3'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(HardDrive::class);
        $hard = $repository->findOneBy([
            'Name' => $part4
        ]);
        $hardURLdesktop = $hard->getUrldes();
        $hardURLardes = $hard->getUrlardes();
        $hardURLemag = $hard->getUrlemag();
        $hardURLjar = $hard->getUrljar();

        //Live price for Desktop.bg
        $hardhtml = file_get_contents($hardURLdesktop);
        $m12 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $hardhtml, $m12)===0) {
            $price13 = floatval(100000.00);

        } else {
            $price13 = floatval($m12[1]);
        }

        //Live price for Ardes.bg
        $hard2html = file_get_contents($hardURLardes);
        $m13 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $hard2html, $m13)) {
            if ($m13[1]=='0.00')
            {
                $price14 = floatval(100000.00);

            }
            else $price14 = floatval($m13[1]);

        } else
        {  $price14 = floatval($m13[1]);

        }


        //Live price for Emag.bg
        $hard3html = file_get_contents($hardURLemag);
        $m14 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $hard3html, $m14)) {
            if ($m14[1]=='0.00')
            {
                $price15 = floatval(100000.00);

            }
            else $price15 = floatval($m14[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $hard4html = file_get_contents($hardURLjar);
        $m15 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $hard4html, $m15)) {
            if ($m15[1]=='0.00'||$m15[1]=="0")
            {
                $price16 = floatval(100000.00);

            }
            else $price16 = floatval($m15[1]);

        }
        else if (preg_match($re3, $hard4html, $m15)===0)
        {
            $price16=10000;
        }


        $lowestprice3 = min($price13, $price14, $price15, $price16);
        if ($lowestprice3 == $price13) {
            $lowestprice3site = "Desktop.bg";
        } else if ($lowestprice3 == $price14) {
            $lowestprice3site = "Ardes.bg";
        } else if ($lowestprice3 == $price15) {
            $lowestprice3site = "Emag.bg";
        } else if ($lowestprice3 == $price16) {
            $lowestprice3site = "Jarcomputers.bg";
        }
        $hardArray = array('lowestPriceSite' => $lowestprice3site,
            'lowestPrice' => $lowestprice3);
//---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part5 = $_POST['GPU3'];
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $gpu = $repository->findOneBy([
            'name' => $part5
        ]);
        $gpuURLdesktop = $gpu->getUrldes();
        $gpuURLardes = $gpu->getUrlardes();
        $gpuURLemag = $gpu->getUrlemag();
        $gpuURLjar = $gpu->getUrljar();

        //Live price for Desktop.bg
        $gpuhtml = file_get_contents($gpuURLdesktop);
        $m16 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $gpuhtml, $m16)===0) {
            $price17 = floatval(100000.00);
        } else {
            $price17 = floatval($m16[1]);
        }

        //Live price for Ardes.bg
        $gpu2html = file_get_contents($gpuURLardes);
        $m17 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $gpu2html, $m17)) {
            if ($m17[1]=='0.00')
            {
                $price18 = floatval(100000.00);

            }
            else $price18 = floatval($m17[1]);

        } else
        {  $price18 = floatval($m17[1]);

        }



        //Live price for Emag.bg
        $gpu3html = file_get_contents($gpuURLemag);
        $m18 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $gpu3html, $m18)) {
            if ($m18[1]=='0.00')
            {
                $price19 = floatval(100000.00);

            }
            else $price19 = floatval($m18[1]);

        } else
        {  $price19 = floatval($m18[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $gpu4html = file_get_contents($gpuURLjar);
        $m19 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $gpu4html, $m19)) {
            if ($m19[1]=='0.00')
            {
                $price20 = floatval(100000.00);

            }
            else $price20 = floatval($m19[1]);

        } else
        {  $price20 = floatval($m19[1]);

        }


        $lowestprice4 = min($price17, $price18, $price19, $price20);
        if ($lowestprice4 == $price17) {
            $lowestprice4site = "Desktop.bg";
        } else if ($lowestprice4 == $price18) {
            $lowestprice4site = "Ardes.bg";
        } else if ($lowestprice4 == $price19) {
            $lowestprice4site = "Emag.bg";
        } else if ($lowestprice4 == $price20) {
            $lowestprice4site = "Jarcomputers.bg";
        }

        $gpuArray = array('lowestPriceSite' => $lowestprice4site,
            'lowestPrice' => $lowestprice4);
//---------------------------------------------------------------------------------------------------------//
        //getting part names

        $part6 = $_POST['Power3'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Powersupply::class);
        $power = $repository->findOneBy([
            'name' => $part6
        ]);
        $powerURLdesktop = $power->getUrldes();
        $powerURLardes = $power->getUrlardes();
        $powerURLemag = $power->getUrlemag();
        $powerURLjar = $power->getUrljar();

        //Live price for Desktop.bg
        $powerhtml = file_get_contents($powerURLdesktop);
        $m20 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $powerhtml, $m20)===0) {
            $price21 = floatval(10000.00);
        } else {
            $price21 = floatval($m20[1]);
        }

        //Live price for Ardes.bg
        $power2html = file_get_contents($powerURLardes);
        $m21 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $power2html, $m21)) {
            if ($m21[1]=='0.00')
            {
                $price22 = floatval(100000.00);

            }
            else $price22 = floatval($m21[1]);

        }
        else if (preg_match($re1, $power2html, $m21)===0)
        {
            $price22 = 10000;

        }


        //Live price for Emag.bg
        $power3html = file_get_contents($powerURLemag);
        $m22 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $power3html, $m22)) {
            if ($m22[1]=='0.00')
            {
                $price23 = floatval(100000.00);

            }
            else $price23 = floatval($m22[1]);

        } else
        {  $price23 = floatval($m22[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $power4html = file_get_contents($powerURLjar);
        $m23 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $power4html, $m23)) {
            if ($m23[1]=='0.00')
            {
                $price24 = floatval(100000.00);

            }
            else $price24 = floatval($m23[1]);

        } else
        {  $price24 = floatval($m23[1]);

        }


        $lowestprice5 = min($price21, $price22, $price23, $price24);
        if ($lowestprice5 == $price21) {
            $lowestprice5site = "Desktop.bg";
        } else if ($lowestprice5 == $price22) {
            $lowestprice5site = "Ardes.bg";
        } else if ($lowestprice5 == $price23) {
            $lowestprice5site = "Emag.bg";
        } else if ($lowestprice5 == $price24) {
            $lowestprice5site = "Jarcomputers.bg";
        }
        $powerSupplyArray = array('lowestPriceSite' => $lowestprice5site,
            'lowestPrice' => $lowestprice5);

        array_push($allArray, $processorArray, $motherboardArray, $ramArray, $hardArray, $gpuArray, $powerSupplyArray);

        echo json_encode($allArray);
        return new Response(" ");


    }


    /**
     * @Route("/calculate4", name="button_calculate4")
     */
    public function calculate4()
    {
        $allArray = Array();
        $user = $this->getUser();
        $user_id = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($user_id);
        $serialised_config1 = $user->getConfig1();
        $serialised_config2 = $user->getConfig2();
        $serialised_config3 = $user->getConfig3();
        $serialised_config4 = $user->getConfig4();
        $serialised_config5 = $user->getConfig5();

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $user_id
            );
        }
        $unserialized_config1 = unserialize($serialised_config1);
        $unserialized_config2 = unserialize($serialised_config2);
        $unserialized_config3 = unserialize($serialised_config3);
        $unserialized_config4 = unserialize($serialised_config4);
        $unserialized_config5 = unserialize($serialised_config5);

        //getting part names
        $part = $_POST['Processor4'];

//------------------------------------------------------------------------------------------------------------//
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findOneBy([
            'Name' => $part
        ]);
        $processorURLdesktop = $processor->getUrldes();
        $processorURLardes = $processor->getUrlardes();
        $processorURLemag = $processor->getUrlemag();
        $processsorURLjar = $processor->getUrljar();

        //Live price for Desktop.bg
        $processorhtml = file_get_contents($processorURLdesktop);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $processorhtml, $m)) {
            $price = floatval($m[1]);

        } else {
            $price = floatval(100000.00);

        }

        //Live price for Ardes.bg
        $processor1html = file_get_contents($processorURLardes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $processor1html, $m1)) {
            $price2 = floatval($m1[1]);
        } else {
            $price2 = floatval(100000.00);
        }


        //Live price for Emag.bg
        $processor2html = file_get_contents($processorURLemag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $processor2html, $m2)) {
            $price3 = floatval($m2[1]);
        } else {
            $price3 = floatval(100000.00);
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processor3html = file_get_contents($processsorURLjar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $processor3html, $m3)) {
            $price4 = floatval($m3[1]);
        } else {
            $price4 = floatval(100000.00);
        }

        $lowestprice = min($price, $price2, $price3, $price4);
        if ($lowestprice == $price) {
            $lowestpricesite = "Desktop.bg";
        } else if ($lowestprice == $price2) {
            $lowestpricesite = "Ardes.bg";
        } else if ($lowestprice == $price3) {
            $lowestpricesite = "Emag.bg";
        } else if ($lowestprice == $price4) {
            $lowestpricesite = "Jarcomputers.bg";
        }

        $processorArray = array('lowestPriceSite' => $lowestpricesite,
            'lowestPrice' => $lowestprice);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part2 = $_POST['Dunno4'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $part = $repository->findOneBy([
            'name' => $part2
        ]);
        $partURLdesktop = $part->getUrldes();
        $partURLardes = $part->getUrlardes();
        $partURLemag = $part->getUrlemag();
        $partURLjar = $part->getUrljar();

        //Live price for Desktop.bg
        $parthtml = file_get_contents($partURLdesktop);
        $m4 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $parthtml, $m4)===0)
        {
            $price5 = 100000.00;
        }
        else $price5 = floatval($m4[1]);
        //Live price for Ardes.bg
        $part1html = file_get_contents($partURLardes);
        $m5 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $part1html, $m5)) {
            if($m5[1]=='0.00')
            {
                $price6 = floatval(100000.00);

            }
            else $price6 = floatval($m5[1]);
        }
        else
        {
            $price6 = floatval($m5[1]);

        }


        //Live price for Emag.bg
        $part2html = file_get_contents($partURLemag);
        $m6 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $part2html, $m6)) {
            if($m6[1]=='0.00')
            {
                $price7 = floatval(100000.00);

            }
            else $price7 = floatval($m6[1]);
        }
        else
        {
            $price7 = floatval($m6[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $part3html = file_get_contents($partURLjar);
        $m7 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $part3html, $m7)===1) {
            if ($m7[1]=='0.00')
            {
                $price8 = floatval(100000.00);

            }
            else $price8 = floatval($m7[1]);

        } else
        {  $price8 = floatval($m7[1]);

        }

        $lowestprice1 = min($price5, $price6, $price7, $price8);
        if ($lowestprice1 == $price5) {
            $lowestprice1site = "Desktop.bg";
        } else if ($lowestprice1 == $price6) {
            $lowestprice1site = "Ardes.bg";
        } else if ($lowestprice1 == $price7) {
            $lowestprice1site = "Emag.bg";
        } else if ($lowestprice1 == $price8) {
            $lowestprice1site = "Jarcomputers.bg";
        }

        $motherboardArray = array('lowestPriceSite' => $lowestprice1site,
            'lowestPrice' => $lowestprice1);
        //---------------------------------------------------------------------------------------------------------------------------//

        //getting part names
        $part3 = $_POST['RAM4'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram = $repository->findOneBy([
            'name' => $part3
        ]);
        $ramURLdesktop = $ram->getUrldes();
        $ramURLardes = $ram->getUrlardes();
        $ramURLemag = $ram->getUrlemag();
        $ramURLjar = $ram->getUrljar();

        //Live price for Desktop.bg
        $ramhtml = file_get_contents($ramURLdesktop);
        $m8 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $ramhtml, $m8)===0) {
            $price9 = floatval(100000.00);

        } else {
            $price9 = floatval($m8[1]);

        }

        //Live price for Ardes.bg
        $ram2html = file_get_contents($ramURLardes);
        $m9 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $ram2html, $m9)) {
            if ($m9[1]=='0.00')
            {
                $price10 = floatval(100000.00);

            }
            else $price10 = floatval($m9[1]);

        } else
        {  $price10 = floatval($m9[1]);

        }


        //Live price for Emag.bg
        $ram3html = file_get_contents($ramURLemag);
        $m10 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $ram3html, $m10)) {
            if ($m10[1]=='0.00')
            {
                $price11 = floatval(100000.00);

            }
            else $price11 = floatval($m10[1]);

        } else
        {  $price11 = floatval($m10[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $ram4html = file_get_contents($ramURLjar);
        $m11 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $ram4html, $m11)) {
            if ($m11[1]=='0.00')
            {
                $price12 = floatval(100000.00);

            }
            else $price12 = floatval($m11[1]);

        } else
        {  $price12 = floatval($m11[1]);

        }

        $lowestprice2 = min($price9, $price10, $price11, $price12);
        if ($lowestprice2 == $price9) {
            $lowestprice2site = "Desktop.bg";
        } else if ($lowestprice2 == $price10) {
            $lowestprice2site = "Ardes.bg";
        } else if ($lowestprice2 == $price11) {
            $lowestprice2site = "Emag.bg";
        } else if ($lowestprice2 == $price12) {
            $lowestprice2site = "Jarcomputers.bg";
        }
        $ramArray = array('lowestPriceSite' => $lowestprice2site,
            'lowestPrice' => $lowestprice2);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part4 = $_POST['Hard4'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(HardDrive::class);
        $hard = $repository->findOneBy([
            'Name' => $part4
        ]);
        $hardURLdesktop = $hard->getUrldes();
        $hardURLardes = $hard->getUrlardes();
        $hardURLemag = $hard->getUrlemag();
        $hardURLjar = $hard->getUrljar();

        //Live price for Desktop.bg
        $hardhtml = file_get_contents($hardURLdesktop);
        $m12 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $hardhtml, $m12)===0) {
            $price13 = floatval(100000.00);

        } else {
            $price13 = floatval($m12[1]);
        }

        //Live price for Ardes.bg
        $hard2html = file_get_contents($hardURLardes);
        $m13 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $hard2html, $m13)) {
            if ($m13[1]=='0.00')
            {
                $price14 = floatval(100000.00);

            }
            else $price14 = floatval($m13[1]);

        } else
        {  $price14 = floatval($m13[1]);

        }


        //Live price for Emag.bg
        $hard3html = file_get_contents($hardURLemag);
        $m14 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $hard3html, $m14)) {
            if ($m14[1]=='0.00')
            {
                $price15 = floatval(100000.00);

            }
            else $price15 = floatval($m14[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $hard4html = file_get_contents($hardURLjar);
        $m15 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $hard4html, $m15)) {
            if ($m15[1]=='0.00'||$m15[1]=="0")
            {
                $price16 = floatval(100000.00);

            }
            else $price16 = floatval($m15[1]);

        }
        else if (preg_match($re3, $hard4html, $m15)===0)
        {
            $price16=10000;
        }


        $lowestprice3 = min($price13, $price14, $price15, $price16);
        if ($lowestprice3 == $price13) {
            $lowestprice3site = "Desktop.bg";
        } else if ($lowestprice3 == $price14) {
            $lowestprice3site = "Ardes.bg";
        } else if ($lowestprice3 == $price15) {
            $lowestprice3site = "Emag.bg";
        } else if ($lowestprice3 == $price16) {
            $lowestprice3site = "Jarcomputers.bg";
        }
        $hardArray = array('lowestPriceSite' => $lowestprice3site,
            'lowestPrice' => $lowestprice3);
//---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part5 = $_POST['GPU4'];
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $gpu = $repository->findOneBy([
            'name' => $part5
        ]);
        $gpuURLdesktop = $gpu->getUrldes();
        $gpuURLardes = $gpu->getUrlardes();
        $gpuURLemag = $gpu->getUrlemag();
        $gpuURLjar = $gpu->getUrljar();

        //Live price for Desktop.bg
        $gpuhtml = file_get_contents($gpuURLdesktop);
        $m16 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $gpuhtml, $m16)===0) {
            $price17 = floatval(100000.00);
        } else {
            $price17 = floatval($m16[1]);
        }

        //Live price for Ardes.bg
        $gpu2html = file_get_contents($gpuURLardes);
        $m17 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $gpu2html, $m17)) {
            if ($m17[1]=='0.00')
            {
                $price18 = floatval(100000.00);

            }
            else $price18 = floatval($m17[1]);

        } else
        {  $price18 = floatval($m17[1]);

        }



        //Live price for Emag.bg
        $gpu3html = file_get_contents($gpuURLemag);
        $m18 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $gpu3html, $m18)) {
            if ($m18[1]=='0.00')
            {
                $price19 = floatval(100000.00);

            }
            else $price19 = floatval($m18[1]);

        } else
        {  $price19 = floatval($m18[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $gpu4html = file_get_contents($gpuURLjar);
        $m19 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $gpu4html, $m19)) {
            if ($m19[1]=='0.00')
            {
                $price20 = floatval(100000.00);

            }
            else $price20 = floatval($m19[1]);

        } else
        {  $price20 = floatval($m19[1]);

        }


        $lowestprice4 = min($price17, $price18, $price19, $price20);
        if ($lowestprice4 == $price17) {
            $lowestprice4site = "Desktop.bg";
        } else if ($lowestprice4 == $price18) {
            $lowestprice4site = "Ardes.bg";
        } else if ($lowestprice4 == $price19) {
            $lowestprice4site = "Emag.bg";
        } else if ($lowestprice4 == $price20) {
            $lowestprice4site = "Jarcomputers.bg";
        }

        $gpuArray = array('lowestPriceSite' => $lowestprice4site,
            'lowestPrice' => $lowestprice4);
//---------------------------------------------------------------------------------------------------------//
        //getting part names

        $part6 = $_POST['Power4'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Powersupply::class);
        $power = $repository->findOneBy([
            'name' => $part6
        ]);
        $powerURLdesktop = $power->getUrldes();
        $powerURLardes = $power->getUrlardes();
        $powerURLemag = $power->getUrlemag();
        $powerURLjar = $power->getUrljar();

        //Live price for Desktop.bg
        $powerhtml = file_get_contents($powerURLdesktop);
        $m20 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $powerhtml, $m20)===0) {
            $price21 = floatval(10000.00);
        } else {
            $price21 = floatval($m20[1]);
        }

        //Live price for Ardes.bg
        $power2html = file_get_contents($powerURLardes);
        $m21 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $power2html, $m21)) {
            if ($m21[1]=='0.00')
            {
                $price22 = floatval(100000.00);

            }
            else $price22 = floatval($m21[1]);

        }
        else if (preg_match($re1, $power2html, $m21)===0)
        {
            $price22 = 10000;

        }


        //Live price for Emag.bg
        $power3html = file_get_contents($powerURLemag);
        $m22 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $power3html, $m22)) {
            if ($m22[1]=='0.00')
            {
                $price23 = floatval(100000.00);

            }
            else $price23 = floatval($m22[1]);

        } else
        {  $price23 = floatval($m22[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $power4html = file_get_contents($powerURLjar);
        $m23 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $power4html, $m23)) {
            if ($m23[1]=='0.00')
            {
                $price24 = floatval(100000.00);

            }
            else $price24 = floatval($m23[1]);

        } else
        {  $price24 = floatval($m23[1]);

        }


        $lowestprice5 = min($price21, $price22, $price23, $price24);
        if ($lowestprice5 == $price21) {
            $lowestprice5site = "Desktop.bg";
        } else if ($lowestprice5 == $price22) {
            $lowestprice5site = "Ardes.bg";
        } else if ($lowestprice5 == $price23) {
            $lowestprice5site = "Emag.bg";
        } else if ($lowestprice5 == $price24) {
            $lowestprice5site = "Jarcomputers.bg";
        }
        $powerSupplyArray = array('lowestPriceSite' => $lowestprice5site,
            'lowestPrice' => $lowestprice5);

        array_push($allArray, $processorArray, $motherboardArray, $ramArray, $hardArray, $gpuArray, $powerSupplyArray);

        echo json_encode($allArray);
        return new Response(" ");


    }


    /**
     * @Route("/calculate5", name="button_calculate5")
     */
    public function calculate5()
    {
        $allArray = Array();
        $user = $this->getUser();
        $user_id = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($user_id);
        $serialised_config1 = $user->getConfig1();
        $serialised_config2 = $user->getConfig2();
        $serialised_config3 = $user->getConfig3();
        $serialised_config4 = $user->getConfig4();
        $serialised_config5 = $user->getConfig5();

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $user_id
            );
        }
        $unserialized_config1 = unserialize($serialised_config1);
        $unserialized_config2 = unserialize($serialised_config2);
        $unserialized_config3 = unserialize($serialised_config3);
        $unserialized_config4 = unserialize($serialised_config4);
        $unserialized_config5 = unserialize($serialised_config5);

        //getting part names
        $part = $_POST['Processor5'];

//------------------------------------------------------------------------------------------------------------//
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findOneBy([
            'Name' => $part
        ]);
        $processorURLdesktop = $processor->getUrldes();
        $processorURLardes = $processor->getUrlardes();
        $processorURLemag = $processor->getUrlemag();
        $processsorURLjar = $processor->getUrljar();

        //Live price for Desktop.bg
        $processorhtml = file_get_contents($processorURLdesktop);
        $m = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $processorhtml, $m)) {
            $price = floatval($m[1]);

        } else {
            $price = floatval(100000.00);

        }

        //Live price for Ardes.bg
        $processor1html = file_get_contents($processorURLardes);
        $m1 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $processor1html, $m1)) {
            $price2 = floatval($m1[1]);
        } else {
            $price2 = floatval(100000.00);
        }


        //Live price for Emag.bg
        $processor2html = file_get_contents($processorURLemag);
        $m2 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $processor2html, $m2)) {
            $price3 = floatval($m2[1]);
        } else {
            $price3 = floatval(100000.00);
        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $processor3html = file_get_contents($processsorURLjar);
        $m3 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $processor3html, $m3)) {
            $price4 = floatval($m3[1]);
        } else {
            $price4 = floatval(100000.00);
        }

        $lowestprice = min($price, $price2, $price3, $price4);
        if ($lowestprice == $price) {
            $lowestpricesite = "Desktop.bg";
        } else if ($lowestprice == $price2) {
            $lowestpricesite = "Ardes.bg";
        } else if ($lowestprice == $price3) {
            $lowestpricesite = "Emag.bg";
        } else if ($lowestprice == $price4) {
            $lowestpricesite = "Jarcomputers.bg";
        }

        $processorArray = array('lowestPriceSite' => $lowestpricesite,
            'lowestPrice' => $lowestprice);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part2 = $_POST['Dunno5'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Motherboards::class);
        $part = $repository->findOneBy([
            'name' => $part2
        ]);
        $partURLdesktop = $part->getUrldes();
        $partURLardes = $part->getUrlardes();
        $partURLemag = $part->getUrlemag();
        $partURLjar = $part->getUrljar();

        //Live price for Desktop.bg
        $parthtml = file_get_contents($partURLdesktop);
        $m4 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $parthtml, $m4)===0)
        {
            $price5 = 100000.00;
        }
        else $price5 = floatval($m4[1]);
        //Live price for Ardes.bg
        $part1html = file_get_contents($partURLardes);
        $m5 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $part1html, $m5)) {
            if($m5[1]=='0.00')
            {
                $price6 = floatval(100000.00);

            }
            else $price6 = floatval($m5[1]);
        }
        else
        {
            $price6 = floatval($m5[1]);

        }


        //Live price for Emag.bg
        $part2html = file_get_contents($partURLemag);
        $m6 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $part2html, $m6)) {
            if($m6[1]=='0.00')
            {
                $price7 = floatval(100000.00);

            }
            else $price7 = floatval($m6[1]);
        }
        else
        {
            $price7 = floatval($m6[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $part3html = file_get_contents($partURLjar);
        $m7 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $part3html, $m7)===1) {
            if ($m7[1]=='0.00')
            {
                $price8 = floatval(100000.00);

            }
            else $price8 = floatval($m7[1]);

        } else
        {  $price8 = floatval($m7[1]);

        }

        $lowestprice1 = min($price5, $price6, $price7, $price8);
        if ($lowestprice1 == $price5) {
            $lowestprice1site = "Desktop.bg";
        } else if ($lowestprice1 == $price6) {
            $lowestprice1site = "Ardes.bg";
        } else if ($lowestprice1 == $price7) {
            $lowestprice1site = "Emag.bg";
        } else if ($lowestprice1 == $price8) {
            $lowestprice1site = "Jarcomputers.bg";
        }

        $motherboardArray = array('lowestPriceSite' => $lowestprice1site,
            'lowestPrice' => $lowestprice1);
        //---------------------------------------------------------------------------------------------------------------------------//

        //getting part names
        $part3 = $_POST['RAM5'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(RAM::class);
        $ram = $repository->findOneBy([
            'name' => $part3
        ]);
        $ramURLdesktop = $ram->getUrldes();
        $ramURLardes = $ram->getUrlardes();
        $ramURLemag = $ram->getUrlemag();
        $ramURLjar = $ram->getUrljar();

        //Live price for Desktop.bg
        $ramhtml = file_get_contents($ramURLdesktop);
        $m8 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $ramhtml, $m8)===0) {
            $price9 = floatval(100000.00);

        } else {
            $price9 = floatval($m8[1]);

        }

        //Live price for Ardes.bg
        $ram2html = file_get_contents($ramURLardes);
        $m9 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $ram2html, $m9)) {
            if ($m9[1]=='0.00')
            {
                $price10 = floatval(100000.00);

            }
            else $price10 = floatval($m9[1]);

        } else
        {  $price10 = floatval($m9[1]);

        }


        //Live price for Emag.bg
        $ram3html = file_get_contents($ramURLemag);
        $m10 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $ram3html, $m10)) {
            if ($m10[1]=='0.00')
            {
                $price11 = floatval(100000.00);

            }
            else $price11 = floatval($m10[1]);

        } else
        {  $price11 = floatval($m10[1]);

        }
        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $ram4html = file_get_contents($ramURLjar);
        $m11 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $ram4html, $m11)) {
            if ($m11[1]=='0.00')
            {
                $price12 = floatval(100000.00);

            }
            else $price12 = floatval($m11[1]);

        } else
        {  $price12 = floatval($m11[1]);

        }

        $lowestprice2 = min($price9, $price10, $price11, $price12);
        if ($lowestprice2 == $price9) {
            $lowestprice2site = "Desktop.bg";
        } else if ($lowestprice2 == $price10) {
            $lowestprice2site = "Ardes.bg";
        } else if ($lowestprice2 == $price11) {
            $lowestprice2site = "Emag.bg";
        } else if ($lowestprice2 == $price12) {
            $lowestprice2site = "Jarcomputers.bg";
        }
        $ramArray = array('lowestPriceSite' => $lowestprice2site,
            'lowestPrice' => $lowestprice2);
        //---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part4 = $_POST['Hard5'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(HardDrive::class);
        $hard = $repository->findOneBy([
            'Name' => $part4
        ]);
        $hardURLdesktop = $hard->getUrldes();
        $hardURLardes = $hard->getUrlardes();
        $hardURLemag = $hard->getUrlemag();
        $hardURLjar = $hard->getUrljar();

        //Live price for Desktop.bg
        $hardhtml = file_get_contents($hardURLdesktop);
        $m12 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $hardhtml, $m12)===0) {
            $price13 = floatval(100000.00);

        } else {
            $price13 = floatval($m12[1]);
        }

        //Live price for Ardes.bg
        $hard2html = file_get_contents($hardURLardes);
        $m13 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $hard2html, $m13)) {
            if ($m13[1]=='0.00')
            {
                $price14 = floatval(100000.00);

            }
            else $price14 = floatval($m13[1]);

        } else if(preg_match($re1, $hard2html, $m13)===0)
        {  $price14 = 10000;

        }


        //Live price for Emag.bg
        $hard3html = file_get_contents($hardURLemag);
        $m14 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $hard3html, $m14)) {
            if ($m14[1]=='0.00')
            {
                $price15 = floatval(100000.00);

            }
            else $price15 = floatval($m14[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $hard4html = file_get_contents($hardURLjar);
        $m15 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $hard4html, $m15)) {
            if ($m15[1]=='0.00'||$m15[1]=="0")
            {
                $price16 = floatval(100000.00);

            }
            else $price16 = floatval($m15[1]);

        }
        else if (preg_match($re3, $hard4html, $m15)===0)
        {
            $price16=10000;
        }


        $lowestprice3 = min($price13, $price14, $price15, $price16);
        if ($lowestprice3 == $price13) {
            $lowestprice3site = "Desktop.bg";
        } else if ($lowestprice3 == $price14) {
            $lowestprice3site = "Ardes.bg";
        } else if ($lowestprice3 == $price15) {
            $lowestprice3site = "Emag.bg";
        } else if ($lowestprice3 == $price16) {
            $lowestprice3site = "Jarcomputers.bg";
        }
        $hardArray = array('lowestPriceSite' => $lowestprice3site,
            'lowestPrice' => $lowestprice3);
//---------------------------------------------------------------------------------------------------------//
        //getting part names
        $part5 = $_POST['GPU5'];
        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(VideoCards::class);
        $gpu = $repository->findOneBy([
            'name' => $part5
        ]);
        $gpuURLdesktop = $gpu->getUrldes();
        $gpuURLardes = $gpu->getUrlardes();
        $gpuURLemag = $gpu->getUrlemag();
        $gpuURLjar = $gpu->getUrljar();

        //Live price for Desktop.bg
        $gpuhtml = file_get_contents($gpuURLdesktop);
        $m16 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $gpuhtml, $m16)===0) {
            $price17 = floatval(100000.00);
        } else {
            $price17 = floatval($m16[1]);
        }

        //Live price for Ardes.bg
        $gpu2html = file_get_contents($gpuURLardes);
        $m17 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $gpu2html, $m17)) {
            if ($m17[1]=='0.00')
            {
                $price18 = floatval(100000.00);

            }
            else $price18 = floatval($m17[1]);

        } else
        {  $price18 = floatval($m17[1]);

        }



        //Live price for Emag.bg
        $gpu3html = file_get_contents($gpuURLemag);
        $m18 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $gpu3html, $m18)) {
            if ($m18[1]=='0.00')
            {
                $price19 = floatval(100000.00);

            }
            else $price19 = floatval($m18[1]);

        } else
        {  $price19 = floatval($m18[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $gpu4html = file_get_contents($gpuURLjar);
        $m19 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $gpu4html, $m19)) {
            if ($m19[1]=='0.00')
            {
                $price20 = floatval(100000.00);

            }
            else $price20 = floatval($m19[1]);

        } else
        {  $price20 = floatval($m19[1]);

        }


        $lowestprice4 = min($price17, $price18, $price19, $price20);
        if ($lowestprice4 == $price17) {
            $lowestprice4site = "Desktop.bg";
        } else if ($lowestprice4 == $price18) {
            $lowestprice4site = "Ardes.bg";
        } else if ($lowestprice4 == $price19) {
            $lowestprice4site = "Emag.bg";
        } else if ($lowestprice4 == $price20) {
            $lowestprice4site = "Jarcomputers.bg";
        }

        $gpuArray = array('lowestPriceSite' => $lowestprice4site,
            'lowestPrice' => $lowestprice4);
//---------------------------------------------------------------------------------------------------------//
        //getting part names

        $part6 = $_POST['Power5'];

        //finding and selecting processor price
        $repository = $this->getDoctrine()->getRepository(Powersupply::class);
        $power = $repository->findOneBy([
            'name' => $part6
        ]);
        $powerURLdesktop = $power->getUrldes();
        $powerURLardes = $power->getUrlardes();
        $powerURLemag = $power->getUrlemag();
        $powerURLjar = $power->getUrljar();

        //Live price for Desktop.bg
        $powerhtml = file_get_contents($powerURLdesktop);
        $m20 = [];
        $re = '/value:\s\'(\d+\.?\d*)\'/m';
        if (preg_match($re, $powerhtml, $m20)===0) {
            $price21 = floatval(10000.00);
        } else {
            $price21 = floatval($m20[1]);
        }

        //Live price for Ardes.bg
        $power2html = file_get_contents($powerURLardes);
        $m21 = [];
        $re1 = '/gProductPrice\s=\s(\d+\.?\d*)/m';
        if (preg_match($re1, $power2html, $m21)) {
            if ($m21[1]=='0.00')
            {
                $price22 = floatval(100000.00);

            }
            else $price22 = floatval($m21[1]);

        }
        else if (preg_match($re1, $power2html, $m21)===0)
        {
            $price22 = 10000;

        }


        //Live price for Emag.bg
        $power3html = file_get_contents($powerURLemag);
        $m22 = [];
        $re2 = '/\"price\"\:\s\"(\d+\.?\d*)\"\,/m';
        if (preg_match($re2, $power3html, $m22)) {
            if ($m22[1]=='0.00')
            {
                $price23 = floatval(100000.00);

            }
            else $price23 = floatval($m22[1]);

        } else
        {  $price23 = floatval($m22[1]);

        }

        //End of code for updating price for Emag.bg

        //Live update price for Jarcomputers.bg
        $power4html = file_get_contents($powerURLjar);
        $m23 = [];
        $re3 = '/\"price\"\:\s(\d+\.?\d*)\,/m';
        if (preg_match($re3, $power4html, $m23)) {
            if ($m23[1]=='0.00')
            {
                $price24 = floatval(100000.00);

            }
            else $price24 = floatval($m23[1]);

        } else
        {  $price24 = floatval($m23[1]);

        }


        $lowestprice5 = min($price21, $price22, $price23, $price24);
        if ($lowestprice5 == $price21) {
            $lowestprice5site = "Desktop.bg";
        } else if ($lowestprice5 == $price22) {
            $lowestprice5site = "Ardes.bg";
        } else if ($lowestprice5 == $price23) {
            $lowestprice5site = "Emag.bg";
        } else if ($lowestprice5 == $price24) {
            $lowestprice5site = "Jarcomputers.bg";
        }
        $powerSupplyArray = array('lowestPriceSite' => $lowestprice5site,
            'lowestPrice' => $lowestprice5);

        array_push($allArray, $processorArray, $motherboardArray, $ramArray, $hardArray, $gpuArray, $powerSupplyArray);

        echo json_encode($allArray);
        return new Response(" ");


    }


}
