<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\ProjectRepository")
 * @ORM\Table(name="project")
 */
class Project extends NameEntity
{
    /**
     * @var Space
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\Space")
     * @ORM\JoinColumn(name="space_id", referencedColumnName="id")
     */
    protected $space;

    /**
     * @return Space
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * @param Space $space
     */
    public function setSpace($space)
    {
        $this->space = $space;
    }
}
