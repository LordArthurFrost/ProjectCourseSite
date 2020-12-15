<?
include("scripts/php/Pagination.php");
require_once 'Database.php';
include("models/News.php");


$requestUri = explode('/', stristr($_SERVER['REQUEST_URI'] . '?', '?', true));
array_shift($requestUri);

$arg = array_shift($requestUri);

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['id'])) {
    $db = new Database();
    $result = $db->addCustomerGood(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['name']), htmlspecialchars($_POST['surname']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['email']));

    if ($result) {
        echo "<script>alert(\"Ваш заказ оформлен. \\nВы будете перенаправлены на главную страницу\")</script>";
    } else {
        echo "<script>alert(\"Произошла ошибка. \\nПопробуйте позже\")</script>";
    }
}

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

    case "buy_form":
        include("includes/buyForm.php");
        break;

    case "search":
        include("view/list_view.php");
        break;

    default:
        include("includes/main.php");
}