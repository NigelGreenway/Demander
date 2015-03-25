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


class GetEmployeeByIDQuery implements QueryInterface
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}