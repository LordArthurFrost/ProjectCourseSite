<script src="/scripts/js/buyScripts.js?<? echo time(); ?>"></script>

<?
$db = new Database();
$info = null;
$id = null;
if (isset($_GET['id']) or $_GET['id'] != null) {
    $info = $db->getGoodById(htmlspecialchars($_GET['id']));
    $id = (htmlspecialchars($_GET['id']));
} else {
    $info = $db->getGoodById(22);
    $id = 22;
}

$name = $info->getName();
$price = $info->getPrice();
$image = $info->getImage();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>О магазине</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time(); ?>">
    <link rel="stylesheet" href="/css/buyForm.css?<? echo time(); ?>">
    <meta name="author" content="Bow Master">
    <meta name="description" content="Отличный сайт для покупки снаряжения для стрельбы">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="/images/site_logo.svg">
</head>

<body>
<?
include("includes/header.php");
?>

<div class="container" style="justify-content: flex-start">
    <h2 class="h2Style bigText">Ваш заказ</h2>
    <div class="horizontalDiv">
        <?
        echo "<img src='$image' alt='$name' class=''>";
        ?>
    </div>
    <div class="horizontalDiv">
        <?
        echo "<span><b>Название товара:</b> $name</span>";
        ?>
    </div>
    <div class="horizontalDiv" style="margin-top: 25px">
        <?
        echo "<span><b>Стоимость товара:</b> $price гривен</span>";
        ?>
    </div>

    <div class="horizontalDiv" style="margin-top: 30px">
        <form enctype="multipart/form-data" method="post" id="buy" action="/index.php">
            <label for="name">Введите Ваше имя:</label><br>
            <label>
                <input class="input" type="text" name="name" placeholder="Артур" required>
            </label><br><br>
            <label for="surname">Введите Вашу фамилию:</label><br>
            <label>
                <input class="input" type="text" name="surname" placeholder="Мороз" required>
            </label><br><br>
            <label for="email">Введите Ваш email:</label><br>
            <label>
                <input class="input" type="email" name="email" placeholder="example@emample.com" required>
            </label><br><br>
            <label for="tel">Введите Вашу телефон:</label><br>
            <label>
                <input class="input" type="tel" name="tel" placeholder="+380981203667" required>
            </label><br><br>
            <label>
                <input class="input" type="hidden" name="id" value="<? echo $id ?>" style="display: none" readonly
                       required>
            </label>
            <input class="buttonBuy" type="submit" value="Подтвердить" style="margin-right: 25px">
            <input class="buttonBuy" type="reset">
        </form>
    </div>
</div>

<?
include("includes/footer.php");
?>
</body>


</html>