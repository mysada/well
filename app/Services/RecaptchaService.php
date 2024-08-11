<?php

namespace App\Services;

use GuzzleHttp\Client;

class RecaptchaService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function verify($token)
    {
        $response = $this->client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('6LcVGSQqAAAAALchGprYckmG2uUibg3bnWWAnj_n'),
                'response' => $token,
            ],
        ]);

        $body = json_decode((string)$response->getBody());

        return $body->success;
    }
}
