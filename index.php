<?php
require_once 'function.php';
$departments = get_departments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Departments list</h1>
    
    <a href="search.php">Search Employees</a>
    <table border="1">
        <thead>
            <tr>
                <th>Department ID</th>
                <th>Department Name</th>
                <th>Manager</th>
                <th>Number of Employees</th>
            </tr>
        </thead>

        <tbody>
        
            <?php foreach ($departments as $department) : ?>
                <tr>
                    <td><a href="listemployees.php?dept_no=<?php echo $department['dept_no']; ?>"><?php echo $department['dept_no']; ?></a></td>
                    <td><?php echo $department['dept_name']; ?></td>
                    <td><?php echo $department['first_name'] . ' ' . $department['last_name']; ?></td>
                    <td><?php echo $department['nb_employees']; ?></td>
        
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        <a href="staff.php">View Staff by Title</a>

</body>
</html>