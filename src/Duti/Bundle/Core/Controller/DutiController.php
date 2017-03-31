<?php

namespace Duti\Bundle\Core\Controller;

use Duti\Bundle\Core\Entity\Project;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DutiController extends BaseController
{
    /**
     * @Route(
     *     name="core-duti-index",
     *     path="/"
     * )
     */
    public function indexAction(Request $request)
    {
        $space = $this->spaceRepo->getCurrent();
        $action = $request->request->get('action');
        switch ($action) {
            case 'setCurrentProject':
                /** @var Project $currentProject */
                $currentProject = $this->projectRepo->find(
                    $request->request->get('currentProject')
                );
                $space->setCurrentProject($currentProject);
                $this->spaceRepo->save($space);
        }

        return $this->render('CoreBundle:Duti:index.html.twig', [
            'space' => $space
        ]);
    }
}
