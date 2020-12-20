<?
include("scripts/php/Pagination.php");
require_once ('server/Database.php');
include("models/News.php");
include("models/Cart.php");


$requestUri = explode('/', stristr($_SERVER['REQUEST_URI'] . '?', '?', true));
array_shift($requestUri);

$arg = array_shift($requestUri);


switch ($arg) {
    case "news":
        include("includes/news.php");
        break;

    case "about":
        include("includes/about.php");
        break;

    case "services":
        include("includes/services.php");
        break;

    case "contacts":
        include("includes/contacts.php");
        break;

    case "delivery_and_payment":
        include("includes/delivery_and_payment.php");
        break;

    case "show_item":
        include("includes/show_item.php");
        break;

    case "addToCart":
        include("scripts/php/addToCart.php");
        break;

    case "deleteFromCart":
        include("scripts/php/deleteFromCart.php");
        break;

    case "purchase":
        include("scripts/php/purchase.php");
        break;

    case "clearCart":
        include("scripts/php/clearCart.php");
        break;

    case "buy_form":
        include("includes/buyForm.php");
        break;

    case "search":
        include("scripts/php/fixEmptySearch.php");
        include("includes/list_view.php");
        break;

    default:
        include("includes/main.php");
}