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

        return new EmployeeContactDetailsViewModel([
            'id'            => $employee['id'],
            'fullName'      => $employee['full_name'],
            'emailAddress'  => $employee['email_address'],
            'contactNumber' => $employee['contact_number'],
        ]);
    }
}