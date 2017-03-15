<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Entity;
/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\TicketRepository")
 * @ORM\Table(name="ticket")
 */
class Ticket extends Entity
{
    /**
     * @ORM\Column(name="url", type="string")
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
