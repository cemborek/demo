<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HistoryController extends Controller
{
    /**
     * @Route("/history", name="history")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {

        $repository = $this->get('app.repository.search');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $repository->getQb(),
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // replace this example code with whatever you need
        return $this->render('default/history.html.twig', [
            'pagination' => $pagination ?? null,
        ]);
    }
}
