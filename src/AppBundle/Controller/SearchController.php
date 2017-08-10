<?php

namespace AppBundle\Controller;

use AppBundle\Command\LogSearchCommand;
use AppBundle\Form\Type\FindType;
use Github\Exception\RuntimeException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    /**
     * @Route("/", name="search")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(FindType::class);

        $form->handleRequest($request);
        $contributors = [];

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $searchEntity = $form->getData();
            $query = $this->get('app.query.get_contributors_query');
            try {
                $contributors = $query->getContributors($searchEntity);
                $paginator  = $this->get('knp_paginator');
                $pagination = $paginator->paginate(
                    $contributors,
                    $request->query->getInt('page', 1)/*page number*/,
                    10/*limit per page*/
                );


            } catch (RuntimeException $e) {
                $form->addError(new FormError('Repository not found'));
            }

            $command = new LogSearchCommand($searchEntity);
            $this->get('command_bus')->handle($command);

        }


        // replace this example code with whatever you need
        return $this->render('default/search.html.twig', [
            'pagination' => $pagination ?? null,
            'error' => $contributors,
            'form' => $form->createView(),
        ]);
    }
}
