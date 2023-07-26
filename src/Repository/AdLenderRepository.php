<?php

namespace App\Repository;

use App\Entity\AdLender;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdLender>
 *
 * @method AdLender|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdLender|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdLender[]    findAll()
 * @method AdLender[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdLenderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdLender::class);
    }

//    /**
//     * @return AdLender[] Returns an array of AdLender objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdLender
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
