<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * @param string $term
     *
     * @return Event[]
     */
    public function search(string $term)
    {
        return $this->createQueryBuilder('e')
            ->select('e.id', 'e.reg')
            ->andWhere('e.reg LIKE :term')
            ->setParameter('term', '%'.$term.'%')
            ->groupBy('e.reg')
            ->orderBy('e.reg', 'DESC')
            ->setMaxResults(15)
            ->getQuery()
            ->execute();
    }

    /**
     * @param string $reg
     *
     * @return Event[]
     */
    public function findByReg(string $reg)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.reg = :term')
            ->setParameter('term', $reg)
            ->orderBy('e.dateReg', 'DESC')
            ->setMaxResults(100)
            ->getQuery()
            ->execute();
    }

    public function getAllTypes()
    {
        return $this->createQueryBuilder('e')
            ->select('e.kind', 'count(e.kind) as count')
            ->groupBy('e.kind')
            ->orderBy('e.kind', 'ASC')
            ->where('e.operationId IN (:operations)')
            ->setParameter('operations', [20,30, 99, 100])
            ->getQuery()
            ->execute();
    }

    /**
     * @param string|null $kind
     *
     * @return array
     */
    public function getAllBrands(string $kind = null): array
    {
        $builder = $this->createQueryBuilder('e')
            ->select('e.brand', 'count(e.id) as count')
            ->groupBy('e.brand')
            ->orderBy('e.brand', 'ASC');

        if ($kind) {
            $builder->where('e.kind =:kind')->setParameter('kind', $kind);
        }

        return $builder->getQuery()->execute();
    }

    /**
     * @param string $brand
     *
     * @return array
     */
    public function getAllModels(string $type, string $brand): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.model', 'count(e.model) as count')
            ->where('e.brand = :brand')
            ->setParameter('brand', $brand)
            ->andWhere('e.kind = :kind')
            ->setParameter('kind', $type)
            ->groupBy('e.model')
            ->orderBy('e.model', 'ASC')
            ->getQuery()
            ->execute();
    }
}
