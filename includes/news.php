<?

function setNews()
{
    $db = new Database();

    $news = $db->getNews();

    foreach ($news as $interesting) {

        $title = $interesting->getTitle();
        $date = $interesting->getDate();
        $image = $interesting->getImage();
        $description = $interesting->getDescription();

        echo "<div class='verticalDiv'>";

        echo "<span class='bigText' style='align-self: center'>$title</span>";
        echo "<span>Дата: $date</span>";

        if ($image == null) {
            echo "<img src='/images/no_photo_medium.png' alt='Интересная (или не очень) новость'>";
        } else {
            echo "<img src='/images/news/$image' alt='Интересная (или не очень) новость'>";
        }
        echo "<hr>";
        echo "<span>$description</span>";

        echo "<hr>";
        echo "</div>";
    }
}


?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Новости магазина</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time() ?>">
    <link rel="stylesheet" href="/css/news.css?<? echo time() ?>">
    <meta name="author" content="Bow Master">
    <meta name="description" content="Отличный сайт для покупки снаряжения для стрельбы">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="/images/site_logo.svg">
</head>

<body>
<?
include("includes/header.php");
?>
<div class="container">
    <h2 class="h2Style bigText">Новости Сайта</h2>

    <? setNews(); ?>

</div>
<?
include("includes/footer.php");
?>
</body>


</html>