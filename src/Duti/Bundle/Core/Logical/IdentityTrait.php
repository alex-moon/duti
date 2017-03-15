<?php

namespace Duti\Bundle\Core\Logical;

use Doctrine\ORM\Mapping as ORM;

trait IdentityTrait
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer")
     */
    protected $id;

    /**
     * Get the identifier.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
