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