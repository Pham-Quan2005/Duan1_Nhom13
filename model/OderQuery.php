<?php
class OderQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB(); // Hàm connectDB() cần đảm bảo kết nối PDO
    }

    public function __destruct() {}

    // Thêm sản phẩm vào đơn hàng
    public function addToOder($userId, $productId, $quantity, $status = 'Chờ xác nhận') {
        // Lấy thông tin sản phẩm từ bảng product
        $sql = "SELECT name, image_src, price FROM product WHERE id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$product) {
            return false; // Sản phẩm không tồn tại
        }
        // Chèn hoặc cập nhật thông tin sản phẩm vào giỏ hàng
        $sql = "INSERT INTO oders (user_id, product_id, product_name, product_image, product_price, quantity, status) 
                VALUES (:user_id, :product_id, :product_name, :product_image, :product_price, :quantity, :status)
                ON DUPLICATE KEY UPDATE 
                    quantity = quantity + :quantity, 
                    product_name = :product_name, 
                    product_image = :product_image, 
                    product_price = :product_price,
                    status = :status";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':product_name', $product['name']);
        $stmt->bindParam(':product_image', $product['image_src']);
        $stmt->bindParam(':product_price', $product['price']);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    // Lấy giỏ hàng của người dùng
    public function getOder($userId) {
        $sql = "SELECT * FROM `oders` WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromOder($userId, $productId) {
        $sql = "DELETE FROM oders WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        return $stmt->execute();
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateQuantityOder($userId, $productId, $quantity) {
        $sql = "UPDATE oders
                SET quantity = :quantity 
                WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        return $stmt->execute();
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatusOder($userId, $productId, $status) {
        $sql = "UPDATE oders 
                SET status = :status 
                WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        return $stmt->execute();
    }
}
?>
