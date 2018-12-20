<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Hsm
 * @ORM\Entity
 * @ORM\Table(name="hsm_group")
 * @author Paulo Filipe Macedo dos Santos <paulo.santos@solutinet.com.br>
 */
class HsmGroup
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
     * @ORM\Column(name="name",type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="status",type="integer")
     */
    protected $status;

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
}
