<?php
/**
 * This file is part of the nigelgreenway/demander package.
 *
 * (c) Nigel Greenway <github@futurepixels.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demander\Mediator;

use Demander\CommandInterface;
use Demander\CommandMediatorInterface;
use Demander\Exception\CommandNotFoundException;
use Demander\Exception\QueryNotFoundException;
use Demander\QueryInterface;
use Demander\QueryMediatorInterface;
use Demander\ViewModel\AbstractViewModel;
use Demander\ViewModel\ViewModelCollection;

/**
 * Class InMemoryMediator
 *
 * @package Demander\Mediator
 * @author  Nigel Greenway <github@futurepixels.co.uk>
 */
class InMemoryMediator implements QueryMediatorInterface, CommandMediatorInterface
{
    /** @var array */
    private $queryNameToHandlersMap = [];
    /** @var array */
    private $commandNameToHandlersMap = [];

    /**
     * @param array $queryMapping
     * @param array $commandMapping
     */
    public function __construct(
        array $queryMapping,
        array $commandMapping
    ) {
        $this->addQueryHandlers($queryMapping);
        $this->addCommandHandlers($commandMapping);
    }

    /** @inheritDoc */
    public function request(
        QueryInterface $query
    ) {
        $className = get_class($query);

        if (array_key_exists($className, $this->queryNameToHandlersMap) === false) {
            throw new QueryNotFoundException($className);
        }

        $handler = new $this->queryNameToHandlersMap[$className];

        return $handler->handle($query);
    }

    /** @inheritDoc */
    public function execute(CommandInterface $command)
    {
        $className = get_class($command);

        if (array_key_exists($className, $this->commandNameToHandlersMap) === false) {
            throw new CommandNotFoundException($className);
        }

        $handler = new $this->commandNameToHandlersMap[$className];

        return $handler->execute($command);
    }

    /**
     * @param array $queryNameToHandlerMap
     *
     * @return void
     */
    private function addQueryHandlers(array $queryNameToHandlerMap = [])
    {
        $this->queryNameToHandlersMap = $queryNameToHandlerMap;
    }

    /**
     * @param array $commandNameToHandlerMap
     *
     * @return void
     */
    private function addCommandHandlers(array $commandNameToHandlerMap = [])
    {
        $this->commandNameToHandlersMap = $commandNameToHandlerMap;
    }
}
