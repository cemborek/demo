<?php
/**
 */

namespace AppBundle\Command;


use AppBundle\Entity\Search;

class LogSearchCommand
{

    /** @var  Search */
    private $search;

    /**
     * LogSearchCommand constructor.
     * @param Search $search
     */
    public function __construct(Search $search)
    {
        $this->search = $search;
    }

    /**
     * @return Search
     */
    public function getSearch(): Search
    {
        return $this->search;
    }

}