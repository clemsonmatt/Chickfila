<?php

namespace CFA\EventRegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuItemCollectionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('items', SymfonyTypes\CollectionType::class, [
            'label'        => false,
            'entry_type'   => SymfonyTypes\TextType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'delete_empty' => true,
            'required'     => false,
            // 'by_reference' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'CFA\EventRegisterBundle\Entity\Transaction',
        ]);
    }
}
