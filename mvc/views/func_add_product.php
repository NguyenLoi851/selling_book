<?php
    if (array_key_exists('product-number', $_POST)) {
        require_once ROOT . DS . 'services' . DS . 'GuestServices.php';
        require_once ROOT . DS . 'services' . DS . 'BookServices.php';
        $guestServices = new GuestServices();
        $bookServices = new BookServices();
        $username = $_POST['username'];
        $quantity = $_POST['product-number'];
        $book = $bookServices->getById($_POST['bookId']);
        $listCarts = $guestServices->getListCartBooks($username);
        $listProducts = array();
        foreach ($listCarts as $cart) {
            array_push($listProducts, $cart['book']);
        }
        if (!in_array($book, $listProducts)) {
            $guestServices->insertBookToCart($username, $book, $quantity);
        }else{
            $guestServices->updateBookToCart($username, $book, $quantity);
        }
        $newListCart = $guestServices->getListCartBooks($username);
        echo count($newListCart);
    }
?>