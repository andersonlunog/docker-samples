<?php
namespace Aplicacao\V1\Rest\RegisterPublisher;

class RegisterPublisherResourceFactory
{
    public function __invoke($services)
    {
        $mqManager = $services->get('MQManagerFactory');
        $entityManager = $services->get('Doctrine\ORM\EntityManager');
        return new RegisterPublisherResource($mqManager, $entityManager);
    }
}
