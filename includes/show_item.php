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
$id = $content->getId();

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Инфориация про <? echo $name ?></title>
    <meta name="author" content="Bow Master">
    <meta name="description" content="Купить <? echo $name ?> (<? echo $type ?>)">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени, Купить <? echo $name ?> (<? echo $type ?>)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/show_item.css?<? echo time(); ?>">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time(); ?>">
    <script src="/scripts/js/buyScripts.js?<? echo time(); ?>"></script>
    <script src="/scripts/js/Utilities.js?<? echo time(); ?>"></script>
    <meta property="og:image" content="<? echo $image ?>">
</head>

<body>
<?
include("includes/header.php");
?>
<div id="hover-image" style="display: none">
    <?
    echo "<img src='$image' alt='$name' class='hoverImage'>";
    ?>
</div>
<div class="container">
    <div class="topContent">
        <div>
            <?
            echo "<img src='$image' alt='$name' class='image' onclick='showFullImage()'>";
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
                echo "Тип: <a href='/search?category=$category_name&type=$type_name' class='aTypeAndCategory'>$type</a>"
                ?>
            </div>
            <hr>
            <div style="margin-top: 10px">
                <?
                echo "<span class='aTypeAndCategory'>Цена: <b class='aTypeAndCategory'>$price</b> гривен</span>"
                ?>
            </div>
            <div class="buttonBuyDiv" id="showItemBuyButton">
                <?
                echo "<button class='buttonBuy' onclick='fillForm(\"$id\")'>Купить</button>"
                ?>
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
include("includes/footer.php");
?>
</body>


</html>