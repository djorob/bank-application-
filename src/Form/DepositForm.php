<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class DepositForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, [
                'required'   => false,
                'disabled' => true,
            ])
            ->add('number', null, [
                'required'   => false,
                'disabled' => true,
            ])
            ->add('balance', null, [
                'required'   => false,
                'disabled' => true,
            ])
            ->add('amount', null, [
                'required'   => true,
                'disabled' => false,
                'mapped' => false,
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
