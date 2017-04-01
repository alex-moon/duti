<?php

namespace Duti\Bundle\Core\Controller;

use Duti\Bundle\Core\Entity\BreakLog;
use Duti\Bundle\Core\Entity\Project;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DutiController extends BaseController
{
    /**
     * @Route(
     *     name="core-duti-index",
     *     path="/"
     * )
     * @param Request $request
     * @return Response
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

    /**
     * @Route(
     *     name="core-duti-clock",
     *     path="/clock/{taskId}/"
     * )
     * @param Request $request
     * @param int $taskId
     * @return Response
     * @throws \Exception
     */
    public function clockAction(Request $request, $taskId)
    {
        $space = $this->spaceRepo->getCurrent();
        $project = $space->getCurrentProject();
        $currentTask = $project->getCurrentTask();

        $task = $this->taskRepo->find($taskId);
        if ($task === null) {
            throw new \Exception(sprintf(
                'No task with id [%s]',
                $taskId
            ));
        }

        $now = new \DateTime();
        if ($task->isInProgress()) {
            $task->setEnded($now);
            $this->breakLogManager->create();
        } else {
            // @todo this isn't working because we need to be dealing with
            // task logs, not tasks - this should all really be in a service
            // or a manager - we need to call "setStarted" on a number of things
            $task->setStarted($now);
            if ($currentTask === null) {
                $this->breakLogManager->endBreak($now);
            } else {
                $currentTask->setEnded($now);
            }
        }

        $this->flush();
        return $this->redirectToRoute('core-duti-index');
    }
}
