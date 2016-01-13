<?php

namespace Demander\Tests\Fixtures;

use Demander\QueryHandlerInterface;
use Demander\QueryInterface;


class GetEmployeeByIDQueryHandler implements QueryHandlerInterface
{
    public function handle(QueryInterface $query)
    {
        $inMemoryEmployeeRepository = new InMemoryEmployeeRepository;

        return $inMemoryEmployeeRepository->findByID($query->id());
    }
}