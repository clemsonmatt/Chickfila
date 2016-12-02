<?php

namespace CFA\EventRegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', SymfonyTypes\TextType::class, [
            'label'    => 'Title',
            'required' => true,
        ]);

        $builder->add('date', SymfonyTypes\DateType::class, [
            'label'    => 'Date',
            'required' => true,
        ]);

        /* menu items */
        $menuItems = [];
        foreach ($options['menu_items'] as $item) {
            $menuItems[$item->getTitle()] = $item;
        }

        $builder->add('menuItems', SymfonyTypes\ChoiceType::class, [
            'label'    => 'Menu Items',
            'choices'  => $menuItems,
            'multiple' => true,
            'expanded' => true,
            'required' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'CFA\EventRegisterBundle\Entity\Event',
        ]);

        $resolver->setRequired(['menu_items']);
    }
}
