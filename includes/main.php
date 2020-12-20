<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Продажа снаряжения для стрельбы</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/main.css?<? echo time(); ?>">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time(); ?>">
    <meta name="author" content="Bow Master">
    <meta name="description" content="Сайт для поиска и покупки широкого спектра разнообразного оборудовани для стрельбы и боуфишинга">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://a0497177.xsph.ru/images/site_logo.svg">
</head>

<body style="background: #f9f9f9">
<?
include 'includes/header.php';
?>
<article class="mainArticle">
    <div class="mainContainer">
        <?
        include("scripts/php/setMainPageCategories.php");
        ?>
    </div>
</article>
<?
include("includes/footer.php");
?>
</body>
</html>