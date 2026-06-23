<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Search employees</h1>

    <form action="result.php" method="post">
        <label for="id_dept">Department</label>
        <select name="id_dept" id="id_dept">
            <option value="all">All departments</option>
            <?php for ($i=1; $i < 10 ; $i++) { ?>
                <option value="d00<?php echo $i ?>">d00<?php echo $i ?></option>
            <?php } ?>
        </select>

         <label for="name">Name</label>       
        <input type="text" name="name" id="name">

        <label for="min_age">Minimum age</label>
        <input type="number" name="min_age" id="min_age">

        <label for="max_age">Maximum age</label>
        <input type="number" name="max_age" id="max_age">


        <input type="submit" value="search">

    </form>
</body>
</html>