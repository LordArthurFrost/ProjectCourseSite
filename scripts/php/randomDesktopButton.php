<?
$db = new Database();
$rand = $db->getRandom();
echo "<li class='nav'><a style='font-weight: bold' href='/show_item?id=$rand'>Мне повезет!</a></li>";
?>
