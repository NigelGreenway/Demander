<?php
/**
 * Created by PhpStorm.
 * User: Nigel
 * Date: 24/02/2015
 * Time: 16:32
 */

namespace Demander\Tests\Fixtures;


class InMemoryEmployeeRepository
{
    private $data = [
        '1' => [
            'id'             => 1,
            'full_name'      => 'Joe Bloggs',
            'email_address'  => 'joe.bloggs@company.com',
            'contact_number' => '0121 892 233',
        ],
        '2' => [
            'id'             => 2,
            'full_name'      => 'Lisa Smith',
            'email_address'  => 'lisa.smith@company.com',
            'contact_number' => '0121 982 280',
        ],
    ];

    public function findByID($id)
    {
        $employee = $this->data[$id];

        return new EmployeeContactDetailsViewModel(
            $employee['id'],
            $employee['full_name'],
            $employee['email_address'],
            $employee['contact_number']
        );
    }
}