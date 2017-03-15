<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core;

use Symfony\Component\Console\Output\OutputInterface;

trait OutputAwareTrait
{
    /**
     * @var OutputInterface $output
     */
    protected $output;

    /**
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * @param string $line
     */
    protected function writeln($line)
    {
        if ($this->output !== null) {
            $this->output->writeln($line);
        } else {
            echo $line . "\n";
        }
    }
}
