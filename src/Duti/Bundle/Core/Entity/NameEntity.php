<?php

namespace Duti\Bundle\Core\Entity;

use Duti\Bundle\Core\Logical\NameTrait;

abstract class NameEntity extends Entity
{
    use NameTrait;

    public function __toString()
    {
        return $this->name;
    }
}
