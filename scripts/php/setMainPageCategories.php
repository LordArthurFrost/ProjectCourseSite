<?
$db = new Database();
$categories = $db->getCategories();
foreach ($categories as $categoryKey => $category) {
    echo "<div class='category'>";
    echo "<a href='/search?category=$categoryKey&page=1'><div class='innerCategory'><img src='/images/categories/$categoryKey.jpg' alt='$category' class='image'/><h3 class='categorySpan'>$category</h3></div></a>";
    echo "</div>";
}

?>