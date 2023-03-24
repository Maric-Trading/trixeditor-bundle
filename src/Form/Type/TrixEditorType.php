<?php

namespace MaricTrading\TrixeditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class TrixEditorType extends AbstractType
{

    public function getParent()
    {
        //return FormType::class;
        return TextareaType::class;
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
