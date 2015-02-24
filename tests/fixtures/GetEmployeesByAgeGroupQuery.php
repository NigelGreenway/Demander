<?php

namespace Demander\Tests\Fixtures;

use Demander\QueryInterface;


class GetEmployeesByAgeGroupQuery implements QueryInterface
{
    public $start;
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }
}