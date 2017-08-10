<?php

namespace AppBundle\Entity;

use Gedmo\Timestampable\Traits\Timestampable;

class Search
{
    use Timestampable;

    /** @var  int */
    private $id;

    /** @var  string */
    private $repositoryName;

    /**
     * @var string
     */
    private $order;

    /**
     * @return string
     */
    public function getRepositoryName(): ?string
    {
        return $this->repositoryName;
    }

    /**
     * @param string $repositoryName
     */
    public function setRepositoryName(string $repositoryName)
    {
        $this->repositoryName = $repositoryName;
    }

    /**
     * @return string
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    public function setOrder(string $order)
    {
        $this->order = $order;
    }


}