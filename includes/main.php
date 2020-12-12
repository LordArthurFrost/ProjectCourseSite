<?

require 'models/SiteHeadInfo.php';

function setCategories()
{
    $db = new Database();
    $categories = $db->getCategories();
    foreach ($categories as $categoryKey => $category) {
        echo "<div class='category'>";
        echo "<a href='/search?category=$categoryKey&page=1'><div class='innerCategory'><img src='/images/categories/$categoryKey.jpg' alt='$category' class='image'/><span class='categorySpan'>$category</span></div></a>";
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Продажа снаряжения для стрельбы</title>
    <link rel="icon" href="/images/site_logo.svg">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body style="background: #f9f9f9">
<?
include 'includes/header.php';
?>
<div class="container">
    <?
    setCategories();
    ?>

</div>

</body>
</html>