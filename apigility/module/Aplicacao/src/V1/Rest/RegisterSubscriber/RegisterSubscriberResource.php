<?php
namespace Aplicacao\V1\Rest\RegisterSubscriber;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class RegisterSubscriberResource extends AbstractResourceListener
{
    
    /**
     * @var \Aplicacao\Factories\MQManager
     */
    protected $mqManager;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;
    
    /**
     * 
     * @param Doctrine\ORM\EntityManager $em
     * @param Aplicacao\Factories\MQManager $mq
     */
    public function __construct($em, $mq) {
        $this->entityManager = $em;
        $this->mqManager = $mq;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('p');
        $qb->from('Application\Entity\Publisher', 'p');
        $qb->where('p.channel = :channel');
        $qb->setParameters(['channel' => $data->channel]);
        /* @var $publisher \Application\Entity\Publisher */
        $publisher = $qb->getQuery()->getOneOrNullResult();
        
        if ($publisher == null) {
            echo "Canal $data->channel não encontrado.";
            return false;
        }
        
        if (strpos($publisher->getReceivers(), $data->dns) === false) {
            echo "Destinatário $data->dns não encontrado.";
            return false;
        }
        
        $repository = $this->entityManager->getRepository(\Application\Entity\Subscriber::class);
        /* @var $sub \Application\Entity\Subscriber */
        $sub = $repository->findOneBy(["channel" => $data->channel, "dns" => $data->dns]);
        if ($sub == null) {
            echo "Não foi encontrado destinatário para o canal $data->channel com dns $data->dns";
            return;
        }
        $url = $sub->getUrl();
                
        $callback = function ($msg) use ($url) {
            error_log(' [x] Mensagem recebida: ' . $msg->body . "\n");
            $obj = json_decode($msg->body);
            $obj->datetime = date(DATE_ISO8601);
            $this->mqManager->sendExternal($url, $obj);
            error_log(' [x] Mensagem externada \n');
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
//            $msg->delivery_info['channel']->basic_cancel($msg->delivery_info['consumer_tag']);
        };

        return $this->mqManager->startReceive("{$sub->getChannel()}_{$sub->getDns()}", $callback);
        
                
//        $subscriber = new \Application\Entity\Subscriber();
//        $subscriber->setChannel($data->channel);
//        $subscriber->setDns($data->dns);
//        $subscriber->setUrl($data->url);
//        $this->entityManager->persist($subscriber);
//        $this->entityManager->flush();
        
//        return new ApiProblem(405, 'The POST method has not been defined');
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
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
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
