<?php
/**
 */

namespace AppBundle\Command;


use Doctrine\ORM\EntityManager;

class LogSearchCommandHandler
{

    /** @var  EntityManager */
    private $em;

    /**
     * LogSearchCommandHandler constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function handle(LogSearchCommand $command)
    {
        $em = $this->em;
        $em->persist($command->getSearch());
        $em->flush();
    }
}