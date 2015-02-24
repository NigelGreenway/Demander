<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <nigel_greenway@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demander\ViewModel;

use Demander\Exception\ClassParameterNameDoesNotExistException;
use JsonSerializable;
use ReflectionClass;


/**
 * Abstract class for ViewModel Model
 *
 * @package Demander
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
abstract class AbstractViewModel implements JsonSerializable
{

    /**
     * ViewModel Constructor
     *
     * @param array $viewData The data to be binded to the ViewModel
     */
    public function __construct(
        array $viewData = []
    ) {
        foreach ($viewData as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            } else {
                throw new ClassParameterNameDoesNotExistException(
                    $key,
                    get_class($this)
                );
            }
        }
    }

    /**
     * Serialize object
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the ViewModel object to an array
     *
     * @return array
     */
    private function toArray()
    {
        $data = [];

        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $data[$property->getName()] = $property->getValue($this);
        }

        return $data;
    }
}