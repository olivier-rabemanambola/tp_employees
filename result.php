<?php
require_once "function.php";

$id_dept =  $_POST['id_dept'];
$name = $_POST['name'];
$minimum_age = $_POST['min_age'];
$maximum_age = $_POST['max_age'];

if (isset($_POST['nb_page'])) {
    $nb_page = $_POST['nb_page'];
} else {
    $nb_page = 0;
}

$results = researches_values($id_dept, $name, $minimum_age, $maximum_age, $nb_page);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Results</h1>

    <form action="result.php" method="post">
        
        <input type="hidden" name="id_dept" value="<?php echo $id_dept; ?>">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="min_age" value="<?php echo $minimum_age; ?>">
        <input type="hidden" name="max_age" value="<?php echo $maximum_age; ?>">

    <table border="1" class="table">
        <tr>
            <td>Department id</td>
            <td>Department name</td>
            <td>Employee id</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Age</td>
            <td>Gender</td>
        </tr>

        <?php foreach ($results as $result) { ?>
            <tr>
                <td><?php echo $result['dept_no'] ?></td>
                <td><?php echo $result['dept_name'] ?></td>
                <td><?php echo $result['emp_no'] ?></td>
                <td><?php echo $result['first_name'] ?></td>
                <td><?php echo $result['last_name'] ?></td>
                <td><?php echo $result['age'] ?></td>
                <td><?php echo $result['gender'] ?></td>
            </tr>

        <?php } ?>

    </table>
    <?php if ($nb_page != 0) { ?>
            <button type="submit" name="nb_page" value="<?php echo $nb_page - 20 ?>">
                << Previous
            </button>
        <?php } ?>

        <button type="submit" name="nb_page" value="<?php echo $nb_page + 20 ?>">
            Next >>
        </button>

    </form>
</body>

</html>