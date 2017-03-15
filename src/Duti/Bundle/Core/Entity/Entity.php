<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Entity;

use Duti\Bundle\Core\Logical\CreatedUpdatedTrait;
use Duti\Bundle\Core\Logical\IdentityTrait;

abstract class Entity
{
    use IdentityTrait;
    use CreatedUpdatedTrait;
}
