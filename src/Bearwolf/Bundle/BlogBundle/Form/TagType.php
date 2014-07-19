<?php 
// src/Acme/TaskBundle/Form/TagType.php
namespace Bearwolf\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('name');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bearwolf\Bundle\BlogBundle\Entity\Tag',
        ));
    }

    public function getName()
    {
        return 'tag';
    }
}
