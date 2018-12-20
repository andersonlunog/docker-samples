<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Category
 * @ORM\Entity
 * @ORM\Table(name="category")
 * @author Paulo Filipe Macedo dos Santos <paulo.santos@solutinet.com.br>
 */
class Category
{   
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * */
    private $id;
    
    /** @ORM\Column(type="string")  * */
    private $name;
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}