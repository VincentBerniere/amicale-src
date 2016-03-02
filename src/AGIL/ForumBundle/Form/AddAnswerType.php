<?php

namespace AGIL\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddAnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('forumAnswerText', TextareaType::class, array(
            'label' => false,
            'attr' => array(
                'class' => 'tinymce form-control',
                'data-theme' => 'advanced'
            )
        ));

        $builder->add('Ajouter', SubmitType::class, array(
            'label' => false,
            'attr' => array(
                'class' => 'btn btn-primary',
            )
        ));
    }

    public function getBlockPrefix()
    {
        return 'forum_add_answer';
    }
}