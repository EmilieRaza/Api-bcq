<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
   
        $builder->add('termsAccepted', CheckboxType::class)
                ->add('firstname', TextType::class)
                ->add('lastname', TextType::class);
    }

    public static function getExtendedTypes(): iterable
    {
        return ['Nucleos\ProfileBundle\Form\Type\RegistrationFormType'];
    }
}