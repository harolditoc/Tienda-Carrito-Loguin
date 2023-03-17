<?php

namespace App\Form;

use App\Entity\Venta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipoComprobante')
            ->add('serieComprobante')
            ->add('numeroComprobante')
            ->add('fechaHora')
            ->add('impuesto')
            ->add('pagoTotal')
            ->add('estado')
            ->add('personaIdpersona')
            ->add('usuarioIdusuario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Venta::class,
        ]);
    }
}
