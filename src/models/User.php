<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */

class User {
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** 
     * @ORM\Column(type="string")
     */
    private $username;

    /** 
     * @ORM\Column(type="string")
     */
    private $password;

    public function getId() {
        return $this->id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setUsername($username) {
        $this->username=$username;
    }
    public function setPassword($password) {
        $this->password=$password;
    }
}