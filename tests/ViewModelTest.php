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
use PHPUnit_Framework_TestCase;

class ViewModelTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Demander\ViewModel\AbstractViewModel::__construct
     */
    public function test_view_model_maps_correctly()
    {
        $viewModel = new EmployeeContactDetailsViewModel(
            1,
            'Mona Lisa',
            'lisa@moaners.com',
            '01234 213 232'
        );

        $this->assertInstanceOf(
            'Demander\Tests\Fixtures\EmployeeContactDetailsViewModel',
            $viewModel
        );
    }

    /**
     * @covers Demander\ViewModel\AbstractViewModel::toArray
     * @covers Demander\ViewModel\AbstractViewModel::jsonSerialize
     */
    public function test_view_model_converts_to_json_string()
    {
        $viewModel = new EmployeeContactDetailsViewModel(
            1,
            'Mona Lisa',
            'lisa@moaners.com',
            '01234 213 232'
        );

        $this->assertJson($viewModel->jsonSerialize());
    }
}
