<?php
namespace Demander\Tests\Fixtures;

use Demander\CommandHandlerInterface;
use Demander\CommandInterface;

final class CreateEmployeeCommandHandler implements CommandHandlerInterface
{
    public function execute(CommandInterface $command)
    {
        return 'done'; // A command should not return anything
    }

}