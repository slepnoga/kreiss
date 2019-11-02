<?php

namespace App\Repository;

use App\Entity\AdBlueRefill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AdBlueRefill|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdBlueRefill|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdBlueRefill[]    findAll()
 * @method AdBlueRefill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdBlueRefillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdBlueRefill::class);
    }

    // /**
    //  * @return AdBlueRefill[] Returns an array of AdBlueRefill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdBlueRefill
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
