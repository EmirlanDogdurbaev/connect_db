<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$DB_HOST = "localhost";
$DB_PORT = "5436";
$DB_USER = "emirlandogdurbaev";
$DB_PASSWORD = "023120";
$database = "web";

// Подключение к базе данных
$connect = pg_connect("host=$DB_HOST port=$DB_PORT dbname=$database user=$DB_USER password=$DB_PASSWORD");
if (!$connect) {
    die("Ошибка соединения с базой данных.");
}

// Запрос для получения всех карточек
$query = "SELECT * FROM cards";
$result = pg_query($connect, $query);

if (!$result) {
    die("Ошибка выполнения запроса.");
}

// Обработка результатов запроса и вывод списка карточек
while ($row = pg_fetch_assoc($result)) {
    echo "<li><a href='db.php?id={$row['id']}'>{$row['title']}</a></li>";
}

// Освобождаем ресурсы
pg_free_result($result);
pg_close($connect);
?>


</body>
</html>