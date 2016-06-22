<?php

require_once __DIR__.'/../vendor/autoload.php';

final class EmployeeNameAndContactQuery implements \Demander\QueryInterface
{
    public $id;
    public function __construct($id) { $this->id = $id; }
}

final class EmployeeNameAndContactQueryHandler implements \Demander\QueryHandlerInterface
{
    public function handle(\Demander\QueryInterface $query)
    {
         // $employee = $this->repo->findEmployeeById($query->id);
        // Lets pretend this is the result set for the line above...
        $employee = ['name' => 'Joe Bloggs', 'email_address' => 'j.bloggs@company.com'];

        return new EmployeeViewModel([
            'name'         => $employee['name'],
            'emailAddress' => $employee['email_address'],
        ]);
    }
}

final class EmployeeViewModel extends \Demander\ViewModel\AbstractViewModel
{
    public $name;
    public $emailAddress;
}

$mediator = new \Demander\Mediator\InMemoryMediator(
    [
        'EmployeeNameAndContactQuery' => 'EmployeeNameAndContactQueryHandler',
    ],
    []
);

$employee = $mediator->request(new EmployeeNameAndContactQuery('10'));


// Example Output:
echo '<h1>Employee Contact Details:</h1>';
echo sprintf('<p><strong>Full name</strong>: %s</p>', $employee->name);
echo sprintf('<p><strong>Email Address</strong>: <a href="mailto:%1$s">%1$s</a></p>', $employee->emailAddress);