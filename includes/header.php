<link rel="stylesheet" href="/css/header.css">

<?
require_once 'Database.php';


function setCatalogue()
{
    $db = new Database();
    $categories = $db->getCategories();
    echo "<div class='displayflex dropdown-content'>";
    foreach ($categories as $categoryKey => $category) {
        echo "<div>";
        echo "<ul class='dropdown-item-title bigText'><a href='/search?category=$categoryKey&page=1' class='bigText'>$category</a>";
        $types = $db->getTypes($category);
        foreach ($types as $typeKey => $type) {
            echo "<li class='dropdown-item-list-item smallText'><a href='/search?category=$categoryKey&type=$typeKey&page=1'>$type</a></li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    echo "</div>";
}

?>


<header class="header">
    <div class="headerContainer">
        <div class="headerTopContainer">
            <div class="headerContainerLogo">
                <a href="/"><img class="headerLogo" src="/images/header_logo.png"/></a>
            </div>
            <div class="headerTopSearch">
                <form action="search" >
                    <input class="header__search_input type=search" placeholder="Я ищу ..." name="searching">
                    <button type="submit" style="display: none"></button>
                </form>
            </div>
        </div>
        <div class="headerBottom">
            <nav class="navigationPanel">
                <ul class="prime">
                    <li class="dropdown nav">
                        <a href="javascript:void(0)" class="dropbtn">Категории</a>
                        <div class="dropdown-content">
                            <?
                            setCatalogue();
                            ?>
                        </div>
                    </li>
                    <li class="nav"><a href="/about">О Нас</a></li>
                    <li class="nav"><a href="/news">Новости</a></li>
                    <li class="nav"><a href="/guaranties">Гарантии</a></li>
                    <li class="nav"><a href="/delivery_and_payment">Оплата</a></li>
                    <li class="nav"><a href="/contacts">Контакты</a></li>
                    <?
                    $db = new Database();
                    $rand = $db->getRandom();
                    echo "<li class='nav'><a style='font-weight: bold' href='/show_item?id=$rand'/>Мне повезет!</a></li>";
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>