<?php

namespace MaricTrading\TrixeditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrixEditorType extends AbstractType
{

    public function getParent()
    {
        //return FormType::class;
        return TextareaType::class;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            "allow_uploads"=>false,
        ]);
    }


    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
        $view->vars['allow_uploads'] = $options['allow_uploads'] ?? false;
    }


    public function getBlockPrefix()
    {
        return 'trixeditor';
    }

    public function getName()
    {
        return 'trixeditor';
    }
}
