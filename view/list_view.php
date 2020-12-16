<?

function setContent()
{
    $db = new Database();
    $category = null;
    $type = null;
    $content = array();
    $searching = null;
    $selected = array();
    $sort = null;

    if (isset($_GET['sortPrice'])) {
        $sort = $_GET['sortPrice'];
        for ($i = 0; $i < 3; ++$i) {
            if ($sort == $i) {
                $selected[$i] = "selected";
            }
        }
    }

    $getVar = null;

    if (isset($_GET['searching'])) {
        $searching = htmlspecialchars($_GET['searching']);
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }
        $getVar[] = array("page", $page);
        $getVar[] = array("searching", $searching);
        $content = $db->getShortListViewBySearch($searching, $page, $sort);


    }
    if (isset($_GET['category'])) {
        $category = htmlspecialchars($_GET['category']);
        $address = "/search?category=" . $category;
        if (isset($_GET['type'])) {
            $type = htmlspecialchars($_GET['type']);
        }
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }

        $getVar[] = array("category", $category);
        $getVar[] = array("page", $page);
        $getVar[] = array("type", $type);
        $content = $db->getShortListView($category, $type, $page, $sort);
    }

    if (isset($_GET['manufacturer'])) {
        $manufacturer = htmlspecialchars($_GET['manufacturer']);
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }
        $getVar[] = array("page", $page);
        $getVar[] = array("manufacturer", $manufacturer);

        $content = $db->getShortListViewByManufacturer($manufacturer, $page, $sort);
        $manufacturer = $db->getManufacturer($manufacturer);
        echo "<div class='upperDiv'><b class='resultsSpan'>$manufacturer</b></div>";
    }

    echo "<div class='upperDiv'><div><span class='resultsSpan'>Всего найдено результатов: " . ShortViewInfo::getCount() .
        "</span></div><div  style='display: flex; flex-direction: row; align-items: center'>
    <span class='resultsSpan'>Сортировать по цене:</span>
    <form action='/search' method='get' id='sortPriceForm'>
     <select class='itemPriceFilter' name='sortPrice' onchange='document.getElementById(\"sortPriceForm\").submit();'>
        <option value='0' $selected[0]> --- </option>
        <option value='1' $selected[1]>От меньшей к большей</option>
        <option value='2' $selected[2]>От большей к меньшей</option>
    </select>";

    for ($i = 0; $i < count($getVar); ++$i) {
        if ($getVar[$i][1] != null) {
            echo "<input type='hidden' name='" . $getVar[$i][0] . "' value='" . $getVar[$i][1] . "' />";
        }
    }

    echo " </form>
     </div></div>";

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

    if (isset($_GET['sortPrice'])) {
        $link .= "&sortPrice=" . htmlspecialchars($_GET['sortPrice']);
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
    <meta property="og:image" content="images/site_logo.svg">
</head>

<body>
<?
require("includes/header.php"); ?>

<div class="container" style="flex-direction: column; max-width: 1300px">
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