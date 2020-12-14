<?


function setContent()
{
    $db = new Database();
    $category = null;
    $type = null;
    $content = array();
    $searching = null;

    if (isset($_GET['searching'])) {
        $searching = htmlspecialchars($_GET['searching']);
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }
        $content = $db->getShortListViewBySearch($searching, $page);


    }
    if (isset($_GET['category'])) {
        $category = htmlspecialchars($_GET['category']);
        if (isset($_GET['type'])) {
            $type = htmlspecialchars($_GET['type']);
        }
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }
        $content = $db->getShortListView($category, $type, $page);
    }

    if (isset($_GET['manufacturer'])) {
        $manufacturer = htmlspecialchars($_GET['manufacturer']);
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }
        $content = $db->getShortListViewByManufacturer($manufacturer, $page);
        $manufacturer = $db->getManufacturer($manufacturer);
        echo "<div><b class='resultsSpan'>$manufacturer</b></div>";
    }


    echo "<div><span class='resultsSpan'>Всего найдено результатов: " . ShortViewInfo::getCount() . "</span></div>";
    echo "<div class='contentContainer'>";

    foreach ($content as $view) {
        echo "<div class='itemContainer'>";
        $id = $view->getIdGood();
        $image = $view->getImage();
        $name = $view->getName();
        $price = $view->getPrice();
        echo "<a href='/show_item?id=$id'>";
        echo "<div class='innerItem'>";
        echo "<img src='$image' class='itemImage' alt='$name'>";
        echo "<h4 class='itemSpanName'>$name</h4>";
        echo "</div>";
        echo "</a>";
        echo "<div>";
        echo "<span class='priceSpan'>$price гривен</span>";
        echo "</div>";
        echo "<div class='buttonBuyDiv'>";
        echo "<button class='buttonBuy' onclick='fillForm(\"$id\")'>Купить</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

function createPagination()
{
    if (isset($_GET['page'])) {
        $page = (int)htmlspecialchars($_GET['page']);
    } else {
        $page = 1;
    }
    if (isset($_GET['searching'])) {
        $link = "?searching=" . htmlspecialchars($_GET['searching']);
    }
    if (isset($_GET['category'])) {
        $link = "?category=" . htmlspecialchars($_GET['category']);
        if (isset($_GET['type'])) {
            $link .= "&type=" . htmlspecialchars($_GET['type']);
        }
    }
    if (isset($_GET['manufacturer'])) {
        $link = "?manufacturer=" . htmlspecialchars($_GET['manufacturer']);
    }

    setPagination(ShortViewInfo::getCount(), $page, $link);
}

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Продажа снаряжения для стрельбы</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/list_view.css?<? echo time(); ?>">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time(); ?>">
    <script src="/scripts/js/buyScripts.js?<? echo time(); ?>"></script>
    <meta name="author" content="Bow Master">
    <meta name="description" content="Сайт по покупке луков">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?
require("includes/header.php"); ?>

<div class="container" style="flex-direction: column">
    <?
    setContent();
    ?>
</div>

<?
createPagination();
?>

<?
include("includes/footer.php");
?>
</body>


</html>