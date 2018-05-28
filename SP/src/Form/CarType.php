<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('regNr', TextType::class)
            ->add('make', TextType::class)
            ->add('model', TextType::class)
            ->add('year', DateType::class)

            ->add('fuelType', ChoiceType::class, array(
                'choices'  => array(
                    'Gasoline' => 'gasoline',
                    'Diesel' => 'diesel',
                    'Gasoline / gas' => 'gasoline/gas',
                    'Gasoline / electricity' => 'gasoline/electricity',
                    'Electricity' => 'electricity',
            )))
            ->add('gearbox', ChoiceType::class, array(
                'choices'  => array(
                    'Manual' => 'manual',
                    'Automatic' => 'automatic')))
            ->add('engineCapacity', NumberType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Car::class,
        ));
    }
}