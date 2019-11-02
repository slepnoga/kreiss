<?php

namespace App\Repository;

use App\Entity\FrigoRefill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FrigoRefill|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrigoRefill|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrigoRefill[]    findAll()
 * @method FrigoRefill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrigoRefillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrigoRefill::class);
    }

    // /**
    //  * @return FrigoRefill[] Returns an array of FrigoRefill objects
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
    public function findOneBySomeField($value): ?FrigoRefill
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
