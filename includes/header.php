<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/ultimate.css?<?php echo time(); ?>">
<link rel="stylesheet" href="/css/header.css?<?php echo time(); ?>">
<script rel="script" src="/scripts/js/Utilities.js"></script>


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
                <button class="mobileButton" style="font-weight: normal" onclick="window.location.href='/'">Главная</button>
                <button class="mobileButton" style="font-weight: normal" onclick="window.location.href='/about'">О Нас</button>
                <button class="mobileButton" style="font-weight: normal" onclick="window.location.href='/news'">Новости</button>
                <button class="mobileButton" style="font-weight: normal" onclick="window.location.href='/services'">Услуги</button>
                <button class="mobileButton" style="font-weight: normal" onclick="window.location.href='/delivery_and_payment'">Оплата</button>
                <button class="mobileButton" style="font-weight: normal" onclick="window.location.href='/contacts'">Контакты</button>
                <?
                    include ("scripts/php/randomMobileButton.php");
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
                            include ("scripts/php/setHeaderCatalogue.php");
                            ?>
                        </div>
                    </li>
                    <li class="nav"><a href="/about">О Нас</a></li>
                    <li class="nav"><a href="/news">Новости</a></li>
                    <li class="nav"><a href="/services">Услуги</a></li>
                    <li class="nav"><a href="/delivery_and_payment">Оплата</a></li>
                    <li class="nav"><a href="/contacts">Контакты</a></li>
                    <?
                        include ("scripts/php/randomDesktopButton.php");
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>