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
    $category->image_src = $row['image_src'];
    $category->status = $row['status'];
    return $category;
}
