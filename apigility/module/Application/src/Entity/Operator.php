<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Operator
 * @ORM\Entity
 * @ORM\Table(name="operator")
 * @author Paulo Filipe Macedo dos Santos <paulo.santos@solutinet.com.br>
 */
class Operator
{   
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * */
    private $id;
    
    /** @ORM\Column(type="string")  * */
    private $name;
    
    /** @ORM\Column(type="integer")  * */
    private $status;
    
    /** @ORM\Column(name="dt_create",type="datetime",nullable=true)  * */
    private $dtCreate;

    /** @ORM\Column(name="dt_last_use",type="datetime",nullable=true)  * */
    private $dtLastUse;
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDtCreate()
    {
        return $this->dtCreate;
    }

    public function getDtLastUse()
    {
        return $this->dtLastUse;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setDtCreate($dtCreate)
    {
        $this->dtCreate = $dtCreate;
    }

    public function setDtLastUse($dtLastUse)
    {
        $this->dtLastUse = $dtLastUse;
    }
}