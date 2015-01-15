<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NestedThreeFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('form4', 'collection', [
                'mapped' => false,
                'type' => new NestedFourFormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'prototype_name' => '__nested_four_prototype__',
            ])
            ->add('text_three')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'mapped' => false,
            'render_label' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nested_three';
    }
}
