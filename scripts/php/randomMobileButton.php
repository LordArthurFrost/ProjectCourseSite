<?
$db = new Database();
$rand = $db->getRandom();
echo "<button class='mobileButton' style='font-weight: bold' onclick=\"window.location.href='/show_item?id=$rand'\">Мне повезет!</button>";
?>
