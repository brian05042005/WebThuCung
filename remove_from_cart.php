<?php
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

   
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}


header('Location: cart.php');
exit();
?>
<?php include_once('footer.php'); ?>
