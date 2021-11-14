<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[ 'attr' => ['class' => 'form-control','name' => 'prod_name' ]])
            ->add('description',null,['attr'=> ['class' => 'form-control','name' => 'prod_desc']])
            ->add('price',null,['attr'=> ['class' => 'form-control','name' => 'prod_price']])
            ->add('quantity',null,['attr'=> ['class' => 'form-control','name' => 'prod_qty']])
            ->add('add',SubmitType::class,['attr'=> ['class' => 'btn btn-dark ']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
