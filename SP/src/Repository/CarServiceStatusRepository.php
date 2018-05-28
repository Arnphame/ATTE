<?php

namespace App\Repository;

use App\Entity\CarServiceStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarServiceStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarServiceStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarServiceStatus[]    findAll()
 * @method CarServiceStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarServiceStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarServiceStatus::class);
    }

//    /**
//     * @return CarServiceStatus[] Returns an array of CarServiceStatus objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarServiceStatus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
