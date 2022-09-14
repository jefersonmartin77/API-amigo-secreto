<?php

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Mailer\MailerInterface;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\Routing\Annotation\Route;

    class EmailController extends AbstractController
    {
        /**
         * @Route("/email", name="app_email")
         */

        public function sendEmail(MailerInterface $mailer, Request $request): JsonResponse
        {

            $content = $request->getContent();
            $post = json_decode($content);

            $html = '
            <p>Caso deseje participar da nossa confraternização de amigo secreto responda esse E-mail</p>
            <p>O nós estamos anceosos pelo seu contato!</p>
            ';


            $email = (new Email())
                ->from('email@exemplo.com.br')
                ->to($post->email)
                ->subject('Convite para o amigo oculto!')
                ->text('Responda esse email para ser cadastrado em nosso amigo secreto!')
                ->html($html);


            $mailer->send($email);

            return $this->json(['success' => true]);
        }
    }
