<?php
namespace Aplicacao\V1\Rpc\HttpClient;

class HttpClientControllerFactory
{
    public function __invoke($controllers)
    {
        return new HttpClientController();
    }
}
