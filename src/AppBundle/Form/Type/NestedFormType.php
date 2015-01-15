<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NestedFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('form2', 'collection', [
                'mapped' => false,
                'type' => new NestedTwoFormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'prototype_name' => '__nested_two_prototype__',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'mapped' => false,
            'horizontal' => true,
            'render_label' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nested';
    }
}
