<?php

namespace CFA\EventRegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CFA\EventRegisterBundle\Entity\Menu;

class MenuType extends AbstractType
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

        $builder->add('price', SymfonyTypes\TextType::class, [
            'label'    => 'Price',
            'required' => true,
        ]);

        $builder->add('type', SymfonyTypes\ChoiceType::class, [
            'label'    => 'Type',
            'choices'  => Menu::getValidTypes(),
            'required' => true,
        ]);

        $builder->add('picture', SymfonyTypes\FileType::class, [
            'label'    => 'Image',
            'mapped'   => false,
            'required' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'CFA\EventRegisterBundle\Entity\Menu',
        ]);
    }
}
