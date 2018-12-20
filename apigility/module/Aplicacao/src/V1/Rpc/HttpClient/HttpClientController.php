<?php
namespace Aplicacao\V1\Rpc\HttpClient;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Json\Json;
use Zend\Http\Client;

class HttpClientController extends AbstractActionController
{
    public function httpClientAction()
    {
        $params = Json::decode($this->getRequest()->getContent());
        // print_r($params);

        $client = new Client();
        $client->setUri('http://192.168.2.94:3000/api/testpost');
        $client->setMethod('POST');
        $client->setParameterPost([
            "name"  => $params->name
        ]);
        $client->setHeaders([
            "HeaderField1" => "Bearer 8E94745A1F033999"
        ]);
        $response = $client->send();
        $body = json_decode($response->getBody());
        print_r($body);
        // print_r($response->toString());

        return [
            "success" => true,
            "name" => $body->data->name
        ];
    }
}
