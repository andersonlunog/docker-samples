<?php
namespace Aplicacao\V1\Rest\RegisterPublisher;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RegisterPublisherResource extends AbstractResourceListener
{

    /**
     * @var \Aplicacao\Factories\MQManager
     */
    protected $mqManager;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct($mq, $em) {
        $this->mqManager = $mq;
        $this->entityManager = $em;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
//        $qb = $this->entityManager->createQueryBuilder();
//        $qb->select('p')
//                ->from('Application\Entity\Publisher', 'p')
//                ->where('p.channel = :channel')
//                ->setParameters(['channel' => $data->channel]);
//        $publisher = $qb->getQuery()->getOneOrNullResult();
//        print_r($publisher->getReceivers());die;
        
        $repository = $this->entityManager->getRepository(\Application\Entity\Publisher::class);
        /* @var $publisher \Application\Entity\Publisher */
        $publisher = $repository->findOneBy(["channel" => $data->channel]);
        if ($publisher == null) {
            echo "Não foi encontrado emissro com canal $data->channel";
            return;
        }
        $receivers = explode("|", $publisher->getReceivers());

        foreach ($receivers as $receiver) {
            $channel = "{$data->channel}_{$receiver}";
            $msg = $data->data;
            $this->mqManager->publish($channel, $msg);
        }
        
//        die;
//        
//        $publisher = new \Application\Entity\Publisher();
//        $publisher->setChannel($data->channel);
//        $publisher->setReceivers($data->receivers);
//        $this->entityManager->persist($publisher);
//        $this->entityManager->flush();
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {                
        // return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
