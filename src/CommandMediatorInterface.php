<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <github@futurepixels.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demander;

/**
 * Interface for the command mediator
 *
 * @author  Nigel Greenway <github@futurepixels.co.uk>
 */
interface CommandMediatorInterface
{
    /**
     * Execute a command
     *
     * @param CommandInterface $command
     *
     * @return void
     */
    public function execute(CommandInterface $command);
}
