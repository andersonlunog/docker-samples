<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operator
 *
 * @ORM\Table(name="operator")
 * @ORM\Entity
 */
class Operator
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_create", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dtCreate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_last_use", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dtLastUse;


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
     * Set name.
     *
     * @param string $name
     *
     * @return Operator
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
     * Set status.
     *
     * @param int $status
     *
     * @return Operator
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
     * Set dtCreate.
     *
     * @param \DateTime|null $dtCreate
     *
     * @return Operator
     */
    public function setDtCreate($dtCreate = null)
    {
        $this->dtCreate = $dtCreate;

        return $this;
    }

    /**
     * Get dtCreate.
     *
     * @return \DateTime|null
     */
    public function getDtCreate()
    {
        return $this->dtCreate;
    }

    /**
     * Set dtLastUse.
     *
     * @param \DateTime|null $dtLastUse
     *
     * @return Operator
     */
    public function setDtLastUse($dtLastUse = null)
    {
        $this->dtLastUse = $dtLastUse;

        return $this;
    }

    /**
     * Get dtLastUse.
     *
     * @return \DateTime|null
     */
    public function getDtLastUse()
    {
        return $this->dtLastUse;
    }
}
