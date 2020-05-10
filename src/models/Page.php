<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** 
     * @ORM\Column(type="string")
     */
    private $title;

    /** 
     * @ORM\Column(type="text")
     */
    private $content;

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setTitle($title) {
        $this->title=$title;

    }
    public function setContent($content) {
        $this->content=$content;
    }
}