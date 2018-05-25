<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\CarService;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('time', DateTimeType::class)
            ->add('rulerCar', EntityType::class, array(
                'class' => Car::class,
                'query_builder' => function (EntityRepository $entityRepository)  {
                    return $entityRepository->createQueryBuilder('u')->where('u.ruler = 5');
                },
                'choice_label' => 'make',
            ))
            ->add('rulerService', EntityType::class, array(
                'class' => Service::class,
                'choice_value' => function(Service $entity = null) {
                    return null === $entity ? '':$entity->getName();
                },
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarService::class,
        ]);
    }
}
