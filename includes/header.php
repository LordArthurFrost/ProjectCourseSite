<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/ultimate.css?<?php echo time(); ?>">
<link rel="stylesheet" href="/css/header.css?<?php echo time(); ?>">
<script rel="script" src="/scripts/js/Utilities.js"></script>

<?

function setCatalogue()
{
    $db = new Database();
    $categories = $db->getCategories();
    echo "<div class='displayFlexCatalogue dropdown-content'>";
    foreach ($categories as $categoryKey => $category) {
        echo "<div>";
        echo "<a href='/search?category=$categoryKey&page=1' class='bigText' style='margin-left: 15px'><h2 class='bigText' style='color: red'>$category</h2></a>";
        echo "<ul class='bigText dropdown-item-title'>";
        $types = $db->getTypes($category);
        foreach ($types as $typeKey => $type) {
            echo "<li class='dropdown-item-list-item smallText'><a href='/search?category=$categoryKey&type=$typeKey&page=1'><h3 class='smallText' style='font-weight: normal; color: red'>$type</h3></a></li>";
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
                <h1 style="display: none">Bow Master - Отличный сайт для покупки снаряжения для стрельбы</h1>
                <a href="/"><img class="headerLogo" src="/images/header_logo.png" alt="Header logo"/></a>
            </div>
            <div class="headerTopSearch">
                <form action="search" class="headerSearchInputForm">
                    <label>
                        <input class="headerSearchInput" type="search" placeholder="Я ищу ..." name="searching">
                    </label>
                    <button type="submit" style="display: none"></button>
                </form>
            </div>
        </div>
        <div class="headerBottomMobile">
            <button class="mobileButton" onclick="toggle_flex_visibility('mobileMenu')">Меню</button>
            <div style="display: none" id="mobileMenu" class="dropdownMobileMenu">
                <a href="/" style="width: 100%;"><button class="mobileButton">Главная</button></a>
                <a href="/about"><button class="mobileButton">О Нас</button></a>
                <a href="/news"><button class="mobileButton">Новости</button></a>
                <a href="/services"><button class="mobileButton">Услуги</button></a>
                <a href="/delivery_and_payment"><button class="mobileButton">Оплата</button></a>
                <a href="/contacts"><button class="mobileButton">Контакты</button></a>
                <?
                $db = new Database();
                $rand = $db->getRandom();
                echo "<a href='/show_item?id=$rand'/><button class='mobileButton' style='font-weight: bold'>Мне повезет!</button></a>";
                ?>
            </div>
        </div>
        <div class="headerBottom">
            <nav class="navigationPanel">
                <ul class="prime">
                    <li class="dropdown nav">
                        <a href="javascript:void(0)" class="dropbtn" style="font-size: 23px">Категории</a>
                        <div class="dropdown-content">
                            <?
                            setCatalogue();
                            ?>
                        </div>
                    </li>
                    <li class="nav"><a href="/about">О Нас</a></li>
                    <li class="nav"><a href="/news">Новости</a></li>
                    <li class="nav"><a href="/services">Услуги</a></li>
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