<?php

namespace App\Repository;

use App\Entity\CarService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarService|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarService|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarService[]    findAll()
 * @method CarService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarServiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarService::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
