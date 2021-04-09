<?php

namespace App\Repository;

use App\Entity\ArticleTwig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleTwig|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleTwig|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleTwig[]    findAll()
 * @method ArticleTwig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleTwigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleTwig::class);
    }

    // /**
    //  * @return ArticleTwig[] Returns an array of ArticleTwig objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleTwig
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findLast($count) {
        return $this->createQueryBuilder('article')
            ->orderBy('article.createdAt','desc')
            ->setMaxResults($count)
            ->getQuery()
            ->getResult()
            ;
    }

}
