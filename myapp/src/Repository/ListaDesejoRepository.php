<?php

namespace App\Repository;

use App\Entity\ListaDesejo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListaDesejo>
 *
 * @method ListaDesejo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListaDesejo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListaDesejo[]    findAll()
 * @method ListaDesejo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListaDesejoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListaDesejo::class);
    }

    public function add(ListaDesejo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListaDesejo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ListaDesejo[] Returns an array of ListaDesejo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListaDesejo
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
