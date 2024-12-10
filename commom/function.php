<?php
// hàm ckeets nói csdl

function connectDB()
{
    $host = DB_HOST;
    $port = DB_PORT;
    $dbName = DB_NAME;
    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbName", DB_USER, DB_PASS);
        return $conn;
    } catch (Exception $e) {
        echo "Lỗi" . $e->getMessage();
        echo "<hr>";
    }
}

function converToObjectProduct($row)
{
    $product = new Product();
    $product->id = $row['id'];
    $product->name = $row['name'];
    $product->description = $row['description'];
    $product->price = $row['price'];
    $product->quantity = $row['quantity'];
    $product->image_src = $row['image_src'];
    $product->category_id = $row['category_id'];
    $product->status = $row['status'];
    return $product;
}
function converToObjectCategory($row)
{
    $category = new Category();
    $category->id = $row['id'];
    $category->name = $row['name'];
    $category->status = $row['status'];
    return $category;
}
function addOrder($fullname, $email, $voucherCode, $phoneNumber, $address)
{
    $conn = connectDB();
    $sql = "INSERT INTO orders (fullname, email, voucher_code, phone_number, address) 
            VALUES (:fullname, :email, :voucher_code, :phone_number, :address)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':voucher_code', $voucherCode);
        $stmt->bindParam(':phone_number', $phoneNumber);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
        return $conn->lastInsertId(); // Trả về ID đơn hàng vừa thêm
    } catch (Exception $e) {
        echo "Lỗi khi thêm đơn hàng: " . $e->getMessage();
    }
}
function getOrders()
{
    $conn = connectDB();
    $sql = "SELECT * FROM orders";
    try {
        $stmt = $conn->query($sql);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    } catch (Exception $e) {
        echo "Lỗi khi lấy danh sách đơn hàng: " . $e->getMessage();
    }
}
// Hàm lấy chi tiết đơn hàng theo ID
function getOrderById($orderId)
{
    $conn = connectDB();
    $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Lỗi khi lấy đơn hàng: " . $e->getMessage();
    }
}

// Hàm cập nhật đơn hàng
function updateOrder($orderId, $fullname, $email, $voucherCode, $phoneNumber, $address)
{
    $conn = connectDB();
    $sql = "UPDATE orders 
            SET fullname = :fullname, email = :email, voucher_code = :voucher_code, 
                phone_number = :phone_number, address = :address 
            WHERE order_id = :order_id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':voucher_code', $voucherCode);
        $stmt->bindParam(':phone_number', $phoneNumber);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Lỗi khi cập nhật đơn hàng: " . $e->getMessage();
    }
}

// Hàm xóa đơn hàng
function deleteOrder($orderId)
{
    $conn = connectDB();
    $sql = "DELETE FROM orders WHERE order_id = :order_id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Lỗi khi xóa đơn hàng: " . $e->getMessage();
    }
}