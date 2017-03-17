<?php

namespace Duti\Bundle\Core\Controller;

use Symfony\Component\Routing\Annotation\Route;

class DutiController extends BaseController
{
    /**
     * @Route(
     *     name="core-duti-index",
     *     path="/"
     * )
     */
    public function indexAction()
    {
        $projects = $this->get('repository.project')->findAll();

        return $this->render('CoreBundle:Duti:index.html.twig', [
            'currentProject' => $projects[0],
            'projects' => $projects,
        ]);
    }
}
