<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;
use Duti\Bundle\Core\Logical\StartedEndedTrait;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\TaskRepository")
 * @ORM\Table(name="task")
 * @ORM\HasLifecycleCallbacks()
 */
class Task extends NameEntity
{
    use StartedEndedTrait;

    /**
     * @var Ticket $ticket
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\Ticket")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id", nullable=true)
     */
    protected $ticket;

    /**
     * @var Project $project
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @return Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param Ticket $ticket
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return bool
     */
    public function isFinished()
    {
        return $this->ended !== null;
    }

    /**
     * @return string
     */
    public function timeSoFar()
    {
        // @todo replace stub lol
        return $this->created->format('g:i:s');
    }
}
