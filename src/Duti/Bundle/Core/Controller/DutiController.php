<?php

namespace Duti\Bundle\Core\Controller;

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
     *
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        switch ($request->request->get('action')) {
            case 'setCurrentProject':
                $this->spaceService->setCurrentProjectById(
                    $request->request->get('currentProject')
                );
        }

        return $this->render('CoreBundle:Duti:index.html.twig', [
            'space' => $this->spaceService->getCurrent(),
        ]);
    }

    /**
     * @Route(
     *     name="core-duti-clock",
     *     path="/clock/{taskId}/"
     * )
     *
     * @param Request $request
     * @param int $taskId
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function clockAction(Request $request, $taskId)
    {
        // @todo extract this all out to a service - probably the SpaceService,
        // right? A single point of entry would be agreeable... sleep on it
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

        return $this->redirectToRoute('core-duti-index');
    }
}
