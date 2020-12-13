<?
include("scripts/php/Pagination.php");
require_once 'Database.php';



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

    case "guaranties":
        include("includes/guaranties.php");
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

    case "search":
        include("view/list_view.php");
        break;

    default:
        include("includes/main.php");
}