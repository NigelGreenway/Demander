<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <nigel_greenway@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demander\Exception;

use Exception;

/**
 * Exception to warn that the given key for the given class
 * parameter does not exist.
 *
 * @package Demander\Exception
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
final class QueryNotFoundException extends Exception
{
    /**
     * Class Constructor
     *
     * @param string $unknownQuery
     */
    public function __construct($unknownQuery)
    {
        return parent::__construct(
            sprintf(
                'Sorry, but it the Query [%s] does not exist in your mapping config.',
                $unknownQuery
            )
        );
    }
}
