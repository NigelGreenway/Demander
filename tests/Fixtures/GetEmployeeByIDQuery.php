<?php

namespace Demander\Tests\Fixtures;

use Demander\QueryInterface;


class GetEmployeeByIDQuery implements QueryInterface
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}