<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Logical;

trait TimeTrait
{
    /**
     * Shamelessly ripped from
     * @see http://stackoverflow.com/questions/3856293/how-to-convert-seconds-to-time-format
     * @param int $time - time in seconds
     * @return string
     */
    protected function getTimeString($time)
    {
        $seconds = $time % 60;
        $time = ($time - $seconds) / 60;
        $minutes = $time % 60;
        $hours = ($time - $minutes) / 60;
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
