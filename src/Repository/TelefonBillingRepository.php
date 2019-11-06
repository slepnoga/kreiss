<?php

namespace App\Repository;

use App\Entity\TelefonBilling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TelefonBilling|null find($id, $lockMode = null, $lockVersion = null)
 * @method TelefonBilling|null findOneBy(array $criteria, array $orderBy = null)
 * @method TelefonBilling[]    findAll()
 * @method TelefonBilling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelefonBillingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TelefonBilling::class);
    }

    // /**
    //  * @return TelefonBilling[] Returns an array of TelefonBilling objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TelefonBilling
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
