<?php
/**
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class SearchRepository extends EntityRepository
{

    /**
     * @return QueryBuilder
     */
    public function getQb(): QueryBuilder
    {
        $qb = $this->createQueryBuilder('e');
        $qb->addOrderBy('e.id', 'DESC');
        return $qb;
    }
}