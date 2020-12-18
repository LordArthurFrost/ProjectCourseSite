<?
include("scripts/php/Pagination.php");
require_once 'models/Database.php';
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

    case "submit":

        break;

    case "delivery_and_payment":
        include("includes/delivery_and_payment.php");
        break;

    case "show_item":
        include("includes/show_item.php");
        break;

    case "addToCart":

        if (isset($_POST['id'])) {
            $cartManager = new Cart();
            $cartManager->set($_POST['id']);
            print_r($cartManager->get());
        }
        break;

    case "deleteFromCart":

        if (isset($_POST['id'])) {
            $cartManager = new Cart();
            $cartManager->delete($_POST['id']);
            print_r($cartManager->get());
        }
        break;
    case "purchase":
        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['id'])) {
            $db = new Database();
            $array = $_POST['id'];
            $result = $db->addCustomerGood(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['name']), htmlspecialchars($_POST['surname']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['email']));
            $cartManager = new Cart();
            $cartManager->clear();
        }
        break;

    case "clearCart":
        $cartManager = new Cart();
        $cartManager->clear();
        print_r($cartManager->get());
        echo "Empty";
        break;

    case "buy_form":
        include("includes/buyForm.php");
        break;

    case "search":
        if (isset($_GET['searching']) and $_GET['searching'] === "") {
            echo "<script>location.href = \"/search?searching=everything\"</script>";
        }
        include("view/list_view.php");
        break;

    default:
        include("includes/main.php");
}