<?php
$DB_HOST = "localhost";
$DB_PORT = "5436";
$DB_USER = "emirlandogdurbaev";
$DB_PASSWORD = "023120";
$database = "web";
$connect = pg_connect("host=$DB_HOST port=$DB_PORT dbname=$database user=$DB_USER password=$DB_PASSWORD");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Light Grey</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/core.css">
    <meta name="viewport"
          content="width=1200px, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="inner_header">
                <div class="search">
                    <h2>Light Grey</h2>
                    <form>
                        <label for="search"></label><input type="text" id="search" name="q" placeholder="Search..."/>
                    </form>
                </div>
                <ul class="menu">
                    <li class="menu_link shadow">
                        <a href="/">Home</a>
                    </li>
                    <li class="menu_link shadow">
                        <a href="/">Latest News</a>
                    </li>
                    <li class="menu_link shadow">
                        <a href="/">Portfolio</a>
                    </li>
                    <li class="menu_link shadow">
                        <a href="/">About Us</a>
                    </li>
                    <li class="menu_link">
                        <a href="/">Contact</a>
                    </li>
                </ul>

            </div>
        </div>

    </header>

    <div class="welcome">
        <div class="container">
            <div class="inner_welcome">
                <div class="welcome_left">
                    <h1>Welcome to Silver Team</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce iaculis sed
                        dui tincidunt sagittis. Nam et massa dictum, imperdiet est quis, scelerisque nunc.</p>
                    <button>Learn More</button>
                </div>
                <div class="welcome_right">
                    <img src="images/chemodan.png" alt="chemodan">
                </div>


            </div>
        </div>
    </div>

    <div class="cards">
        <div class="container">
            <div class="cards_inner">
                <?php
                $query = "SELECT * FROM cards";
                $result = pg_query($connect, $query);

                if (!$result) {
                    die("Ошибка выполнения запроса.");
                }

                while ($row = pg_fetch_assoc($result)) {
                    echo "<div class='card'>
          <img src='{$row['img']}' alt='dasd' width='200' height='50'/>
                          <h3>{$row['title']}</h3>
                          <p>{$row['content']}</p>
                
                          <a href='details.php?id={$row['id']}'>more</a>
                      </div>";
                }

                pg_free_result($result);
                ?>
            </div>
        </div>
    </div>


    <div class="page_content">
        <div class="container">
            <div class="inner_page_content">
                <div class="updates">
                    <h4>Latest Update</h4>

                    <?php
                    $res = pg_query($connect, "SELECT * FROM news");

                    while ($myrow = pg_fetch_assoc($res)) {
                        printf(' 
                            <article class="news_cont">
                                <div class="news">
                                    <img src="%s" alt="small_picture">
                                    <div class="text-content">
                                        <h6>%s</h6>
                                        <p>%s</p>
                                    </div>
                                </div>
                                <div class="gray_line"></div>
                                <span class="date">June 18, 2048</span>
                            </article>
                        ', $myrow['img'], $myrow['title'], $myrow['content']);
                    }

                    // Освобождаем ресурсы
                    pg_free_result($res);
                    ?>

                    <button class="gray">View All</button>
                </div>
                <div class="introduction">
                    <h4>Who We Are</h4>
                    <div class="news_2">
                        <div class="text_content_2">
                            <p class="cursive">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text </p>
                            <p><a href="/">Light Gray Template</a> is provided for your personal or commercial
                                websites. Validate
                                <a href="">XTML</a> & <a href="/">CSS</a>. Credits go to <a href="/">Free
                                    Photos</a> for photos and
                                <a href="/">Free Vector</a> for icons used in this template.Lorem Ipsum is
                                simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text </p>
                        </div>
                        <img src="images/apelsin.jpg" alt="big_picture">
                    </div>
                    <div class="check_point">
                        <ul class="left">
                            <li><img src="images/check.png" alt="check">Sent elementum velit in tortor faucibus</li>
                            <li><img src="images/check.png" alt="check">Praesent tempor quam a tupis</li>
                            <li><img src="images/check.png" alt="check">Sent elementum velit in tortor faucibus</li>
                            <li><img src="images/check.png" alt="check">Praesent tempor quam a tupis</li>
                            <li><img src="images/check.png" alt="check">Sent elementum velit in tortor faucibus</li>
                        </ul>
                        <ul class="right">
                            <li><img src="images/check.png" alt="check">Praesent tempor quam a tupis</li>
                            <li><img src="images/check.png" alt="check">Sent elementum velit in tortor faucibus</li>
                            <li><img src="images/check.png" alt="check">Praesent tempor quam a tupis</li>
                            <li><img src="images/check.png" alt="check">Sent elementum velit in tortor faucibus</li>
                            <li><img src="images/check.png" alt="check">Praesent tempor quam a tupis</li>
                        </ul>
                    </div>
                    <button class="gray">More</button>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <p>Copyright<a href="/"> &copy; 2048 My company Name</a></p>
    </footer>
</div>
</body>
</html>