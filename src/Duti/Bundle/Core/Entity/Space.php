<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\SpaceRepository")
 * @ORM\Table(name="space")
 * @ORM\HasLifecycleCallbacks
 */
class Space extends NameEntity
{
    /**
     * @todo replace this with a foreign key on user/session/whatever
     *
     * @var bool $isCurrent
     * @ORM\Column(name="is_current", type="boolean")
     * */
    protected $isCurrent;

    /**
     * @var Project $currentProject
     * @ORM\OneToOne(targetEntity="Project")
     * @ORM\JoinColumn(name="current_project_id", referencedColumnName="id")
     */
    protected $currentProject;

    /**
     * @var Project[]|Collection $projects
     * @ORM\OneToMany(targetEntity="Project", mappedBy="space")
     */
    protected $projects;

    public function __construct($name)
    {
        // btw fuck this horseshit - this is precisely why
        // PHP needs a common core collections library
        parent::__construct($name);
        $this->projects = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function getIsCurrent()
    {
        return $this->isCurrent;
    }

    /**
     * @param bool $isCurrent
     */
    public function setIsCurrent($isCurrent)
    {
        $this->isCurrent = $isCurrent;
    }

    /**
     * @return Project
     *
     * @throws \Exception
     */
    public function getCurrentProject()
    {
        if (empty($this->projects)) {
            throw new \Exception(sprintf(
                'Cannot get current project for %s because it has no projects',
                $this
            ));
        }
        if (is_null($this->currentProject)) {
            $this->currentProject = $this->projects[0];
        }

        return $this->currentProject;
    }

    /**
     * @param Project $currentProject
     *
     * @throws \Exception
     */
    public function setCurrentProject($currentProject)
    {
        if (!$this->projects->contains($currentProject)) {
            throw new \Exception(sprintf(
                'Project %s not in space %s cannot be current project',
                $currentProject,
                $this
            ));
        }
        $this->currentProject = $currentProject;
    }

    /**
     * @return Project[]
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param Project[] $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }
}
