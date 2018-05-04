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
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('make', TextType::class)
            ->add('model', TextType::class)
            ->add('year', DateType::class)

            // Perdaryti į int tipo masyvą. priskirtos reikšmės gali susipjauti, geriau naudoti skaičius
            //
            //
            ->add('fuelType', ChoiceType::class, array(
                'choices'  => array(
                    'Benzinas' => 'benzinas',
                    'Dyzelinas' => 'dyzelinas',
                    'Benzinas / dujos' => 'benzinas/dujos',
                    'Benzinas / elektra' => 'benzinas/elektra',
                    'Elektra' => 'elektra',
            )));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Car::class,
        ));
    }
}