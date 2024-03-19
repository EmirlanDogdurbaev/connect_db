<?php
$DB_HOST = "localhost";
$DB_PORT = "5436";
$DB_USER = "emirlandogdurbaev";
$DB_PASSWORD = "023120";
$database = "web";

$connect = pg_connect("host=$DB_HOST port=$DB_PORT dbname=$database user=$DB_USER password=$DB_PASSWORD");
if (!$connect) {
    die("Ошибка соединения с базой данных.");
}

$cardId = $_GET['id'];

$query = "SELECT * FROM cards WHERE id = $cardId";
$result = pg_query($connect, $query);

if (!$result) {
    die("Ошибка выполнения запроса.");
}

$row = pg_fetch_assoc($result);
if ($row) {
    echo "<h1>Card Details</h1>";
    echo "<p>ID: " . $row['id'] . "</p>";
    echo "<p>Название: " . $row['titke'] . "</p>";
    echo "<p>Описание: " . $row['content'] . "</p>";
} else {
    echo "Карточка с указанным ID не найдена.";
}

pg_free_result($result);
pg_close($connect);

