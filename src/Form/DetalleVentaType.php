<?php

namespace App\Form;

use App\Entity\DetalleVenta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetalleVentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cantidad')
            ->add('precio')
            ->add('descuento')
            ->add('articuloIdarticulo')
            ->add('ventaIdventa')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DetalleVenta::class,
        ]);
    }
}
