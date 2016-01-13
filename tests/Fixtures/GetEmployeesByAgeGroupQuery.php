<?php

namespace Demander\Tests\Fixtures;

use Demander\QueryInterface;


class GetEmployeesByAgeGroupQuery implements QueryInterface
{
    private $start;
    private $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    public function start()
    {
        return $this->start;
    }

    public function end()
    {
        return $this->end;
    }
}