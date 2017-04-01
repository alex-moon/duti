<?php

namespace Duti\Bundle\Core\Controller;

use Duti\Bundle\Core\Service\ProjectService;
use Duti\Bundle\Core\Service\SpaceService;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BaseController extends Controller
{
    /** @var SpaceService $spaceService */
    protected $spaceService;

    /** @var ProjectService $projectService */
    protected $projectService;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->initialize();
    }

    protected function initialize()
    {
        $this->spaceService = $this->get('core.service.space');
        $this->projectService = $this->get('core.service.project');
    }
}
