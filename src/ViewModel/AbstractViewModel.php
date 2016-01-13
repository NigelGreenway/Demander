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
     * JSON Serialize object
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
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
            $property->setAccessible(true);
            $data[$property->getName()] = $property->getValue($this);
        }

        return $data;
    }
}
