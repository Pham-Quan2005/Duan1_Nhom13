<?php
require_once 'model/CartQuery.php';


class OrderController {
    private $cartModel;
    public $pdo;
    public $accountQuery;
    public function __construct() {
        $this->cartModel = new CartQuery(); // Đảm bảo `CartQuery` đã được định nghĩa và đúng tên class
        $this->accountQuery = new AccountQuery();
    }
    public function checkout() {
        $userId = $_SESSION['user_id'];
        $cart = $this->cartModel->getCart($userId);
        unset($_SESSION['cart']);
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            exit();
        }
    
        $userId = $_SESSION['user_id'];
        $userInfo = $this->accountQuery->getAccountInfo($userId); // Lấy thông tin người dùng

        if (isset($_POST['submit-order'])) {
            // Nhận thông tin từ form
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $voucher_code = $_POST['voucher_code'];

            // Tính tổng tiền
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['product_price'] * $item['quantity'];
            }

            // Tạo đơn hàng mới và lưu vào cơ sở dữ liệu
            $orderData = [
                'user_id' => $userId,
                'fullname' => $fullname,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address,
                'voucher_code' => $voucher_code,
                'total_amount' => $total,
                'order_date' => date('Y-m-d H:i:s')
            ];

            // Lưu đơn hàng vào CSDL
            $orderId = $this->orderQuery->createOrder($orderData);
            if ($orderId) {
                // Cập nhật trạng thái giỏ hàng hoặc các hành động sau khi tạo đơn hàng thành công
                $this->cartQuery->clearCartByUserId($userId); // Xóa giỏ hàng sau khi thanh toán
                // Chuyển hướng đến trang xác nhận hoặc trang chi tiết đơn hàng
                header("Location: ?act=order_success&id=$orderId");
                exit();
            } else {
                echo "<script>alert('Có lỗi xảy ra khi tạo đơn hàng!');</script>";
            }
        }

    
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
