<?php

namespace AppBundle\Query;


use AppBundle\Entity\Search;

interface GetContributorsInterface
{

    /**
     * @param Search $search
     * @return array
     */
    public function getContributors(Search $search): array;
}