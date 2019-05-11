<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 3/1/2019
 * Time: 6:56 PM
 */

namespace App\Controller;
use App\Entity\HardDrive;
use App\Entity\Motherboards;
use App\Entity\Powersupply;
use App\Entity\Processors;
use App\Entity\RAM;
use App\Entity\User;
use App\Entity\VideoCards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ConfigurationsController extends AbstractController
{
    /**
     * @Route("/configurations/first", name="first_step")
     */
    public function firststep()
     {
         return $this->render('Configurations/Firststep.html.twig');
     }

     /**
     * @Route("/configurations/second-home", name="second_step_home")
     */
    public function secondstephome()
    {
        return $this->render('Configurations/Home/Secondstephome.html.twig');

    }

    /**
     * @Route("/configurations/third-home-intel", name="third_step_home_intel")
     */
    public function thirdstephomeintel()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);

        $processor = $repository->findBy(
            ['id' => '15']);

        $processor1 = $repository->findBy(
            ['id' => '20']
        );
        $processor2 = $repository->findBy(
            ['id' => '21']
        );



        //---------------------------------------------------------------------------//

        $repository1=$this->getDoctrine()->getRepository(Motherboards::class);

        $motherboard1=$repository1->findBy(
            ['id'=>'3']);

        $motherboard2=$repository1->findBy(
            ['id'=>'6']);

        $motherboard3=$repository1->findBy(
            ['id'=>'8']);


        //---------------------------------------------------------------------------//

        $repository2=$this->getDoctrine()->getRepository(VideoCards::class);

        $videocard1=$repository2->findBy(
            ['id'=>'2']);

        $videocard2=$repository2->findBy(
            ['id'=>'6']);

        $videocard3=$repository2->findBy(
            ['id'=>'8']);



        //---------------------------------------------------------------------------//

        $repository3=$this->getDoctrine()->getRepository(RAM::class);

        $ram1=$repository3->findBy(
            ['id'=>'3']);

        $ram2=$repository3->findBy(
            ['id'=>'6']);

        $ram3=$repository3->findBy(
            ['id'=>'10']);


        //---------------------------------------------------------------------------//

        $repository4=$this->getDoctrine()->getRepository(HardDrive::class);

        $hard1=$repository4->findBy(
            ['id'=>'2']);

        $hard2=$repository4->findBy(
            ['id'=>'4']);

        $hard3=$repository4->findBy(
            ['id'=>'7']);

        //---------------------------------------------------------------------------//

        $repository5=$this->getDoctrine()->getRepository(Powersupply::class);

        $power1=$repository5->findBy(
            ['id'=>'7']);

        $power2=$repository5->findBy(
            ['id'=>'1']);

        $power3=$repository5->findBy(
            ['id'=>'3']);


        return $this->render('Configurations/Home/Third-step-home-intel.html.twig',
            array('processor1'=>$processor,
                'processor2'=>$processor1,
                'processor3'=>$processor2,
                'motherboard1'=>$motherboard1,
                'motherboard2'=>$motherboard2,
                'motherboard3'=>$motherboard3,
                'videocard1'=>$videocard1,
                'videocard2'=>$videocard2,
                'videocard3'=>$videocard3,
                'ram1'=>$ram1,
                'ram2'=>$ram2,
                'ram3'=>$ram3,
                'hard1'=>$hard1,
                'hard2'=>$hard2,
                'hard3'=>$hard3,
                'power1'=>$power1,
                'power2'=>$power2,
                'power3'=>$power3,
            ));

    }

    /**
     * @Route("/configurations/third-home-amd", name="third_step_home_amd")
     */
    public function thirdstephomeamd()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);

        $processor = $repository->findBy(
            ['id' => '7']);

        $processor1 = $repository->findBy(
            ['id' => '2']
        );
        $processor2 = $repository->findBy(
            ['id' => '10']
        );



        //---------------------------------------------------------------------------//

        $repository1=$this->getDoctrine()->getRepository(Motherboards::class);

        $motherboard1=$repository1->findBy(
            ['id'=>'4']);

        $motherboard2=$repository1->findBy(
            ['id'=>'5']);

        $motherboard3=$repository1->findBy(
            ['id'=>'10']);


        //---------------------------------------------------------------------------//

        $repository2=$this->getDoctrine()->getRepository(VideoCards::class);

        $videocard1=$repository2->findBy(
            ['id'=>'2']);

        $videocard2=$repository2->findBy(
            ['id'=>'6']);

        $videocard3=$repository2->findBy(
            ['id'=>'8']);



        //---------------------------------------------------------------------------//

        $repository3=$this->getDoctrine()->getRepository(RAM::class);

        $ram1=$repository3->findBy(
            ['id'=>'3']);

        $ram2=$repository3->findBy(
            ['id'=>'6']);

        $ram3=$repository3->findBy(
            ['id'=>'10']);


        //---------------------------------------------------------------------------//

        $repository4=$this->getDoctrine()->getRepository(HardDrive::class);

        $hard1=$repository4->findBy(
            ['id'=>'2']);

        $hard2=$repository4->findBy(
            ['id'=>'4']);

        $hard3=$repository4->findBy(
            ['id'=>'7']);

        //---------------------------------------------------------------------------//

        $repository5=$this->getDoctrine()->getRepository(Powersupply::class);

        $power1=$repository5->findBy(
            ['id'=>'7']);

        $power2=$repository5->findBy(
            ['id'=>'1']);

        $power3=$repository5->findBy(
            ['id'=>'3']);


        return $this->render('Configurations/Home/Third-step-home-amd.html.twig',
            array('processor1'=>$processor,
                'processor2'=>$processor1,
                'processor3'=>$processor2,
                'motherboard1'=>$motherboard1,
                'motherboard2'=>$motherboard2,
                'motherboard3'=>$motherboard3,
                'videocard1'=>$videocard1,
                'videocard2'=>$videocard2,
                'videocard3'=>$videocard3,
                'ram1'=>$ram1,
                'ram2'=>$ram2,
                'ram3'=>$ram3,
                'hard1'=>$hard1,
                'hard2'=>$hard2,
                'hard3'=>$hard3,
                'power1'=>$power1,
                'power2'=>$power2,
                'power3'=>$power3,
            ));
    }

    //-------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/configurations/second-professional", name="second_step_professional")
     */
    public function secondstepprofessional()
    {
        return $this->render('Configurations/Professional/Secondstepprofessional.html.twig');

    }

    /**
     * @Route("/configurations/third-professional-intel", name="third_step_professional_intel")
     */
    public function thirdstepprofessionalintel()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findBy(
            ['id' => '13']);

        $processor1 = $repository->findBy(
            ['id' => '18']
        );
        $processor2 = $repository->findBy(
            ['id' => '19']
        );



        //---------------------------------------------------------------------------//

        $repository1=$this->getDoctrine()->getRepository(Motherboards::class);

        $motherboard1=$repository1->findBy(
            ['id'=>'6']);

        $motherboard2=$repository1->findBy(
            ['id'=>'9']);

        $motherboard3=$repository1->findBy(
            ['id'=>'8']);


        //---------------------------------------------------------------------------//

        $repository2=$this->getDoctrine()->getRepository(VideoCards::class);

        $videocard1=$repository2->findBy(
            ['id'=>'7']);

        $videocard2=$repository2->findBy(
            ['id'=>'9']);

        $videocard3=$repository2->findBy(
            ['id'=>'12']);



        //---------------------------------------------------------------------------//

        $repository3=$this->getDoctrine()->getRepository(RAM::class);

        $ram1=$repository3->findBy(
            ['id'=>'1']);

        $ram2=$repository3->findBy(
            ['id'=>'9']);

        $ram3=$repository3->findBy(
            ['id'=>'8']);


        //---------------------------------------------------------------------------//

        $repository4=$this->getDoctrine()->getRepository(HardDrive::class);

        $hard1=$repository4->findBy(
            ['id'=>'1']);

        $hard2=$repository4->findBy(
            ['id'=>'3']);

        $hard3=$repository4->findBy(
            ['id'=>'6']);

        //---------------------------------------------------------------------------//

        $repository5=$this->getDoctrine()->getRepository(Powersupply::class);

        $power1=$repository5->findBy(
            ['id'=>'4']);

        $power2=$repository5->findBy(
            ['id'=>'5']);

        $power3=$repository5->findBy(
            ['id'=>'2']);


        return $this->render('Configurations/Professional/Third-step-professional-intel.html.twig',
            array('processor1'=>$processor,
                'processor2'=>$processor1,
                'processor3'=>$processor2,
                'motherboard1'=>$motherboard1,
                'motherboard2'=>$motherboard2,
                'motherboard3'=>$motherboard3,
                'videocard1'=>$videocard1,
                'videocard2'=>$videocard2,
                'videocard3'=>$videocard3,
                'ram1'=>$ram1,
                'ram2'=>$ram2,
                'ram3'=>$ram3,
                'hard1'=>$hard1,
                'hard2'=>$hard2,
                'hard3'=>$hard3,
                'power1'=>$power1,
                'power2'=>$power2,
                'power3'=>$power3,

            ));

    }

    /**
     * @Route("/configurations/third-professional-amd", name="third_step_professional_amd")
     */
    public function thirdstepprofessionalamd()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);

        $processor = $repository->findBy(
            ['id' => '3']);

        $processor1 = $repository->findBy(
            ['id' => '5']
        );
        $processor2 = $repository->findBy(
            ['id' => '8']
        );



        //---------------------------------------------------------------------------//

        $repository1=$this->getDoctrine()->getRepository(Motherboards::class);

        $motherboard1=$repository1->findBy(
            ['id'=>'5']);

        $motherboard2=$repository1->findBy(
            ['id'=>'10']);

        $motherboard3=$repository1->findBy(
            ['id'=>'1']);


        //---------------------------------------------------------------------------//

        $repository2=$this->getDoctrine()->getRepository(VideoCards::class);

        $videocard1=$repository2->findBy(
            ['id'=>'7']);

        $videocard2=$repository2->findBy(
            ['id'=>'9']);

        $videocard3=$repository2->findBy(
            ['id'=>'12']);



        //---------------------------------------------------------------------------//

        $repository3=$this->getDoctrine()->getRepository(RAM::class);

        $ram1=$repository3->findBy(
            ['id'=>'1']);

        $ram2=$repository3->findBy(
            ['id'=>'9']);

        $ram3=$repository3->findBy(
            ['id'=>'8']);


        //---------------------------------------------------------------------------//

        $repository4=$this->getDoctrine()->getRepository(HardDrive::class);

        $hard1=$repository4->findBy(
            ['id'=>'1']);

        $hard2=$repository4->findBy(
            ['id'=>'3']);

        $hard3=$repository4->findBy(
            ['id'=>'6']);


        //---------------------------------------------------------------------------//

        $repository5=$this->getDoctrine()->getRepository(Powersupply::class);

        $power1=$repository5->findBy(
            ['id'=>'4']);

        $power2=$repository5->findBy(
            ['id'=>'5']);

        $power3=$repository5->findBy(
            ['id'=>'2']);


        return $this->render('Configurations/Professional/Third-step-professional-amd.html.twig',
            array('processor1'=>$processor,
                'processor2'=>$processor1,
                'processor3'=>$processor2,
                'motherboard1'=>$motherboard1,
                'motherboard2'=>$motherboard2,
                'motherboard3'=>$motherboard3,
                'videocard1'=>$videocard1,
                'videocard2'=>$videocard2,
                'videocard3'=>$videocard3,
                'ram1'=>$ram1,
                'ram2'=>$ram2,
                'ram3'=>$ram3,
                'hard1'=>$hard1,
                'hard2'=>$hard2,
                'hard3'=>$hard3,
                'power1'=>$power1,
                'power2'=>$power2,
                'power3'=>$power3,
            ));

    }

    //-------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/configurations/second-gaming", name="second_step_gaming")
     */
    public function secondstepgaming()
    {
        return $this->render('Configurations/Gaming/Secondstepgaming.html.twig');

    }

    /**
     * @Route("/configurations/third-gaming-intel", name="third_step_gaming_intel")
     */
    public function thirdstepgamingintel()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);
        $processor = $repository->findBy(
            ['id' => '12']);

        $processor1 = $repository->findBy(
            ['id' => '17']
        );
        $processor2 = $repository->findBy(
            ['id' => '14']
        );



        //---------------------------------------------------------------------------//

        $repository1=$this->getDoctrine()->getRepository(Motherboards::class);

        $motherboard1=$repository1->findBy(
            ['id'=>'7']);

        $motherboard2=$repository1->findBy(
            ['id'=>'8']);

        $motherboard3=$repository1->findBy(
            ['id'=>'9']);


        //---------------------------------------------------------------------------//

        $repository2=$this->getDoctrine()->getRepository(VideoCards::class);

        $videocard1=$repository2->findBy(
            ['id'=>'3']);

        $videocard2=$repository2->findBy(
            ['id'=>'8']);

        $videocard3=$repository2->findBy(
            ['id'=>'10']);



        //---------------------------------------------------------------------------//

        $repository3=$this->getDoctrine()->getRepository(RAM::class);

        $ram1=$repository3->findBy(
            ['id'=>'5']);

        $ram2=$repository3->findBy(
            ['id'=>'7']);

        $ram3=$repository3->findBy(
            ['id'=>'9']);


        //---------------------------------------------------------------------------//

        $repository4=$this->getDoctrine()->getRepository(HardDrive::class);

        $hard1=$repository4->findBy(
            ['id'=>'5']);

        $hard2=$repository4->findBy(
            ['id'=>'6']);

        $hard3=$repository4->findBy(
            ['id'=>'8']);


        //---------------------------------------------------------------------------//

        $repository5=$this->getDoctrine()->getRepository(Powersupply::class);

        $power1=$repository5->findBy(
            ['id'=>'2']);

        $power2=$repository5->findBy(
            ['id'=>'5']);

        $power3=$repository5->findBy(
            ['id'=>'6']);


        return $this->render('Configurations/Gaming/Third-step-gaming-intel.html.twig',
            array('processor1'=>$processor,
                'processor2'=>$processor1,
                'processor3'=>$processor2,
                'motherboard1'=>$motherboard1,
                'motherboard2'=>$motherboard2,
                'motherboard3'=>$motherboard3,
                'videocard1'=>$videocard1,
                'videocard2'=>$videocard2,
                'videocard3'=>$videocard3,
                'ram1'=>$ram1,
                'ram2'=>$ram2,
                'ram3'=>$ram3,
                'hard1'=>$hard1,
                'hard2'=>$hard2,
                'hard3'=>$hard3,
                'power1'=>$power1,
                'power2'=>$power2,
                'power3'=>$power3,
            ));

    }

    /**
     * @Route("/configurations/third-gaming-amd", name="third_step_gaming_amd")
     */
    public function thirdstepgamingamd()
    {
        $repository = $this->getDoctrine()->getRepository(Processors::class);

        $processor = $repository->findBy(
            ['id' => '4']);

        $processor1 = $repository->findBy(
            ['id' => '8']
        );
        $processor2 = $repository->findBy(
            ['id' => '9']
        );



        //---------------------------------------------------------------------------//

        $repository1=$this->getDoctrine()->getRepository(Motherboards::class);

        $motherboard1=$repository1->findBy(
            ['id'=>'1']);

        $motherboard2=$repository1->findBy(
            ['id'=>'2']);

        $motherboard3=$repository1->findBy(
            ['id'=>'5']);


        //---------------------------------------------------------------------------//

        $repository2=$this->getDoctrine()->getRepository(VideoCards::class);

        $videocard1=$repository2->findBy(
            ['id'=>'3']);

        $videocard2=$repository2->findBy(
            ['id'=>'8']);

        $videocard3=$repository2->findBy(
            ['id'=>'10']);



        //---------------------------------------------------------------------------//

        $repository3=$this->getDoctrine()->getRepository(RAM::class);

        $ram1=$repository3->findBy(
            ['id'=>'5']);

        $ram2=$repository3->findBy(
            ['id'=>'7']);

        $ram3=$repository3->findBy(
            ['id'=>'9']);


        //---------------------------------------------------------------------------//

        $repository4=$this->getDoctrine()->getRepository(HardDrive::class);

        $hard1=$repository4->findBy(
            ['id'=>'5']);

        $hard2=$repository4->findBy(
            ['id'=>'6']);

        $hard3=$repository4->findBy(
            ['id'=>'8']);


        //---------------------------------------------------------------------------//

        $repository5=$this->getDoctrine()->getRepository(Powersupply::class);

        $power1=$repository5->findBy(
            ['id'=>'2']);

        $power2=$repository5->findBy(
            ['id'=>'5']);

        $power3=$repository5->findBy(
            ['id'=>'6']);


         //-------------------------------------------------------------------------//


        return $this->render('Configurations/Gaming/Third-step-gaming-amd.html.twig',
            array('processor1'=>$processor,
                'processor2'=>$processor1,
                'processor3'=>$processor2,
                'motherboard1'=>$motherboard1,
                'motherboard2'=>$motherboard2,
                'motherboard3'=>$motherboard3,
                'videocard1'=>$videocard1,
                'videocard2'=>$videocard2,
                'videocard3'=>$videocard3,
                'ram1'=>$ram1,
                'ram2'=>$ram2,
                'ram3'=>$ram3,
                'hard1'=>$hard1,
                'hard2'=>$hard2,
                'hard3'=>$hard3,
                'power1'=>$power1,
                'power2'=>$power2,
                'power3'=>$power3,
            ));

    }

    /**
     * @Route("/save", name="save")
     */
    public function saveconfig()
    {
        $user = $this->getUser();
        $user_id=$user->getId();

        $result1=$_POST['processora'];
        $result2=$_POST['dunno'];
        $result3=$_POST['ramta'];
        $result4=$_POST['harddiska'];
        $result5=$_POST['videocartata'];
        $result6=$_POST['zahranvaneto'];


        $configuration=array();
        array_push($configuration,$result1,$result2,$result3,$result4,$result5,$result6);



          $entityManager = $this->getDoctrine()->getManager();
        $userdata = $entityManager->getRepository(User::class)->find($user_id);


        $config1=$userdata->getConfig1();
        $config2=$userdata->getConfig2();
        $config3=$userdata->getConfig3();
        $config4=$userdata->getConfig4();
        $config5=$userdata->getConfig5();

         if (!$user) {
             throw $this->createNotFoundException(
                 'No product found for id ' . $user_id
             );
         }


        $serconfiguration = serialize($configuration);


         if($config1=='')
         {
             $userdata->setConfig1($serconfiguration);

         }
         else if($config2=='')
         {
             $userdata->setConfig2($serconfiguration);
         }

         else if($config3=='')
         {
             $userdata->setConfig3($serconfiguration);
         }

         else if($config4=='')
         {
             $userdata->setConfig4($serconfiguration);
         }

         else if($config5=='')
         {
             $userdata->setConfig5($serconfiguration);
         }



         $entityManager->flush();


        return new Response(
            ' '
        );
    }
}