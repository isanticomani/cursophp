<?php

namespace App\Controllers;

use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class ContactController extends BaseController
{
    public function index(){
        return $this->renderHTML('contact/index.twig');
    }

    public function send(ServerRequest $request){
        $requestData = $request->getParsedBody();

        $message = new Message();

        // // Create the Transport
        // $transport = (new \Swift_SmtpTransport(\getenv('SMTP_HOST'), getenv('SMTP_PORT')))
        // ->setUsername(\getenv('SMTP_USER'))
        // ->setPassword(getenv('SMTP_PASS'))
        // ;

        // // Create the Mailer using your created Transport
        // $mailer = new \Swift_Mailer($transport);

        // // Create a message
        // $message = (new \Swift_Message('Wonderful Subject'))
        // ->setFrom(['john@doe.com' => 'John Doe'])
        // ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
        // ->setBody('Hi you have a new message. Name: ' . $requestData['name']
        //         . " email: " . $requestData['email'] . " message: " . $requestData['message']
        //         );

        // // Send the message
        // $result = $mailer->send($message);
        return new RedirectResponse('/contact');
    }
}
