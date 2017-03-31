<?php

namespace Duti\Bundle\Core\Controller;

use Duti\Bundle\Core\Repository\ProjectRepository;
use Duti\Bundle\Core\Repository\SpaceRepository;
use Duti\Bundle\Core\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BaseController extends Controller
{
    /** @var SpaceRepository $spaceRepo */
    protected $spaceRepo;

    /** @var ProjectRepository $projectRepo */
    protected $projectRepo;

    /** @var TaskRepository $taskRepo */
    protected $taskRepo;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->initialize();
    }

    protected function initialize()
    {
        $this->spaceRepo = $this->get('repository.space');
        $this->projectRepo = $this->get('repository.project');
        $this->taskRepo = $this->get('repository.task');
    }
}
