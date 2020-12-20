<?
$db = new Database();

$news = $db->getNews();

foreach ($news as $interesting) {

    $title = $interesting->getTitle();
    $date = $interesting->getDate();
    $image = $interesting->getImage();
    $description = $interesting->getDescription();

    echo "<div class='verticalDiv'>";

    echo "<span class='bigText' style='align-self: center'>$title</span>";
    echo "<span>Дата: $date</span>";

    if ($image == null) {
        echo "<img src='/images/no_photo_medium.png' alt='Интересная (или не очень) новость'>";
    } else {
        echo "<img src='/images/news/$image' alt='Интересная (или не очень) новость'>";
    }
    echo "<hr>";
    echo "<span>$description</span>";

    echo "<hr>";
    echo "</div>";
}

?>
