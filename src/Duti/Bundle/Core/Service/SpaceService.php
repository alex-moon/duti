<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Service;

use Doctrine\ORM\EntityManager;
use Duti\Bundle\Core\Manager\SpaceManager;

class SpaceService extends Service
{
    /**
     * @var SpaceManager $spaceManager
     */
    private $spaceManager;
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(
        EntityManager $entityManager,
        SpaceManager $spaceManager,
        ProjectService $projectService
    ) {
        parent::__construct($entityManager);
        $this->spaceManager = $spaceManager;
        $this->projectService = $projectService;
    }

    public function getCurrent()
    {
        return $this->spaceManager->getCurrent();
    }

    public function setCurrentProjectById($projectId)
    {
        $project = $this->projectService->get($projectId);
        $space = $this->getCurrent();
        $space->setCurrentProject($project);
        $this->flush();
    }
}
