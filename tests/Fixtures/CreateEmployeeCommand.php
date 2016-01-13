<?php
namespace Demander\Tests\Fixtures;

use Demander\CommandInterface;

final class CreateEmployeeCommand implements CommandInterface
{
    private $id,
            $emailAddress,
            $active;

    public function __construct($id, $emailAddress, $active)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->active = $active;
    }

    public function id()
    { return $this->id; }

    public function emailAddress()
    { return $this->emailAddress; }

    public function active()
    { return $this->active; }
}