<?php

namespace CFA\Hub\SharedBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as SymfonyTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', SymfonyTypes\TextType::class, [
            'label'    => 'First Name',
            'required' => false,
        ]);

        $builder->add('lastName', SymfonyTypes\TextType::class, [
            'label'    => 'Last Name',
            'required' => false,
        ]);

        $builder->add('companyName', SymfonyTypes\TextType::class, [
            'label'    => 'Company Name',
            'required' => false,
        ]);

        $builder->add('email', SymfonyTypes\EmailType::class, [
            'label'    => 'Email',
            'required' => false,
        ]);

        $builder->add('phone', SymfonyTypes\TextType::class, [
            'label'    => 'Phone',
            'required' => true,
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CFA\Hub\SharedBundle\Entity\Customer::class,
        ]);
    }
}
