<?php

namespace Duti\Bundle\Core\Controller;

use Duti\Bundle\Core\Manager\BreakLogManager;
use Duti\Bundle\Core\Repository\ProjectRepository;
use Duti\Bundle\Core\Repository\SpaceRepository;
use Duti\Bundle\Core\Repository\TaskRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\ORM\EntityManager;

class BaseController extends Controller
{
    /** @var SpaceRepository $spaceRepo */
    protected $spaceRepo;

    /** @var ProjectRepository $projectRepo */
    protected $projectRepo;

    /** @var TaskRepository $taskRepo */
    protected $taskRepo;

    /** @var BreakLogManager $breakLogManager */
    protected $breakLogManager;

    /** @var EntityManager $entityManager */
    protected $entityManager;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->initialize();
    }

    protected function initialize()
    {
        $this->entityManager = $this->get('doctrine.orm.entity_manager');

        // @todo replace the other repos with managers lol
        // @todo replace managers with services lol
        $this->spaceRepo = $this->get('core.repository.space');
        $this->projectRepo = $this->get('core.repository.project');
        $this->taskRepo = $this->get('core.repository.task');
        $this->breakLogManager = $this->get('core.manager.break_log');
    }

    protected function flush()
    {
        $this->entityManager->flush();
    }
}
