<?php

namespace AppBundle\Query;


use AppBundle\Dto\ContributorDto;
use AppBundle\Entity\Search;
use Github\Client;
use Github\Exception\RuntimeException;

class GetContributorsQuery
{

    /**
     * @var Client
     */
    private $githubClient;

    /**
     * GetContributorsQuery constructor.
     * @param Client $githubClient
     */
    public function __construct(Client $githubClient)
    {
        $this->githubClient = $githubClient;
    }


    /**
     * @param Search $search
     * @return array
     * @throws RuntimeException
     */
    public function getContributors(Search $search): array
    {
        $result = [];

        $repo = $search->getRepositoryName();

        list ($namespace, $project) = explode('/', $repo);

        $data = $this->githubClient->repo()->contributors($namespace, $project);
        foreach ($data as $datum) {
            $result[] = new ContributorDto($datum['login'], $datum['avatar_url'], $datum['contributions']);
        }
        return $result;

    }
}