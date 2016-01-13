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

use Demander\Tests\Fixtures\EmployeeContactDetailsViewModel;
use Demander\Tests\Fixtures\EmployeesViewModelCollection;
use Demander\ViewModel\ViewModelCollection;
use PHPUnit_Framework_TestCase;

class ViewModelCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $employees;

    /**
     * @var ViewModelCollection
     */
    private $collection;

    public function setUp()
    {
        $this->employees = [
            new EmployeeContactDetailsViewModel(
                1,
                'Peter Griffen',
                'peter@thegriffens.com',
                '01234 213 232'
            ),
            new EmployeeContactDetailsViewModel(
                2,
                'Lewis Griffen',
                'lweis@thegriffens.com',
                '01234 213 232'
            ),
            new EmployeeContactDetailsViewModel(
                5,
                'Meg Griffen',
                'meg@thegriffens.com',
                '01234 213 232'
            ),
        ];

        $this->collection = new EmployeesViewModelCollection([]);
    }

    /**
     * @covers Demander\ViewModel\ViewModelCollection::add
     * @covers Demander\ViewModel\ViewModelCollection::count
     */
    public function test_view_model_adds_correctly()
    {
        $this->collection->add($this->employees[0]);
        $this->collection->add($this->employees[1]);

        $this->assertEquals(
            2,
            $this->collection->count()
        );
    }

    /**
     * @covers Demander\ViewModel\ViewModelCollection::remove
     */
    public function test_ViewModelCollection_removes_specified_key()
    {
        $this->collection->add($this->employees[0]);
        $this->collection->add($this->employees[1]);
        $this->collection->add($this->employees[2]);

        $removedElement = $this->collection->remove(1);

        $this->assertEquals(2, $this->collection->count());
        $this->assertEquals($this->employees[1], $removedElement);
    }

    /**
     * @covers Demander\ViewModel\ViewModelCollection::removeElement
     */
    public function test_ViewModelCollection_removes_specified_element()
    {
        $this->collection->add($this->employees[0]);
        $this->collection->add($this->employees[1]);
        $this->collection->add($this->employees[2]);

        $this->collection->removeElement($this->employees[1]);

        $this->assertEquals(2, $this->collection->count());
    }

    /**
     * @covers Demander\ViewModel\ViewModelCollection::jsonSerialize
     * @covers Demander\ViewModel\ViewModelCollection::toArray
     */
    public function test_view_model_collection_converts_to_json_encoded_string()
    {
        $this->collection->add($this->employees[0]);
        $this->collection->add($this->employees[1]);

        $this->assertJson($this->collection->jsonSerialize());
    }
}
