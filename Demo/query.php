<?php

require_once __DIR__.'/../vendor/autoload.php';

final class EmployeeNameAndContactQuery implements \Demander\QueryInterface
{
    public $id;
    public function __construct($id) { $this->id = $id; }
}

final class EmployeeNameAndContactByStatusQuery implements \Demander\QueryInterface
{
    public $status;
    public function __construct($status) { $this->status = $status; }
}

final class EmployeeNameAndContactQueryHandler implements \Demander\QueryHandlerInterface
{
    public function handle(\Demander\QueryInterface $query)
    {
         // $employee = $this->repo->findEmployeeById($query->id);
        // Lets pretend this is the result set for the line above...
        $employee = ['name' => 'Joe Bloggs', 'email_address' => 'j.bloggs@company.com'];

        return new EmployeeViewModel(
            $employee['name'],
            $employee['email_address']
        );
    }
}

final class EmployeeNameAndContactByStatusQueryHandler implements \Demander\QueryHandlerInterface
{
    private static $employees = [
        [
            'name'          => 'Joe Bloggs',
            'email_address' => 'j.bloggs@company.com',
            'status'        => 0
        ],
        [
            'name'          => 'John Smith',
            'email_address' => 'j.smith@company.com',
            'status'        => 1,
        ],
        [
            'name'          => 'Lisa Simpson',
            'email_address' => 'l.simpson@company.com',
            'status'        => 1,
        ],
    ];

    public function handle(\Demander\QueryInterface $query)
    {
        $employeeCollection = new EmployeeNameAndContactCollection();

        array_filter(static::$employees, function($employee) use ($query, $employeeCollection) {
            if ($employee['status'] === $query->status) {
                $employeeCollection->append(
                    new EmployeeViewModel(
                        $employee['name'],
                        $employee['email_address']
                    )
                );
            }
        });

        return $employeeCollection;
    }
}

final class EmployeeNameAndContactCollection extends \Demander\ViewModel\ViewModelCollection
{}

final class EmployeeViewModel extends \Demander\ViewModel\AbstractViewModel
{
    public $name;
    public $emailAddress;

    public function __construct($name, $emailAddress)
    {
        $this->name         = $name;
        $this->emailAddress = $emailAddress;
    }
}

$mediator = new \Demander\Mediator\InMemoryMediator(
    [
        'EmployeeNameAndContactQuery'         => 'EmployeeNameAndContactQueryHandler',
        'EmployeeNameAndContactByStatusQuery' => 'EmployeeNameAndContactByStatusQueryHandler',
    ],
    []
);

$employee = $mediator->request(new EmployeeNameAndContactQuery('10'));

// Example Output:
echo '<h1>Employee Contact Details:</h1>';
echo sprintf('<p><strong>Full name</strong>: %s</p>', $employee->name);
echo sprintf('<p><strong>Email Address</strong>: <a href="mailto:%1$s">%1$s</a></p>', $employee->emailAddress);
echo '<hr>';

$activeEmployees = $mediator->request(new EmployeeNameAndContactByStatusQuery(1));

$row = <<<ROW
<tr>
    <td>%s</td> <td>%s</td>
</tr>
ROW;

echo '<h2>Active Employees (' .  count($activeEmployees) . ')</h2>';
echo '<table border="1">';
echo '<tr>';
echo '<th>Name</th> <th>Email Address</th>';
echo '</tr>';
foreach ($activeEmployees as $activeEmployee) {
    echo sprintf($row, $activeEmployee->name, $activeEmployee->emailAddress);
}
echo '</table>';
