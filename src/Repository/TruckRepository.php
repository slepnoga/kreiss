<?php

namespace App\Repository;

use App\Entity\Truck;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method Truck|null find($id, $lockMode = null, $lockVersion = null)
 * @method Truck|null findOneBy(array $criteria, array $orderBy = null)
 * @method Truck[]    findAll()
 * @method Truck[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TruckRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Truck::class);
    }

    // /**
    //  * @return Truck[] Returns an array of Truck objects
    //  */

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /*

        public function findOneBySomeField($value): ?Truck
        {
            return $this->createQueryBuilder('t')
                ->andWhere('t.exampleField = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }
    */

    public function findOneByLicenseNumber($value): ?Truck
    {
        try {
            $res = $this->createQueryBuilder('t')
                ->andWhere('t.licensenumber = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }

        return $res;
    }

    /**
     * @return mixed
     * @throws NonUniqueResultException
     */
    public function getTruckCount()
    {
        $res = $this->createQueryBuilder('t')
            ->select('count(t.id)')
            ->getQuery()
            ->useQueryCache(true)
            ->useResultCache(true, 3600)
            ->getSingleScalarResult();

        return $res;
    }

    public function findAllMatching(string $query, int $limit = 10)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.licensenumber LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findAllLicenseNumber()
    {
        return $this->createQueryBuilder('u')
            ->select('u.licensenumber')
            ->setMaxResults('50')
            ->getQuery()
            ->getResult()
            ;
    }
}
