<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Manager;

class BreakLogManager extends Manager
{
    /**
     * @param \DateTime $now
     */
    public function endBreak($now)
    {
        $break = $this->repository->findOneBy([
            'ended' => null
        ]);
        if ($break === null) {
            return;
        }
        $break->setEnded($now);
    }
}
