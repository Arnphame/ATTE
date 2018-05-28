<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\CarService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CarServiceType extends AbstractType
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $tokenStorage = $this->tokenStorage->getToken()->getUser();
        $builder
            ->add('time', DateTimeType::class)
            ->add('rulerCar', EntityType::class, array(
                'class' => Car::class,
<<<<<<< HEAD
                'query_builder' => function (EntityRepository $entityRepository) use ($tokenStorage)  {
                    return $entityRepository->createQueryBuilder('u')->where('u.ruler = :ruler')->setParameter('ruler', $tokenStorage->getId());
                    },
=======
                'query_builder' => function (EntityRepository $entityRepository)  {
                    return $entityRepository->createQueryBuilder('u')->where('u.ruler = 5');
                },
           //     'choice_value' => function(Car $entity = null) {
             //       return null === $entity ? '':$entity->getRegNr();
               // },
>>>>>>> master
                'choice_label' => 'make',
                'choice_value' => 'id',
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
        $resolver->setRequired('tokenStorage');
        $resolver->setDefaults([
            'data_class' => CarService::class,
        ]);
    }
}
