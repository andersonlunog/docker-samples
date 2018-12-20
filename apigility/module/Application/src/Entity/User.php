<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Operator
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @author Paulo Filipe Macedo dos Santos <paulo.santos@solutinet.com.br>
 */
class User
{

    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * */
    private $id;

    /** @ORM\Column(type="string")  * */
    private $name;

    /** @ORM\Column(type="string")  * */
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
