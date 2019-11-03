<?php

namespace App\Repository;

use App\Entity\RefillFrigo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RefillFrigo|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefillFrigo|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefillFrigo[]    findAll()
 * @method RefillFrigo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefillFrigoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefillFrigo::class);
    }

    // /**
    //  * @return RefillFrigo[] Returns an array of RefillFrigo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RefillFrigo
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
