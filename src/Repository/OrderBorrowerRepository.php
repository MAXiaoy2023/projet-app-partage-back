<?php

namespace App\Repository;

use App\Entity\OrderBorrower;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrderBorrower>
 *
 * @method OrderBorrower|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderBorrower|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderBorrower[]    findAll()
 * @method OrderBorrower[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderBorrowerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderBorrower::class);
    }

//    /**
//     * @return OrderBorrower[] Returns an array of OrderBorrower objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrderBorrower
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
