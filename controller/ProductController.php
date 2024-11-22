<?php
class  ProductController
{
    public $productQuery;
    public $categoryQuery;
    public $pdo;
    public function __construct()
    {
        $this->productQuery = new ProductQuery();
        $this->categoryQuery = new CategoryQuery();
        $this->pdo = connectDB();
    }

    public function __destruct() {}
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
    public function showPro()
    {
        if (!isset($_GET['id'])) {
            $category_id = 0;
        } else {
            $category_id = $_GET['id'];
        }
        //gọi model lấy danh sách sản phẩm
        $listCategory = $this->categoryQuery->all_category();
        $listProduct = $this->productQuery->getCate($category_id);

        //hiện thị view tương ứng 
        include "view/productCate.php";
    }

    public function detailPro()
    {
        if (!isset($_GET['id'])) {
            $pro_id = 0;
        } else {
            $pro_id = $_GET['id'];
        }
        $listCategory = $this->categoryQuery->all_category();
        $detailPro = $this->productQuery->detail($pro_id);
        // hiện thị view tương ứng
        include "view/detailProduct.php";
    }
}
