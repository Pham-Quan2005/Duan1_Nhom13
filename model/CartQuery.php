<?php
class CartQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct() {}

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($userId, $productId, $quantity) {
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
        $sql = "INSERT INTO cart (user_id, product_id, product_name, product_image, product_price, quantity) 
                VALUES (:user_id, :product_id, :product_name, :product_image, :product_price, :quantity)
                ON DUPLICATE KEY UPDATE 
                    quantity = quantity + :quantity, 
                    product_name = :product_name, 
                    product_image = :product_image, 
                    product_price = :product_price";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':product_name', $product['name']);
        $stmt->bindParam(':product_image', $product['image_src']);
        $stmt->bindParam(':product_price', $product['price']);
        $stmt->bindParam(':quantity', $quantity);
        return $stmt->execute();
    }

    // Lấy giỏ hàng của người dùng
    public function getCart($userId) {
        $sql = "SELECT product_id, product_name, product_image, product_price, quantity 
                FROM cart 
                WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($userId, $productId) {
        $sql = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        return $stmt->execute();
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateQuantity($userId, $productId, $quantity) {
        $sql = "UPDATE cart 
                SET quantity = :quantity 
                WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        return $stmt->execute();
    }
}
?>
