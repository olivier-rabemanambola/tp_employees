<?php
require_once 'function.php';

$dept_no = $_GET['dept_no'];
$employees = get_employees_by_department($dept_no);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Employees in Department <?php echo $employees[0]['dept_name']; ?> (<?php echo $dept_no; ?>)</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <td><a href="employeeprofile.php?emp_no=<?php echo $employee['emp_no']; ?>"><?php echo $employee['emp_no']; ?></a></td>
                    <td><?php echo $employee['first_name']; ?></td>
                    <td><?php echo $employee['last_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>