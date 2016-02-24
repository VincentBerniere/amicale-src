<?php

namespace AGIL\ForumBundle\Form;

use AGIL\ForumBundle\Form\SubjectHomeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FirstAnswerHomeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('forumAnswerText', 'textarea', array(
            'label' => false,
            'attr' => array(
                'class' => 'form-control tinymce',
                'data-theme' => 'advanced',
            )
        ));

        $builder->add('subject', new SubjectHomeType(), array ('data_class'   =>  'AGIL\ForumBundle\Entity\AgilForumSubject',));

        $builder->add('Ajouter', 'submit', array(
            'label' => false,
            'attr' => array(
                'class' => 'btn btn-primary',
            )
        ));
    }

    public function getName()
    {
        return 'forum_add_first_answer_home';
    }
}