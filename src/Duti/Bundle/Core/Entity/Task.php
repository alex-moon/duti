<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\TaskRepository")
 * @ORM\Table(name="task")
 */
class Task extends NameEntity
{
    /**
     * @var Ticket
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\Ticket")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id", nullable=true)
     */
    protected $ticket;

    /**
     * @var Project
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
}
