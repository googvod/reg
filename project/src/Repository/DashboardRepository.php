<?php

namespace App\Repository;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DashboardRepository
 * @package App\Repository
 */
class DashboardRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $filter
     *
     * @return array
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getYearRangeData(array $filter): array
    {
        $query = 'SELECT COUNT(e.id) as count, year(e.d_reg) as year 
          FROM events e
          WHERE e.oper_code IN (20,30, 99, 100)
          %s
          GROUP BY YEAR(e.d_reg)';

        $params = '';

        if ($filter['type']) {
            $params .= sprintf(' AND e.kind = \'%s\'', $filter['type']);
        }

        if ($filter['brand']) {
            $params .= sprintf(' AND e.brand = \'%s\'', $filter['brand']);
        }

        if ($filter['model']) {
            $params .= sprintf(' AND e.model = \'%s\'', $filter['model']);
        }

        return $this->entityManager->getConnection()->executeQuery(sprintf($query, $params))->fetchAll();
    }
}