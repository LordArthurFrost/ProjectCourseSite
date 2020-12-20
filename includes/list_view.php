<?

function createPagination()
{
    $link = null;
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


function setCategories()
{

    echo "<span class='bigText'>Категории</span>";
    drawCategories(1);


}


function drawCategories($adjId)
{
    $db = new Database();
    $categories = $db->getCategories();

    $nowCat = null;
    $nowTyp = null;


    if (isset($_GET['category'])) {
        $nowCat = $_GET['category'];
    }
    if (isset($_GET['type'])) {
        $nowTyp = $_GET['type'];
    }

    foreach ($categories as $categoryKey => $category) {

        echo "<div class='filterHelp'><div style='display: flex; justify-content: space-between; margin-top: 20px'>";


        if ($nowCat === $categoryKey) {
            echo "<a href='/search?category=$categoryKey&page=1' class='bigText' style='margin-left: 15px'><h2 class='bigText' style='color:red;'>$category</h2></a>";
            echo "<i class='iForBefore' onclick='toggleFilterItemVisibility(\"$categoryKey\",this, \"$adjId\")'>&#9655</i></div>";
            echo "<div id='$categoryKey.$adjId' style='display: block;'>";
        } else {
            echo "<a href='/search?category=$categoryKey&page=1' class='bigText' style='margin-left: 15px'><h2 class='bigText'>$category</h2></a>";
            echo "<i class='iForBefore' onclick='toggleFilterItemVisibility(\"$categoryKey\",this, \"$adjId\")' >&#9661</i></div>";
            echo "<div id='$categoryKey.$adjId' style='display: none'>";
        }

        echo "<ul>";

        $types = $db->getTypes($category);
        foreach ($types as $typeKey => $type) {
            if ($nowTyp === $typeKey) {
                echo "<li class='smallBlackText' style='color: red'><a href='/search?category=$categoryKey&type=$typeKey&page=1'><h3 class='smallBlackText' style='font-weight: normal; color: red'>$type</h3></a></li>";
            } else {
                echo "<li class='smallBlackText'><a href='/search?category=$categoryKey&type=$typeKey&page=1'><h3 class='smallBlackText' style='font-weight: normal'>$type</h3></a></li>";
            }
        }
        echo "</ul></div>";


        echo "</div>";
    }
}


function setMobileCategories()
{


    echo "<div style='display: flex; justify-content: space-between;'>";
    echo "<span class='bigText'>Категории</span>";
    echo "<i class='iForBefore' onclick='toggleMobileFilterVisibility(this)'>&#9655</i>";
    echo "</div>";
    echo "<div id='innerFilters' style='display: none'>";

    drawCategories(2);

    echo "</div>";

}

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="language" content="ru">
    <meta charset="UTF-8">
    <title>Продажа снаряжения для стрельбы</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/ultimate.css?<? echo time(); ?>">
    <link rel="stylesheet" href="/css/list_view.css?<? echo time(); ?>">
    <script src="/scripts/js/buyScripts.js?<? echo time(); ?>"></script>
    <script src="/scripts/js/Utilities.js?<? echo time(); ?>"></script>
    <meta name="author" content="Bow Master">
    <meta name="description" content="Сайт для поиска и покупки широкого спектра разнообразного оборудовани для стрельбы и боуфишинга">
    <meta name="keywords" content="Bow master, bowmaster, bow, лук, арбалет, купить лук, купить арбалет,
    снаряжение для стрельбы, стрельба, стрельба из лука, стрельба из арбалета, аксессуары для стрельбы, стрелы, боуфишинг, мишени, щиты, щитки, сетки, сетки для стрел, 2д мишени, 2d мишени,
    3д минеши, 3d мишени">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="images/site_logo.svg">
</head>

<body>
<?
require("includes/header.php"); ?>

<article class="mainArticle">
    <div class="mainItemContainer">

        <div class="mobileSideFiltersDiv">

            <div style="margin-left: 9%">
                <?
                setMobileCategories();
                ?>
            </div>
        </div>

        <div class="sideFiltersDiv">

            <div style="margin-left: 9%">
                <?
                setCategories();
                ?>
            </div>
        </div>


        <div class="notFilterContainer">
            <?
            include("scripts/php/setCatalogueContent.php");
            ?>
        </div>


    </div>
    <?
    createPagination();
    ?>
</article>
<?
include("includes/footer.php");
?>
</body>


</html>