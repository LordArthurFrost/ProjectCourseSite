<?
$db = new Database();
$categories = $db->getCategories();
echo "<div class='displayFlexCatalogue dropdown-content'>";
foreach ($categories as $categoryKey => $category) {
    echo "<div>";
    echo "<a href='/search?category=$categoryKey&page=1' class='bigText' style='margin-left: 15px'><h2 class='bigText' style='color: red'>$category</h2></a>";
    echo "<ul class='bigText dropdown-item-title'>";
    $types = $db->getTypes($category);
    foreach ($types as $typeKey => $type) {
        echo "<li class='smallText dropdown-item-list-item'><a href='/search?category=$categoryKey&type=$typeKey&page=1'><h3 class='smallText' style='font-weight: normal'>$type</h3></a></li>";
    }
    echo "</ul>";
    echo "</div>";
}
echo "</div>";

?>
