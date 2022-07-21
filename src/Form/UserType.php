<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipoPersona', ChoiceType::class, ['choices' => ['Natural' => 'N', 'Juridica' => "J"], ])
            ->add('nombre')
            ->add('tipoDocumento', ChoiceType::class, ['choices' => ['DNI' => 'DNI', 'Doc. de extrajeria' => "DE"], ])
            ->add('numDocumento', IntegerType::class)
            ->add('direccion')
            ->add('telefono', IntegerType::class)
            ->add('email', EmailType::class)
            ->add('clave', PasswordType::class)
            ->add('Registrar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Persona::class,
        ]);
    }
}
