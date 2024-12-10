<?php
require_once 'model/CartQuery.php';

class OrderController {
    private $cartModel;
    public $pdo;
    public function __construct() {
        $this->cartModel = new CartQuery(); // Đảm bảo `CartQuery` đã được định nghĩa và đúng tên class
    }
    public function checkout() {
        $userId = $_SESSION['user_id'];
        $cart = $this->cartModel->getCart($userId);
        unset($_SESSION['cart']);
        // Tính tổng giá trị giỏ hàng
        
            //lay thong tin tren form thanh toan
            //tao don hang thanh cong
            //lay idorder +thong tin gio hang
            
        require_once ('./view/checkout.php');
    }
    public function payment() {
        // Tính tổng giá trị giỏ hàng
        
            //lay thong tin tren form thanh toan
            //tao don hang thanh cong
            //lay idorder +thong tin gio hang
            
        require_once ('./view/payment.php');
    }
    public function order() {
        $userId = $_SESSION['user_id'];
        $cart = $this->cartModel->getCart($userId);
        // Tính tổng giá trị giỏ hàng
        
            //lay thong tin tren form thanh toan
            //tao don hang thanh cong
            //lay idorder +thong tin gio hang
        require_once ('./view/order.php');
    }
    public function orderdelete() {
        // Tính tổng giá trị giỏ hàng
        
            //lay thong tin tren form thanh toan
            //tao don hang thanh cong
            //lay idorder +thong tin gio hang
            
        require_once ('./view/order.php');
    }
    public function detailorder() {
        // Tính tổng giá trị giỏ hàng
        
            //lay thong tin tren form thanh toan
            //tao don hang thanh cong
            //lay idorder +thong tin gio hang
            
        require_once ('./view/order.php');
    }
}
?>
