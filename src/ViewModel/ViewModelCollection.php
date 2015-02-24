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

use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

/**
 * A collection of View Models
 *
 * @package Demander\ViewModel
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
class ViewModelCollection extends ArrayCollection implements JsonSerializable
{
    /**
     * @var array
     */
    private $elements;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * Class Constructor
     *
     * @param $offset
     * @param $limit
     * @param $totalCount
     * @param array $elements
     */
    public function __construct(
        $offset,
        $limit,
        $totalCount,
        array $elements = []
    ) {
        $this->elements   = $elements;
        $this->offset     = (int) $offset;
        $this->limit      = (int) $limit;
        $this->totalCount = (int) $totalCount;
    }

    /**
     * Required by ArrayAccess interface
     *
     * @{inheritDoc}
     */
    public function jsonSerialize()
    {
        return $this->toArray();
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
