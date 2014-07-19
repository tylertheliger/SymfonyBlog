<?php

namespace Bearwolf\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=false)
     */
    public $name;
    
    public function addPost(Post $post)
{
    if (!$this->posts->contains($post)) {
        $this->posts->add($post);
    }
}
}
