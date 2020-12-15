<?
function setCategories()
{
    $db = new Database();
    $categories = $db->getCategories();
    foreach ($categories as $categoryKey => $category) {
        echo "<div class='category'>";
        echo "<a href='/search?category=$categoryKey&page=1'><div class='innerCategory'><img src='/images/categories/$categoryKey.jpg' alt='$category' class='image'/><h3 class='categorySpan'>$category</h3></div></a>";
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Продажа снаряжения для стрельбы</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/main.css?<? echo time();?>">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time();?>">
    <meta name="author" content="Bow Master">
    <meta name="description" content="Сайт по покупке луков">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background: #f9f9f9">
<?
include 'includes/header.php';
?>
<div class="mainContainer">
    <?
    setCategories();
    ?>

</div>

<?
include("includes/footer.php");
?>
</body>
</html>