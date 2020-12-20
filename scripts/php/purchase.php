<?
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['id'])) {
    $db = new Database();
    $array = $_POST['id'];
    $result = $db->addCustomerGood(htmlspecialchars($_POST['id']),
        htmlspecialchars($_POST['name']),
        htmlspecialchars($_POST['surname']),
        htmlspecialchars($_POST['tel']),
        htmlspecialchars($_POST['email']));
    $cartManager = new Cart();
    $cartManager->clear();
}
?>
