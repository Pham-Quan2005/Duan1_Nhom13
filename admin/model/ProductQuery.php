<?php
class ProductQuery
{
    public $pdo;
    public function __construct()
    {
        $this->pdo = connectDB();
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
    public function all()
    {
        try {
            $sql = "SELECT * FROM product";
            $data = $this->pdo->query($sql)->fetchAll();
            // Chuyển đổi dữ liệu -> object Product
            $danhSach = [];
            foreach ($data as $row) {
                $danhSach[] = converToObjectProduct($row);
            }
            return $danhSach;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
    public function getPro($pro_id)
    {
        //gọi model lấy danh sách sản phẩm
        // $listCategory = $this->categoryQuery->all_category();
        try {
            $sql = "SELECT * FROM product WHERE 1";
            if ($pro_id > 0) {
                $sql .= " AND id = " . $pro_id;
            }
            // $sql .= " ORDER BY id LIMIT " . $quantity;
            $data = $this->pdo->query($sql)->fetchAll();
            $ds = [];
            foreach ($data as $row) {
                $product = converToObjectProduct($row);
                $ds[] = $product;
            }
            return $ds;
        } catch (Exception $e) {
            echo "Lỗi//" . $e->getMessage();
            echo "<hr>";
        }
        //hiện thị view tương ứng 
        include "view/product/update.php";
    }
    public function getCate($category_id)
    {
        //gọi model lấy danh sách sản phẩm
        // $listCategory = $this->categoryQuery->all_category();
        try {
            $sql = "SELECT * FROM product WHERE 1";
            if ($category_id > 0) {
                $sql .= " AND category_id = " . $category_id;
            }
            // $sql .= " ORDER BY id LIMIT " . $quantity;
            $data = $this->pdo->query($sql)->fetchAll();
            $ds = [];
            foreach ($data as $row) {
                $product = converToObjectProduct($row);
                $ds[] = $product;
            }
            return $ds;
        } catch (Exception $e) {
            echo "Lỗi//" . $e->getMessage();
            echo "<hr>";
        }
        //hiện thị view tương ứng 
        include "../view/productCate.php";
    }
    public function create(Product $product)
    {
        try {
            $sql = "INSERT INTO `product`(`id`, `name`, `price`, `quantity`, `description`, `image_src`, `category_id`, `status`) VALUES (NULL,
            '$product->name','$product->price','$product->quantity','$product->description','$product->image_src','$product->category_id','$product->status');";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "Ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM `product` WHERE id = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM product WHERE id = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data !== false) {
                $product = new Product();
                $product->id = $data['id'];
                $product->name = $data['name'];
                $product->description = $data['description'];
                $product->price = $data['price'];
                $product->quantity = $data['quantity'];
                $product->image_src = $data['image_src'];
                $product->category_id = $data['category_id'];
                $product->status = $data['status'];
                return $product;
            } else {
                echo "bản ghi không tồn tại";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
    public function update($id, Product $product)
    {
        try {
            $sql = "UPDATE `product` SET `name`='$product->name',
                `price`='$product->price',`quantity`='$product->quantity',`description`='$product->description',`image_src`='$product->image_src',`category_id`='$product->category_id',`status`='$product->status' WHERE id = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
}
