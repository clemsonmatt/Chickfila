<?php

namespace CFA\Hub\MarketingBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class OrderType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add('product', EntityType::class, [
            'label'         => 'Product',
            'class'         => 'CFAHubSharedBundle:Product',
            'required'      => true,
            'placeholder'   => '-- Product --',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('p')
                    ->orderBy('p.category', 'asc');
            },
        ]);

        $builder->add('qty', SymfonyTypes\NumberType::class, [
            'label'    => 'Qty',
            'data'     => '1',
            'required' => true,
        ]);

        $builder->add('specialRequest', SymfonyTypes\TextareaType::class, [
            'label'    => 'Comments',
            'required' => false,
            'attr'     => [
                'rows' => 2,
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \CFA\Hub\SharedBundle\Entity\Sale::class,
        ]);
    }
}
