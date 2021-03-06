<?php

namespace AGIL\SearchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;

class SearchAdvancedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tags', TextType::class, array(
            'label' => false,
            'constraints' => array(
                new Length(array('min' => 2,'max' => 50))
            ),
            'attr' => array(
                'class' => 'form-control'
            )
        ));

        $builder->add('filter', ChoiceType::class, array(
            'choices' => array('Tout' => 'all', 'Forum' => 'forum', 'Offres' => 'offer', 'Evenements' => 'hall', 'Profils' => 'profile'),
            'choices_as_values' => true,
            'expanded' => true,
            'multiple' => false
        ));

        $builder->add('method', ChoiceType::class, array(
            'choices' => array('ET' => 'and', 'OU' => 'or'),
            'choices_as_values' => true,
            'expanded' => true,
            'multiple' => false
        ));

        $builder->add('no', TextType::class, array(
            'label' => false,
            'required' => false,
            'constraints' => array(
                new Length(array('min' => 2,'max' => 50))
            ),
            'attr' => array(
                'class' => 'form-control'
            )
        ));


    }

    public function getBlockPrefix()
    {
        return '';
    }
}