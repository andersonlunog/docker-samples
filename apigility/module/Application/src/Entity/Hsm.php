<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Hsm
 * @ORM\Entity
 * @ORM\Table(name="hsm")
 * @author Paulo Filipe Macedo dos Santos <paulo.santos@solutinet.com.br>
 */
class Hsm
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(name="status",type="integer")
     */
    protected $status;

    /**
     * @ORM\Column(name="name",type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="ip",type="string", nullable=true)
     */
    protected $ip;

    /**
     * @ORM\Column(name="port",type="string", nullable=true)
     */
    protected $port;

    /**
     * @ORM\Column(name="site",type="string", nullable=true)
     */
    protected $site;

    /**
     * @var HsmGroup
     * @ORM\ManyToOne(targetEntity="HsmGroup")
     * @ORM\JoinColumn(name="id_hsm_group", referencedColumnName="id")
     */
    protected $hsmGroup;
    
    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function getHsmGroup(): HsmGroup
    {
        return $this->hsmGroup;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function setPort($port)
    {
        $this->port = $port;
    }

    public function setSite($site)
    {
        $this->site = $site;
    }

    public function setHsmGroup(HsmGroup $hsmGroup)
    {
        $this->hsmGroup = $hsmGroup;
    }
}
    