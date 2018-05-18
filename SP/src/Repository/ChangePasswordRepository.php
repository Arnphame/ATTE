<?php

namespace App\Repository;

use App\Entity\ChangePassword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChangePassword|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChangePassword|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChangePassword[]    findAll()
 * @method ChangePassword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChangePasswordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChangePassword::class);
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
