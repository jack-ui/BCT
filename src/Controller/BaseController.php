<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index()
    {
        return $this -> render('base/index.html.twig', [
		]);
    }



    /**
     * @Route("/cgu", name="cgu")
     */

    public function cgu()
    {
        return $this -> render('base/cgu.html.twig', [
		]);
    }

    /**
     * @Route("about_us", name="about_us")
     */

    public function aboutUs()
    {
        return $this -> render('base/about_us.html.twig', [
		]);
    }


    /**
     * @Route("copyrights", name="copyrights")
     */

    public function copyrights()
    {
        return $this -> render('base/copyrights.html.twig', [
		]);
    }


    /**
     * @Route("contact", name="contact")
     */

    public function contact()
    {
        return $this -> render('base/contact.html.twig', [
        ]);
        
        //formulaire de contact une fois envoyé, un message de confirmation apparaît dans la vue
    }



    /**
     * @Route("career", name="career")
     */

    public function career()
    {
        return $this -> render('base/career.html.twig', [
		]);
    }


}