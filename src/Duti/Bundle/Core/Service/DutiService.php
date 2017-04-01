<?php

namespace Duti\Bundle\Core\Service;

use Duti\Bundle\Core\Manager\BreakLogManager;
use Duti\Bundle\Core\Manager\ProjectManager;
use Duti\Bundle\Core\Manager\SpaceManager;
use Duti\Bundle\Core\Manager\TaskLogManager;
use Duti\Bundle\Core\Manager\TaskManager;

class DutiService
{
    /**
     * @var SpaceManager
     */
    private $spaceManager;
    /**
     * @var ProjectManager
     */
    private $projectManager;
    /**
     * @var TaskManager
     */
    private $taskManager;
    /**
     * @var TaskLogManager
     */
    private $taskLogManager;
    /**
     * @var BreakLogManager
     */
    private $breakLogManager;

    public function __construct(
        SpaceManager $spaceManager,
        ProjectManager $projectManager,
        TaskManager $taskManager,
        TaskLogManager $taskLogManager,
        BreakLogManager $breakLogManager
    )
    {
        $this->spaceManager = $spaceManager;
        $this->projectManager = $projectManager;
        $this->taskManager = $taskManager;
        $this->taskLogManager = $taskLogManager;
        $this->breakLogManager = $breakLogManager;
    }
}
