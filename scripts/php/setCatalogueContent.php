<?
$db = new Database();
$category = null;
$type = null;
$content = array();
$searching = null;
$selected = array();
$sort = null;
$getVar = null;

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

echo "<div class='upperDiv'><div class='resultsAndPriceDiv'><span class='resultsSpan'>Всего найдено результатов: " . ShortViewInfo::getCount() .
    "</span></div><div class='resultsAndPriceDiv'>
    <span class='resultsSpan'>Сортировать по цене:&nbsp&nbsp</span>
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
    echo "<div style='margin-top: 10px'>";
    echo "<span class='priceSpan'>$price гривен</span>";
    echo "</div>";
    echo "<div class='buttonBuyDiv'>";
    echo "<button class='buttonBuy' onclick='addToCart(\"$id\")'>Купить</button>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";

?>