<?php

namespace App\Repository;

use App\Entity\Trailer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method Trailer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trailer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trailer[]    findAll()
 * @method Trailer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrailerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trailer::class);
    }

    public function findOneByLicenseNumber($value): ?Trailer
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
    public function getTrailerCount()
    {
        $res= $this ->createQueryBuilder('t')
                ->select('COUNT(t.id)')
                ->getQuery()
                ->useQueryCache(true)
                ->useResultCache(true, 3600)
                ->getSingleScalarResult();
        return $res;
    }
}
