<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hsm
 *
 * @ORM\Table(name="hsm", indexes={@ORM\Index(name="IDX_8E94745A1F033999", columns={"id_hsm_group"})})
 * @ORM\Entity
 */
class Hsm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="port", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $port;

    /**
     * @var string|null
     *
     * @ORM\Column(name="site", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $site;

    /**
     * @var \Application\Entity\HsmGroup
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\HsmGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_hsm_group", referencedColumnName="id", nullable=true)
     * })
     */
    private $idHsmGroup;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status.
     *
     * @param int $status
     *
     * @return Hsm
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Hsm
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ip.
     *
     * @param string|null $ip
     *
     * @return Hsm
     */
    public function setIp($ip = null)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set port.
     *
     * @param string|null $port
     *
     * @return Hsm
     */
    public function setPort($port = null)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port.
     *
     * @return string|null
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set site.
     *
     * @param string|null $site
     *
     * @return Hsm
     */
    public function setSite($site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.
     *
     * @return string|null
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set idHsmGroup.
     *
     * @param \Application\Entity\HsmGroup|null $idHsmGroup
     *
     * @return Hsm
     */
    public function setIdHsmGroup(\Application\Entity\HsmGroup $idHsmGroup = null)
    {
        $this->idHsmGroup = $idHsmGroup;

        return $this;
    }

    /**
     * Get idHsmGroup.
     *
     * @return \Application\Entity\HsmGroup|null
     */
    public function getIdHsmGroup()
    {
        return $this->idHsmGroup;
    }
}
