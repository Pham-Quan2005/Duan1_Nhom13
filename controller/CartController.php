<?php
require_once 'model/CartQuery.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartQuery(); // Đảm bảo `CartQuery` đã được định nghĩa và đúng tên class
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add() {
        if(!empty($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
        $productId = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;
        if ($this->cartModel->addToCart($userId, $productId, $quantity)) {
            echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng!'); window.location.href='?act=view';</script>";
        } else {
            echo "<script>alert('Không thể thêm sản phẩm vào giỏ hàng!'); window.history.back();</script>";
        }

        }else{
            echo "<script>alert('Bạn chưa đăng nhập'); window.location.href='?act=login';</script>";
            return;
        }
        

        

        
    }

    // Hiển thị giỏ hàng
    public function view() {
        $userId = $_SESSION['user_id'];

        // if ($userId === 0) {
        //     echo "<script>alert('Bạn cần đăng nhập để xem giỏ hàng.'); window.location.href='/login';</script>";
        //     return;
        // }

        $cart = $this->cartModel->getCart($userId); // Lấy dữ liệu giỏ hàng từ model
        require_once 'view/cart.php'; // Hiển thị view giỏ hàng
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove() {
        $userId = $_SESSION['user_id'] ?? 0;
        $productId = $_POST['product_id'] ?? 0;

        if ($userId === 0 || $productId === 0) {
            echo "<script>alert('Dữ liệu không hợp lệ!'); window.history.back();</script>";
            return;
        }

        if ($this->cartModel->removeFromCart($userId, $productId)) {
            header("Location: ?act=cart&act=view");
        } else {
            echo "<script>alert('Không thể xóa sản phẩm khỏi giỏ hàng!'); window.history.back();</script>";
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update() {
        $userId = $_SESSION['user_id'] ?? 0;
        $productId = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;

        if ($userId === 0 || $productId === 0 || $quantity < 1) {
            echo "<script>alert('Dữ liệu không hợp lệ!'); window.history.back();</script>";
            return;
        }

        if ($this->cartModel->updateQuantity($userId, $productId, $quantity)) {
            header("Location: ?act=cart&action=view");
        } else {
            echo "<script>alert('Không thể cập nhật số lượng sản phẩm!'); window.history.back();</script>";
        }
    }
}
?>
