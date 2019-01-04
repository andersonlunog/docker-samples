<?php
namespace Aplicacao\V1\Rest\RegisterSubscriber;

class RegisterSubscriberResourceFactory
{
    public function __invoke($services)
    {
        $mqManager = $services->get('MQManagerFactory');
        $entityManager = $services->get('Doctrine\ORM\EntityManager');
        return new RegisterSubscriberResource($entityManager, $mqManager);
    }
}
