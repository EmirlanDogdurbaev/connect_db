<?php
$DB_HOST = "localhost";
$DB_PORT = "5436";
$DB_USER = "emirlandogdurbaev";
$DB_PASSWORD = "023120";
$database = "mydb";
$connect = pg_connect("host=$DB_HOST port=$DB_PORT dbname=$database user=$DB_USER password=$DB_PASSWORD");

if ($connect) {
    echo "Connected...";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="2">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>Description</th>
        <th>Image</th>

    </tr>

    <?php
    $result = pg_query($connect, "SELECT * FROM user");
    $myrow = pg_fetch_array($result);

    while ($myrow) {
        printf('<tr>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
    </tr>', $myrow['id'], $myrow['username'], $myrow['price'], $myrow['region']);

        $myrow = pg_fetch_array($result);
    }
    ?>


</table>

</body>
</html>