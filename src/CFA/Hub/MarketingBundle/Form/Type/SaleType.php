<?php

namespace CFA\Hub\MarketingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

use CFA\Hub\SharedBundle\Entity\Sale;

class SaleType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add('comments', SymfonyTypes\TextareaType::class, [
            'label'    => 'Comments',
            'required' => false,
            'attr'     => [
                'rows' => 10,
            ],
        ]);

        $builder->add('pickupDate', SymfonyTypes\DateType::class, [
            'label'    => 'Pickup Date',
            'widget'   => 'single_text',
            'format'   => 'MM/dd/yyyy',
            'html5'    => false,
            'required' => true,
            'attr'     => [
                'class'            => 'datepicker',
                'data-date-format' => 'mm/dd/yyyy',
                'placeholder'      => 'Pickup Date',
            ],
        ]);

        $builder->add('pickupTime', SymfonyTypes\TextType::class, [
            'label'    => 'Pickup Time',
            'required' => false,
            'attr'     => [
                'class'       => 'timepicker',
                'placeholder' => 'Pickup Time',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sale::class,
        ]);
    }
}
