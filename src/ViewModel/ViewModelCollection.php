<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <github@futurepixels.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Demander\ViewModel;

use JsonSerializable;

/**
 * A collection of View Models
 *
 * @package Demander\ViewModel
 * @author  Nigel Greenway <github@futurepixels.co.uk>
 */
class ViewModelCollection implements JsonSerializable
{
    /** @var array */
    private $elements;

    /**
     * Constructor
     *
     * @param array $elements
     */
    public function __construct(
        array $elements = []
    ) {
        $this->elements = $elements;
    }

    /**
     * Add an element to the element stack
     *
     * @param $element
     *
     * @return void
     */
    public function add($element)
    {
        $this->elements[] = $element;
    }

    /**
     * Remove an element by the element key
     *
     * @param $key
     *
     * @return mixed
     */
    public function remove($key)
    {
        if (isset($this->elements[$key]) === false && array_key_exists($key, $this->elements) === false) {
            return null;
        }

        $removed = $this->elements[$key];
        unset($this->elements[$key]);

        return $removed;
    }

    /**
     * Remove the specified element from the collection
     *
     * @param $element
     *
     * @return bool
     */
    public function removeElement($element)
    {
        $key = array_search($element, $this->elements, true);

        if ($key === false) {
            return false;
        }

        unset($this->elements[$key]);

        return true;
    }

    /**
     * Amount of elements the collection holds
     *
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }

    /** @{inheritDoc} */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

    /**
     * Returns the array of elements
     *
     * @return array
     */
    public function toArray()
    {
        return $this->elements;
    }
}
