<?php

namespace CFA\Hub\MarketingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use CFA\Hub\SharedBundle\Entity\Product;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', SymfonyTypes\TextType::class, [
            'label'    => 'Name',
            'required' => true,
        ]);

        $builder->add('category', SymfonyTypes\ChoiceType::class, [
            'label'       => 'Category',
            'required'    => true,
            'choices'     => Product::getCategoryList(),
            'placeholder' => '-- Category --',
        ]);

        $builder->add('group', SymfonyTypes\ChoiceType::class, [
            'label'       => 'Group',
            'required'    => false,
            'choices'     => Product::getGroupList(),
            'placeholder' => '-- Group --',
        ]);

        $builder->add('description', SymfonyTypes\TextareaType::class, [
            'label'    => 'Description',
            'required' => false,
            'attr'     => [
                'rows' => 8,
            ],
        ]);

        $builder->add('servingSize', SymfonyTypes\TextType::class, [
            'label'    => 'Serving Size',
            'required' => false,
        ]);

        $builder->add('countDescription', SymfonyTypes\TextType::class, [
            'label'    => 'Number of items',
            'required' => false,
        ]);

        $builder->add('price', SymfonyTypes\NumberType::class, [
            'label'    => 'Price',
            'required' => true,
        ]);

        $builder->add('photo', SymfonyTypes\FileType::class, [
            'label'    => 'Photo',
            'required' => false,
            'mapped'   => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
