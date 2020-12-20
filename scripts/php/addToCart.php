<?
if (isset($_POST['id'])) {
    $cartManager = new Cart();
    $cartManager->set($_POST['id']);
    print_r($cartManager->get());
}
?>
