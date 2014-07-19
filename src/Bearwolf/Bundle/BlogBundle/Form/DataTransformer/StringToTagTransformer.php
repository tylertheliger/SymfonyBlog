<?php

// src/Bearwolf/Bundle/BlogBundle/Form/DataTransformer/StingToTagTransformer.php
namespace Bearwolf\Bundle\BlogBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Bearwolf\Bundle\BlogBundle\Entity\Tag;

class TagToStringTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (tag) to a string (string).
     *
     * @param  Tag|null $tag
     * @return string
     */
    public function transform($tag)
    {
        if (null === $tag) {
            return "";
        }

        return $tag->getTag();
    }

    /**
     * Transforms a string (string) to an object (tag).
     *
     * @param  string $string
     *
     * @return Tag|null
     *
     * @throws TransformationFailedException if object (tag) is not found.
     */
    public function reverseTransform($string)
    {
        if (!$string) {
            return null;
        }

        $tag = $this->om
            ->getRepository('BearwolfBlogBundle:Tag')
            ->findOneBy(array('content' => $string))
        ;

        if (null === $tag) {
            throw new TransformationFailedException(sprintf(
                'An tag with number "%s" does not exist!',
                $string
            ));
        }

        return $tag;
    }
}
