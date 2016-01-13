<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <nigel_greenway@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demander\Tests;

use Demander\Tests\Fixtures\GetEmployeeByIDQuery;
use Demander\Tests\Fixtures\GetEmployeesByAgeGroupQuery;
use PHPUnit_Framework_TestCase;
use Demander\Mediator\InMemoryMediator;

class InMemoryMediatorTest extends PHPUnit_Framework_TestCase
{
    private static $mediator;

    public static function setUpBeforeClass()
    {
        static::$mediator = new InMemoryMediator([
            'Demander\Tests\Fixtures\GetEmployeeByIDQuery'         => 'Demander\Tests\Fixtures\GetEmployeeByIDQueryHandler',
            'Demander\Tests\Fixtures\GetEmployeeByDepartmentQuery' => 'Demander\Tests\Fixtures\GetEmployeeByDepartmentQueryHandler',
        ]);
    }

    public function test_mediator_returns_correct_view_model()
    {
        $this->assertInstanceOf(
            'Demander\Tests\Fixtures\EmployeeContactDetailsViewModel',
            static::$mediator->request(new GetEmployeeByIDQuery(1))
        );
    }

    /**
     * @expectedException \Demander\Exception\QueryNotFoundException
     */
    public function test_mediator_throws_an_exception_for_invalid_query()
    {
        static::$mediator->request(new GetEmployeesByAgeGroupQuery(10, 19));
    }
}
