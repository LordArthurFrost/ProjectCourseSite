<?

if (isset($_POST['id'])) {
    $cartManager = new Cart();
    $cartManager->delete($_POST['id']);
    print_r($cartManager->get());
}
?>
