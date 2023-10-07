<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $day = "14";
    $month = "02";
    $year = "1999";

    echo "My birthdate is: $month/$day/$year <br>";

    if((int)$day % 2 == 0) {
        echo "$day is even";
    } else {
        echo "$day is odd";
    }

    ?>
</body>
</html>