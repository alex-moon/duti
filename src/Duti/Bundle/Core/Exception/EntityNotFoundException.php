<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Exception;

class EntityNotFoundException extends ManagerException
{
    public static function forClassAndId($class, $id)
    {
        return new self(sprintf(
            'Invalid ID [%s] provided for %s',
            $id,
            $class
        ));
    }
}
