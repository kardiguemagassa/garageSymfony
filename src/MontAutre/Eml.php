<?php

namespace App\MontAutre;


 class Eml {

    private $api_key='50e0a9ecca1ffcce980fd6c55abaf2a1';
    private $api_key_secret='9ae5ae9af2cd13707fa3d2fbbf2f8feb';

    public function send($to_email, $to_name, $subject, $content){

        $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "magassakara@gmail.com",
                        'Name' => "Kardigué"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 5273371,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && dd($response->getData());

     }
}