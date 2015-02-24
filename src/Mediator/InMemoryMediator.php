<?php
/**
 *
 */

namespace Demander\Mediator;

use Demander\Exception\QueryNotFoundException;
use Demander\QueryInterface;
use Demander\QueryMediatorInterface;
use Demander\ViewModel\AbstractViewModel;
use Demander\ViewModel\ViewModelCollection;

/**
 * Class InMemoryMediator
 *
 * @package Demander\Mediator
 * @author  Nigel Greenway <nigel_greenway@me.com>
 */
class InMemoryMediator implements QueryMediatorInterface
{
    /**
     * @var array
     */
    private $queryMapping;

    /**
     * @param array $queryMapping
     */
    public function __construct(
        array $queryMapping = []
    ) {
        $this->queryMapping = $queryMapping;
    }

    /**
     * Request the data
     *
     * @param QueryInterface $query
     * @return AbstractViewModel|ViewModelCollection
     * @throws QueryNotFoundException
     */
    public function request(
        QueryInterface $query
    ) {
        $className = get_class($query);

        if (array_key_exists($className, $this->queryMapping) === false) {
            throw new QueryNotFoundException($className);
        }

        $handler = new $this->queryMapping[$className];

        return $handler->handle($query);
    }
}