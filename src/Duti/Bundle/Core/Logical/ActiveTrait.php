<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Logical;

use Doctrine\ORM\Mapping as ORM;

trait ActiveTrait
{
    /**
     * @var bool $active
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active = true;

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }
}
