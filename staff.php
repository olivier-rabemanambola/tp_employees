<?php
require_once 'function.php';
$titles_staff = get_titles_staff();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Staff by Title</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Gender</th>
                <th>Title</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titles_staff as $title_staff) : ?>
                <tr>
                    <td><?php echo $title_staff['gender']; ?></td>
                    <td><?php echo $title_staff['title']; ?></td>
                    <td><?php echo $title_staff['nb_employees']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>