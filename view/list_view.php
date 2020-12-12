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


    } else {
        if (isset($_GET['category'])) {
            $category = htmlspecialchars($_GET['category']);
            if (isset($_GET['type'])) {
                $type = htmlspecialchars($_GET['type']);
            }
        }
        $content = $db->getShortListView($category, $type, (int)htmlspecialchars($_GET['page']));
    }

    echo "Всего найдено результатов: " . ShortViewInfo::getCount() . "<br>";

    foreach ($content as $view) {
        echo $view->getIdGood();
        echo $view->getName();
        echo $view->getPrice();
        echo $view->getImage();
        echo "<br>";
    }
}

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Продажа снаряжения для стрельбы</title>
    <link rel="icon" href="images/site_logo.svg">
</head>

<body>
<?
require("includes/header.php");
setContent();
?>


</body>


</html>