<?php
namespace Aplicacao\Factories;

class MQManagerFactory
{
    public function __invoke($services)
    {
        // $config = $services->get('config');
        $mqManager = new MQManager();
        return $mqManager;
    }
}