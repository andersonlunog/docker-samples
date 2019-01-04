<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PubSub
 *
 * @ORM\Table(name="subscriber")
 * @ORM\Entity
 */
class Subscriber
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
    private $dns;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $url;
    
    public function getId()
    {
        return $this->id;
    }
    public function getChannel() {
        return $this->channel;
    }

    public function getDns() {
        return $this->dns;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setChannel($channel) {
        $this->channel = $channel;
    }

    public function setDns($dns) {
        $this->dns = $dns;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
}
