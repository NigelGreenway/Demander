<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <nigel_greenway@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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