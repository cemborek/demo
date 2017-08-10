<?php
/**
 */

namespace AppBundle\Dto;


class ContributorDto
{

    /** @var  string */
    private $name;

    /** @var  string */
    private $avatar;

    /** @var  int */
    private $contributions;

    /**
     * ContributorDto constructor.
     * @param string $name
     * @param string $avatar
     * @param int $contributions
     */
    public function __construct($name, $avatar, $contributions)
    {
        $this->name = $name;
        $this->avatar = $avatar;
        $this->contributions = $contributions;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @return int
     */
    public function getContributions(): int
    {
        return $this->contributions;
    }


}