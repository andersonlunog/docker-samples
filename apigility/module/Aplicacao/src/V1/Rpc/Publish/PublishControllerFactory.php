<?php
namespace Aplicacao\V1\Rpc\Publish;

class PublishControllerFactory
{
    public function __invoke($controllers)
    {
        $mqManager = $controllers->get('MQManagerFactory');
        $entityManager = $controllers->get('Doctrine\ORM\EntityManager');
        return new PublishController($mqManager, $entityManager);
    }
}
