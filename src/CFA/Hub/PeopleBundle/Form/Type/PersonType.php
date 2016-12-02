<?php

namespace CFA\Hub\PeopleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use CFA\Hub\SharedBundle\Entity\Person;

class PersonType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', SymfonyTypes\TextType::class, [
            'label'    => 'First Name',
            'required' => true,
        ]);

        $builder->add('lastName', SymfonyTypes\TextType::class, [
            'label'    => 'Last Name',
            'required' => true,
        ]);

        $builder->add('username', SymfonyTypes\TextType::class, [
            'label'    => 'Username',
            'required' => true,
        ]);

        if ($options['show_all']) {
            $builder->add('password', SymfonyTypes\PasswordType::class, [
                'label'    => 'Password',
                'required' => false,
            ]);
        }

        $builder->add('email', SymfonyTypes\EmailType::class, [
            'label'    => 'Email',
            'required' => false,
        ]);

        $builder->add('phone', SymfonyTypes\TextType::class, [
            'label'    => 'Phone',
            'required' => false,
        ]);

        $builder->add('birthday', SymfonyTypes\DateType::class, [
            'label'    => 'Birthday',
            'widget'   => 'single_text',
            'required' => true,
        ]);

        $builder->add('position', SymfonyTypes\ChoiceType::class, [
            'label'       => 'Position',
            'choices'     => Person::getValidPositions(false),
            'required'    => true,
            'placeholder' => '-- Position --',
        ]);

        $builder->add('hireDate', SymfonyTypes\DateType::class, [
            'label'    => 'Hire Date',
            'widget'   => 'single_text',
            'required' => true,
        ]);

        $builder->add('roles', SymfonyTypes\ChoiceType::class, [
            'label'   => 'Roles',
            'choices' => Person::getValidRoles(),
            'expanded' => true,
            'multiple' => true,
            'required' => true,
        ]);

        if (! $options['show_all']) {
            $builder->add('active', SymfonyTypes\ChoiceType::class, [
                'label'    => 'Employee Status',
                'choices'  => [
                    'Active'             => true,
                    'No longer employed' => false,
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true,
            ]);
        }

        $builder->add('picture', SymfonyTypes\FileType::class, [
            'label'    => 'Picture',
            'required' => false,
            'mapped'   => false,
        ]);

        $builder->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);

        $resolver->setRequired([
            'show_all',
        ]);
    }
}
