<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index()
    {
        return $this->render('base/index.html.twig', []);
    }


    /**
     * @Route("/locavore", name="locavore")
     */

    public function locavore()
    {
        return $this->render('base/locavore.html.twig', []);

        //la partie "principe" qui explique le but du site, les engagements, le locavore...
    }



    /**
     * @Route("/cgu", name="cgu")
     */

    public function cgu()
    {
        return $this->render('base/cgu.html.twig', []);
    }

    /**
     * @Route("about_us", name="about_us")
     */

    public function aboutUs()
    {
        return $this->render('base/about_us.html.twig', []);
    }


    /**
     * @Route("copyrights", name="copyrights")
     */

    public function copyrights()
    {
        return $this->render('base/copyrights.html.twig', []);
    }



    /**
     * @Route("contact", name="contact")
     */

    public function contact(Request $request, \Swift_Mailer $mailer)
    {

        $form = $this->createForm(ContactType::class, null);
        $form->handleRequest($request);

        // traitement des infos du formulaire

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // permet de récupérer toutes les infos du formulaire
            // prenom = $data['prenom']
            // objet = $data['objet']

            if ($this->sendEmail($data, $mailer)) {
                // $mailer : objet swiftmailer
                $this->addFlash('success', 'Votre email a été envoyé et sera traité dans les meilleurs délais.');
                return $this->redirectToRoute("contact");
            } else {
                $this->addFlash('errors', 'Un problème a eu lieu durant l\'envoie, veuillez ré-essayer plus tard');
            }
        }

        // Affichage de la vue

        return $this->render('base/contact.html.twig', [
            "form" => $form->createView()
        ]);

        //formulaire de contact une fois envoyé, un message de confirmation apparaît dans la vue
    }

    /**
     * Permet d'envoyer des emails
     *
     */
    public function sendEmail($data, \Swift_Mailer $mailer)
    {
        $mail = new \Swift_Message();
        // On instancie un objet swiftmailer en précisant l'objet (sujet) du mail.

        $mail
            ->setSubject($data['subject'])
            ->setFrom($data['email'])
            ->setTo('contact@boutique.com')
            ->setBody(
                $this->renderView('mail/contact_mail.html.twig', [
                    'data' => $data
                ]),
                'text/html'
            );

        if ($mailer->send($mail)) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * @Route("career", name="career")
     */

    public function career()
    {
        return $this->render('base/career.html.twig', []);
    }
}
