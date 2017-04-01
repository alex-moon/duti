<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Service;

use Doctrine\ORM\EntityManager;
use Duti\Bundle\Core\Manager\BreakLogManager;
use Duti\Bundle\Core\Manager\ProjectManager;
use Duti\Bundle\Core\Manager\TaskManager;
use Duti\Bundle\Core\Manager\TaskLogManager;

class ProjectService extends Service
{
    /**
     * @var ProjectManager $projectManager
     */
    protected $projectManager;

    /**
     * @var TaskManager $taskManager
     */
    protected $taskManager;

    /**
     * @var TaskLogManager $taskLogManager
     */
    protected $taskLogManager;

    /**
     * @var BreakLogManager $breakLogManager
     */
    protected $breakLogManager;

    public function __construct(
        EntityManager $entityManager,
        ProjectManager $projectManager,
        TaskManager $taskManager,
        TaskLogManager $taskLogManager,
        BreakLogManager $breakLogManager
    ) {
        parent::__construct($entityManager);
        $this->projectManager = $projectManager;
        $this->taskManager = $taskManager;
        $this->taskLogManager = $taskLogManager;
        $this->breakLogManager = $breakLogManager;
    }

    public function get($projectId)
    {
        return $this->projectManager->findOrThrow($projectId);
    }
}
