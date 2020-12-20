<script src="/scripts/js/buyScripts.js?<? echo time(); ?>"></script>

<?
$db = new Database();
$shopCart = new Cart();

$info = array();
$goods = array();

$price = array();
$image = array();
$name = array();
$id = array();

$totalSum = 0;
$info = $shopCart->get();

$i = 0;

foreach ($info as $item) {
    $goods[$i] = $db->getGoodById($item);
    ++$i;
}

for ($i = 0; $i < count($goods); ++$i) {
    $price[$i] = $goods[$i]->getPrice();
    $totalSum += $price[$i];
    $id[$i] = $goods[$i]->getIdGood();
    $name[$i] = $goods[$i]->getName();
    $image[$i] = $goods[$i]->getImage();
}

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
<article class="mainArticle">

    <div class="container" style="justify-content: flex-start">
        <h2 class="h2Style bigText">Ваш заказ</h2>

        <span class="deleteSpan" style="margin-top: 30px" onclick="clearCart()">Очистить корзину</span>

        <div class="outerCategory">

            <span class="bigText" id="emptyCart"
                  style="align-self: center; margin-bottom: 30px; display:  <? if ($totalSum === 0) echo "block"; else echo "none" ?>">Ваша корзина пуста</span>

            <?
            for ($i = 0; $i < count($name); ++$i) {
                echo "<div class='goodUpperInnerDiv' >";

                echo "<div style='display: flex'>";
                echo "<img src='$image[$i]' alt='$name[$i]'>";

                echo "<div class='goodInnerDiv'>";
                echo "<a href='/show_item?id=$id[$i]' <span class='nameSpanLink'>$name[$i]</span></a>";

                echo "<span><b>Стоимость товара:</b> $price[$i] гривен</span>";
                echo "</div>";

                echo "</div>";

                echo "<span class='deleteSpan' onclick='deleteFromCart(\"$id[$i]\", \"$price[$i]\", this)'>Удалить</span>";
                echo "</div>";
            }
            echo "<b style='align-self: center'><span  id='totalSum'>Общая стоимость: $totalSum гривен</span></b>";
            ?>
        </div>

        <div class="horizontalDiv" style="margin-top: 30px">
            <form enctype="multipart/form-data" id="buyForm" onsubmit="return purchase()">
                <label for="name">Введите Ваше имя:</label><br>
                <label>
                    <input class="input" type="text" name="name" maxlength="100" placeholder="Артур" required>
                </label><br><br>
                <label for="surname">Введите Вашу фамилию:</label><br>
                <label>
                    <input class="input" type="text" name="surname" maxlength="100" placeholder="Мороз" required>
                </label><br><br>
                <label for="email">Введите Ваш email:</label><br>
                <label>
                    <input class="input" type="email" name="email" maxlength="50" placeholder="example@emample.com"
                           required>
                </label><br><br>
                <label for="tel">Введите Вашу телефон:</label><br>
                <label>
                    <input class="input" type="tel" name="tel" maxlength="13" placeholder="+380981203667" required>
                </label><br><br>
                <label>
                    <input class="input" type="hidden" name="id" id="idField" value="<? foreach ($id as $item) {
                        echo $item . ", ";
                    } ?>" style="display: none" readonly
                           required>
                </label>
                <? if (count($id) !== 0) { ?>
                    <div id="butButtons">
                        <input class="buttonBuy" type="submit" value="Подтвердить" style="margin-right: 25px">
                        <input class="buttonBuy" type="reset">
                    </div>
                <? } ?>
            </form>
        </div>
    </div>
</article>
<?
include("includes/footer.php");
?>
</body>


</html>