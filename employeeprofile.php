<?php
require_once 'function.php';

$emp_no = $_GET['emp_no'];
$employee = get_employee_profile($emp_no);
$salaries = get_employee_salaries($emp_no);
$titles = get_employee_titles($emp_no);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Employee Profile</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Hire Date</th>
                <th>Gender</th>
                <th>Department ID</th>
                <th>Department Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $employee['emp_no']; ?></td>
                <td><?php echo $employee['first_name']; ?></td>
                <td><?php echo $employee['last_name']; ?></td>
                <td><?php echo $employee['birth_date']; ?></td>
                <td><?php echo $employee['hire_date']; ?></td>
                <td><?php echo $employee['gender']; ?></td>
                <td><?php echo $employee['dept_no']; ?></td>
                <td><?php echo $employee['dept_name']; ?></td>
            </tr>
        </tbody>
            

    </table>

    <h2>Employee Salaries</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Salary</th>
                <th>From Date</th>
                <th>To Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaries as $salary): ?>
                <tr>
                    <td><?php echo $salary['salary']; ?></td>
                    <td><?php echo $salary['from_date']; ?></td>
                    <td><?php echo $salary['to_date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Employee Titles</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>From Date</th>
                <th>To Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titles as $title): ?>
                <tr>
                    <td><?php echo $title['title']; ?></td>
                    <td><?php echo $title['from_date']; ?></td>
                    <td><?php echo $title['to_date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>