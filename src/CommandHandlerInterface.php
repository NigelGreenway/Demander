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
 * Handler for the Command data
 *
 * @author Nigel Greenway <github@futurepixels.co.uk>
 */
interface CommandHandlerInterface
{
    /**
     * Executes the command with the passed data
     *
     * @param CommandInterface $command
     *
     * @return void
     */
    public function execute(CommandInterface $command);
}
