<?php
class ProductQuery
{
    public $pdo;
    public function __construct()
    {
        $this->pdo  = connectDB();
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
    public function getTop8ProductLatest()
    {
        try {
            $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 8";
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
    }
    public function getProductLove()
    {
        try {
            $sql = "SELECT * FROM product ORDER BY view DESC LIMIT 8";

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
    }
    public function getProductCate()
    {
        try {
            $sql = "SELECT * FROM category WHERE 1";

            $data = $this->pdo->query($sql)->fetchAll();

            $ds = [];

            foreach ($data as $row) {
                $product = converToObjectCategory($row);
                $ds[] = $product;
            }
            return $ds;
        } catch (Exception $e) {
            echo "Lỗi//" . $e->getMessage();
            echo "<hr>";
        }
    }
    public function getProCate($category_id)
    {
        //gọi model lấy danh sách sản phẩm
        // $listCategory = $this->categoryQuery->all_category();
        try {
            $sql = "SELECT * FROM product WHERE category_id = " . $category_id;
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
        include "view/home.php";
    }
    // public function getProductofCate($id)
    // {

    //     try {
    //         $sql = "SELECT * FROM product WHERE category_id = '$id'";

    //         $data = $this->pdo->query($sql)->fetchAll();

    //         $ds = [];

    //         foreach ($data as $row) {
    //             $product = converToObjectProduct($row);
    //             $ds[] = $product;
    //         }
    //         return $ds;
    //     } catch (Exception $e) {
    //         echo "Lỗi//" . $e->getMessage();
    //         echo "<hr>";
    //     }
    // }
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
        include "view/productCate.php";
    }
    public function detail($id)
    {
        try {
            $sql = "SELECT * FROM `product` WHERE 1";
            if ($id > 0) {
                $sql .= " AND id = " . $id;
            }
            $data = $this->pdo->query($sql)->fetchAll();
            $ds = [];
            foreach ($data as $row) {
                $product = converToObjectProduct($row);
                $ds[] = $product;
            }
            return $ds;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
        include "views/detailProduct.php";
    }
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM product WHERE id = $id";
            $data = $this->pdo->query($sql)->fetch();
            $product = converToObjectProduct($data);
            return $product;
        } catch (Exception $e) {
            echo "Lỗi//" . $e->getMessage();
            echo "<hr>";
        }
    }
}
