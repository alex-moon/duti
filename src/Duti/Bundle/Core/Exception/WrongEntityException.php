<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Exception;

class WrongEntityException extends FactoryException
{
    public static function forExpected($expected)
    {
        return new self(sprintf(
            'Wrong entity class - expected %s',
            $expected
        ));
    }
}
