<?php
class OrderQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct() {}

    // Thêm sản phẩm vào giỏ hàng
    public function placeOrder($userId, $fullname, $email, $phone_number, $address, $voucherCode, $total) {
        try {
            // Chèn thông tin đơn hàng vào bảng orders
            $sql = "INSERT INTO orders (user_id, fullname, email, phone_number, address, voucher_code, total, order_date, status) 
                    VALUES (:user_id, :fullname, :email, :phone_number, :address, :voucher_code, :total, NOW(), 'pending')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':voucher_code', $voucherCode);
            $stmt->bindParam(':total', $total);
            $stmt->execute();

            // Lấy ID của đơn hàng vừa tạo
            $orderId = $this->pdo->lastInsertId();

            foreach ($_SESSION['cart'] as $item) {
                $sql = "INSERT INTO order_details (order_id, product_id, product_name, product_price, quantity)
                        VALUES (:order_id, :product_id, :product_name, :product_price, :quantity)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':order_id', $orderId);
                $stmt->bindParam(':product_id', $item['product_id']);
                $stmt->bindParam(':product_name', $item['product_name']);
                $stmt->bindParam(':product_price', $item['product_price']);
                $stmt->bindParam(':quantity', $item['quantity']);
                $stmt->execute();
            }

            return true; // Thành công
        } catch (Exception $e) {
            // Nếu có lỗi thì return false
            return false;
        }
    }
}
?>
