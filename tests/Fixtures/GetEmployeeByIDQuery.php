<?php

namespace Demander\Tests\Fixtures;

use Demander\QueryInterface;


class GetEmployeeByIDQuery implements QueryInterface
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function id()
    {
        return $this->id;
    }
}