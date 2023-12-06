<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;



class SendMailerService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }


    public function send(string $from, string $to,  string $message) {
        $email = (new Email())
            ->from($from)
            ->to($to)
            //->subject($subject)
            //string $subject,
            ->text($message);

        $this->mailer->send($email);
    }
}
