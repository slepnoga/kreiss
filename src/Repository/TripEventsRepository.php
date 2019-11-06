<?php

namespace App\Repository;

use App\Entity\TripEvents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TripEvents|null find($id, $lockMode = null, $lockVersion = null)
 * @method TripEvents|null findOneBy(array $criteria, array $orderBy = null)
 * @method TripEvents[]    findAll()
 * @method TripEvents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripEventsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TripEvents::class);
    }

    // /**
    //  * @return TripEvents[] Returns an array of TripEvents objects
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
    public function findOneBySomeField($value): ?TripEvents
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
