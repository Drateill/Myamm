<?php

namespace App\Repository;

use App\Entity\Comms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comms[]    findAll()
 * @method Comms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comms::class);
    }

    // /**
    //  * @return Comms[] Returns an array of Comms objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Comms
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
