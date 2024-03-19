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
$cardId = $_GET['id'];

$query = "SELECT * FROM cards WHERE id = $cardId";
$result = pg_query($connect, $query);

if (!$result) {
    die("Ошибка выполнения запроса.");
}

// Обработка результатов запроса
$row = pg_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Details</title>
    <style>
        .card-details {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            max-width: 500px;
            background-color: #f9f9f9;
        }

        .card-details h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-details p {
            margin: 5px 0;
        }

        .return-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .return-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="card-details">
    <?php
    if ($row) {
        echo "<h1>Card Details</h1>";
        echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
        echo "<p><strong>Название:</strong> " . $row['title'] . "</p>";
        echo "<p><strong>Описание:</strong> " . $row['content'] . "</p>";
        echo "<a href=\"index.php\" class=\"return-btn\">Вернуться к списку карточек</a>";
    } else {
        echo "<p>Карточка с указанным ID не найдена.</p>";
    }
    ?>
</div>
</body>
</html>

