<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;





class FatoorahService
{

    private $request_client;
    private $base_url;
    private $headers;

    public function __construct(Client $request_client)  // change verify to true in Client file when  use ssl certificate
    {
        // change verify to false in Client file when not use ssl certificate or use this way
        // $request_client = new Client(['verify' => false]);  // make it false on local because payment getway not allow url without ssl

        $this->request_client = $request_client;

        $this->base_url = env('fatoorah_base_url');
        $this->headers = [
            'content-type' => 'application/json',
            'authorization' => 'Bearer ' . env('fatoorah_token'),
        ];
    }


    public function buildRequest($uri, $method, $data = [])
    {

        $request = new Request($method, $this->base_url . $uri, $this->headers);




        if (!$data)
            return false;


        $response = $this->request_client->send($request, [
            'json' => $data
        ]);




        if ($response->getStatusCode() !== 200)
            return false;

        $response  = json_decode($response->getBody(), true);

        return $response;
    }

    public function sendPayment($data)
    {

        return  $response = $this->buildRequest('/v2/SendPayment', 'POST', $data);
    }

    public function getPaymentStatus($data)
    {

        return  $response = $this->buildRequest('/v2/getPaymentStatus', 'POST', $data);
    }

    public function saveTransactionPayment($payment_id, $invoice_id)
    {
    }

    public function transactionCallback($request)
    {
    }
}
