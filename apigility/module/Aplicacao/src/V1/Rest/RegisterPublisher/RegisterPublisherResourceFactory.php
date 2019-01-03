<?php
namespace Aplicacao\V1\Rest\RegisterPublisher;

class RegisterPublisherResourceFactory
{
    public function __invoke($services)
    {
        $mqManager = $services->get('MQManagerFactory');
        return new RegisterPublisherResource($mqManager);
    }
}
