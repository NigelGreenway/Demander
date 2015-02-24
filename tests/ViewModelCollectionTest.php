<?php

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
            [
                0 => new EmployeeContactDetailsViewModel([
                    'id'            => 1,
                    'fullName'      => 'Peter Griffen',
                    'emailAddress'  => 'peter@thegriffens.com',
                    'contactNumber' => '01234 213 232',
                ])
            ],
            [
                1 => new EmployeeContactDetailsViewModel([
                    'id'            => 2,
                    'fullName'      => 'Lewis Griffen',
                    'emailAddress'  => 'lweis@thegriffens.com',
                    'contactNumber' => '01234 213 232',
                ])
            ]
        ];

        $this->collection = new EmployeesViewModelCollection(
            [],
            0,
            0,
            count($this->employees)
        );
    }

    public function test_view_model_adds_correctly()
    {
        $this->collection->add($this->employees[0]);
        $this->collection->add($this->employees[1]);

        $this->assertEquals(
            2,
            $this->collection->count()
        );
    }

    public function test_view_model_collection_converts_to_array()
    {
        $this->assertEquals(
            'array',
            gettype($this->collection->jsonSerialize())
        );
    }
}
