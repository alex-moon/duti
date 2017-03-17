<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\TicketRepository")
 * @ORM\Table(name="ticket")
 * @ORM\HasLifecycleCallbacks()
 */
class Ticket extends Entity
{
    /**
     * @ORM\Column(name="url", type="string")
     *
     * @var string $url
     */
    protected $url;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
