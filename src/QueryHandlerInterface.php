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
 * Interface for the query handler
 *
 * @package Demander
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
interface QueryHandlerInterface
{
    /**
     * The query handle
     *
     * @param  QueryInterface $query The query parameters
     * @return AbstractViewModel     The Abstract ViewModel Model
     */
    public function handle(QueryInterface $query);
}