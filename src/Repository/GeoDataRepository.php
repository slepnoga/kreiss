<?php

namespace App\Repository;

use App\Entity\GeoData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GeoData|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeoData|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeoData[]    findAll()
 * @method GeoData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeoDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeoData::class);
    }

    // /**
    //  * @return GeoData[] Returns an array of GeoData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeoData
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
