<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NestedTwoFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('form3', 'collection', [
                'mapped' => false,
                'type' => new NestedThreeFormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'prototype_name' => '__nested_three_prototype__',
            ])
            ->add('text_two')
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
        return 'nested_two';
    }
}
