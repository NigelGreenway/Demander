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
    public $id;
    public $fullName;
    public $emailAddress;
    public $contactNumber;
}