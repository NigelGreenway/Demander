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
use ArrayIterator;

/**
 * A collection of View Models
 *
 * @author  Nigel Greenway <github@futurepixels.co.uk>
 */
class ViewModelCollection extends ArrayIterator implements JsonSerializable
{
    /**
     * Add an element to the element stack
     *
     * @param $element
     *
     * @return void
     *
     * @deprecated Use `#append` instead
     */
    public function add($element)
    {
        $this->append($element);
    }

    /**
     * Remove an element by the element key
     *
     * @param $key
     *
     * @return void
     */
    public function remove($key)
    {
        if ($this->offsetExists($key) === true) {
            $this->offsetUnset($key);
        }
    }

    /**
     * Remove the specified element from the collection
     *
     * @param $element
     *
     * @return void
     */
    public function removeElement($element)
    {
        $storage = $this->getArrayCopy();

        $key = array_search($element, $storage, true);

        if ($key !== false) {
            $this->offsetUnset($key);
        }
    }

    /**
     * @inheritDoc
     *
     * @deprecated Not used anymore
     */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

    /**
     * Returns the array of elements
     *
     * @return array
     *
     * @deprecated Use `#getArrayCopy` instead
     */
    public function toArray()
    {
        return $this->getArrayCopy();
    }
}
