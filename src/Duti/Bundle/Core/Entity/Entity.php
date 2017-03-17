<?php

namespace Duti\Bundle\Core\Entity;

use Duti\Bundle\Core\Logical\CreatedUpdatedTrait;
use Duti\Bundle\Core\Logical\IdentityTrait;
use Duti\Bundle\Core\Logical\ActiveTrait;

abstract class Entity
{
    use IdentityTrait;
    use CreatedUpdatedTrait;
    use ActiveTrait;
}
