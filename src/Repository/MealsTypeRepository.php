<?php

namespace App\Repository;

use App\Entity\MealsType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MealsType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MealsType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MealsType[]    findAll()
 * @method MealsType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MealsTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MealsType::class);
    }

    // /**
    //  * @return MealsType[] Returns an array of MealsType objects
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
    public function findOneBySomeField($value): ?MealsType
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
