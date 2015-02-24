<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <nigel_greenway@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demander;

/**
 * Interface for the query mediator
 *
 * @package Demander
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
interface QueryMediatorInterface
{
    /**
     * Request the query
     *
     * @param  QueryInterface $query
     * @return ViewModel
     */
    public function request(QueryInterface $query);
}