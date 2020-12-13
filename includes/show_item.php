<?

$db = new Database();
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    $id = 1;
}

$content = $db->getFullItemInfo($id);
$image = $content->getImage();
$name = $content->getName();
$description = $content->getDescription();
$manufacturer = $content->getManufacturer();
$code_manufacturer = $content->getCodeManufacturer();
$category = $content->getCategory();
$category_name = $content->getCategoryName();
$type = $content->getType();
$type_name = $content->getTypeName();
$price = $content->getPrice();

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Наш товар</title>
    <meta name="author" content="Bow Master">
    <meta name="description" content="Сайт по покупке луков">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/show_item.css?<? echo time();?>">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time();?>">
</head>

<body>
<?
include("includes/header.php");
?>
<div class="container" style="flex-direction: column">
    <div class="topContent">
        <div>
            <?
            echo "<img src='$image' alt='$name' class='image'>";
            ?>
        </div>
        <div class="infoDiv">
            <div>
                <?
                echo "<span class='nameSpan'>$name</span>"
                ?>
            </div>
            <hr>
            <div style="margin-top: 10px">
                <?
                echo "Производитель: <a href='/search?manufacturer=$code_manufacturer' class='fontBold'>$manufacturer</a>"
                ?>
            </div>
            <div style="margin-top: 10px">
                <?
                echo "Категория: <a href='/search?category=$category_name' class='aTypeAndCategory'>$category</a>"
                ?>
            </div>
            <div style="margin-top: 10px">
                <?
                echo "Производитель: <a href='/search?category=$category_name&type=$type_name' class='aTypeAndCategory'>$type</a>"
                ?>
            </div>
            <hr>
            <div style="margin-top: 10px">
                <?
                echo "<span class='aTypeAndCategory'>Цена: <b class='aTypeAndCategory'>$price</b> гривен</span>"
                ?>
            </div>
            <div class="buttonBuyDiv" style="margin-top: 20px; justify-content: left">
                <button class='buttonBuy'>Купить</button>
            </div>
        </div>

    </div>
    <div class="descriptionDiv">
        <?
        echo "<span class='fontBold'>Характеристики и описание:</span><br><br>";
        echo $description;
        ?>
    </div>
</div>

<?
include ("includes/footer.php");
?>
</body>


</html>