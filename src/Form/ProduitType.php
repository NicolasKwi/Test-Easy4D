<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Easy4DCode', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Easy4D Code :', 'label_attr' => ['class' => 'm-1']])
            ->add('EANCode', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'EAN Code :', 'label_attr' => ['class' => 'm-1']])
            ->add('Designation', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Designation :', 'label_attr' => ['class' => 'm-1']])
            ->add('CategoryTyreName', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Category Tyre Name :', 'label_attr' => ['class' => 'm-1']])
            ->add('BrandName', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Brand Name :', 'label_attr' => ['class' => 'm-1']])
            ->add('FamilyName', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Family Name :', 'label_attr' => ['class' => 'm-1']])
            ->add('Width', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Width :', 'label_attr' => ['class' => 'm-1']])
            ->add('Height', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Height :', 'label_attr' => ['class' => 'm-1']])
            ->add('diameter', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'diameter :', 'label_attr' => ['class' => 'm-1']])
            ->add('Construction', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Construction :', 'label_attr' => ['class' => 'm-1']])
            ->add('LoadIndex', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Load Index :', 'label_attr' => ['class' => 'm-1']])
            ->add('SpeedIndex', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Speed Index :', 'label_attr' => ['class' => 'm-1']])
            ->add('Segment', TextType::class, ['attr' => ['class' => 'm-1'], 'label' => 'Segment :', 'label_attr' => ['class' => 'm-1']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
