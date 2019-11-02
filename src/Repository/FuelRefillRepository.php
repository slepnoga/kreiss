<?php

namespace App\Repository;

use App\Entity\FuelRefill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FuelRefill|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuelRefill|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuelRefill[]    findAll()
 * @method FuelRefill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuelRefillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FuelRefill::class);
    }

    // /**
    //  * @return FuelRefill[] Returns an array of FuelRefill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FuelRefill
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
