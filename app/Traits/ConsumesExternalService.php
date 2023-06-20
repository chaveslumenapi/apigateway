<?php

namespace App\Traits;
use GuzzleHttp\Client;
trait ConsumesExternalService

{
    public function performRequest($method, $requestUrl, $form_params =[], $headers =[])
    {
        // create a new client request
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if(isset($this->secret)){
            $headers['Authorization'] = $this->secret;
        }

        // perform the request (method, url, form parameters, headers)
        $response = $client->request($method,$requestUrl,[
            'form_params' => $form_params, 'headers' =>$headers
        ]);
        
        // return the response body contents
        return $response->getBody()->getContents();
    }
}