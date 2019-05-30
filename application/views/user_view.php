<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>

<h1>
<?php
    echo $welcome;
?>
</h1>

<?php

    // echo $result;
    foreach ($result as $object) {
        echo $object->username . "<br>";
    }
?>

</body>
</html>