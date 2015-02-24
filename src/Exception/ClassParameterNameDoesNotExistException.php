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

use UnexpectedValueException;

/**
 * Exception to warn that the given key for the given class
 * parameter does not exist.
 *
 * @package Demander
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
final class ClassParameterNameDoesNotExistException extends UnexpectedValueException
{
    /**
     * Class Constructor
     *
     * @param string $unknownKey    Unknown Class parameter
     * @param string $viewModelName Name of the ViewModel class
     */
    public function __construct($unknownKey, $viewModelName)
    {
        return parent::__construct(
            sprintf(
                'The array key [%s] passed does not exist in [%s]',
                $unknownKey,
                $viewModelName
            )
        );
    }
}
