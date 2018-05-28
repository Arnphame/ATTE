<?php

namespace App\Form;

use App\Entity\CarService;
use App\Entity\CarServiceStatus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarServiceStatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, array(
                'choices'  => array(
                    'Declined' => 'Declined',
                    'Accepted' => 'Accepted',
                    'Services started' => 'Services started',
                    'Waiting for parts' => 'Waiting for parts',
                    'Service done' => 'Service done',
                )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarService::class,
        ]);
    }
}
