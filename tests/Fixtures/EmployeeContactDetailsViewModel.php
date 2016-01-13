<?php
/**
 * Created by PhpStorm.
 * User: Nigel
 * Date: 24/02/2015
 * Time: 16:34
 */

namespace Demander\Tests\Fixtures;

use Demander\ViewModel\AbstractViewModel;


class EmployeeContactDetailsViewModel extends AbstractViewModel
{
    private $id;
    private $fullName;
    private $emailAddress;
    private $contactNumber;

    public function __construct(
        $id,
        $fullName,
        $emailAddress,
        $contactNumber
    ) {
        $this->id            = $id;
        $this->fullName      = $fullName;
        $this->emailAddress  = $emailAddress;
        $this->contactNumber = $contactNumber;
    }
}