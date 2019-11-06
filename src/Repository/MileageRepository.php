<?php

namespace App\Repository;

use App\Entity\Mileage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Mileage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mileage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mileage[]    findAll()
 * @method Mileage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MileageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mileage::class);
    }

    // /**
    //  * @return Mileage[] Returns an array of Mileage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mileage
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
