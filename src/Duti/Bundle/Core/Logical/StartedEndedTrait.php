<?php

namespace Duti\Bundle\Core\Logical;

use Doctrine\ORM\Mapping as ORM;

trait StartedEndedTrait
{
    /**
     * @ORM\Column(name="started", type="datetime", nullable=true)
     *
     * @var \DateTime $started
     */
    protected $started;

    /**
     * @ORM\Column(name="ended", type="datetime", nullable=true)
     *
     * @var \DateTime $ended
     */
    protected $ended;

    /**
     * @return \DateTime
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * @param \DateTime $started
     */
    public function setStarted($started)
    {
        $this->started = $started;
    }

    /**
     * @return \DateTime
     */
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * @param \DateTime $ended
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;
    }
}
