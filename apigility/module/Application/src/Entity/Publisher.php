<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PubSub
 *
 * @ORM\Table(name="publisher")
 * @ORM\Entity
 */
class Publisher
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
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $receivers;

    public function getId()
    {
        return $this->id;
    }
    public function getChannel() {
        return $this->channel;
    }

    public function getReceivers() {
        return $this->receivers;
    }

    public function setChannel($channel) {
        $this->channel = $channel;
    }

    public function setReceivers($receivers) {
        $this->receivers = $receivers;
    }
}
