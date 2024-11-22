<?php

class HomeController
{

    public $productQuery;
    public $categoryQuery;
    public function __construct()
    {
        $this->productQuery = new ProductQuery();
        $this->categoryQuery = new CategoryQuery();
    }

    public function __destruct() {}
    public function home()
    {
        // gọi lớp model lấy dữ liệu    
        // if (isset($_GET['id']) && $_GET['id'] > 0) {
        //     $iddm = $_GET['id'];
        // } else {
        //     $iddm = 0;
        // }
        // $dssp = showsp($iddm);

        $listProductLove = $this->productQuery->getProductLove();
        $listProductLatest = $this->productQuery->getTop8ProductLatest();
        $listProductCate = $this->productQuery->getProductCate();
        if ($listProductCate == 1) {
            $category_id = 1;
        } else if ($listProductCate == 2) {
            $category_id = 2;
        } else {
            $category_id = 3;
        } 
        if (isset($_GET['act']) && $_GET['act'] === 'home') {
            // Có thể thêm xử lý bổ sung tại đây nếu cần
        }

        $listProductofCate = $this->productQuery->getProCate($category_id);
        $listCategory = $this->categoryQuery->all_category();
        // hiện thị vieww trang chủ
        include "view/home.php";
    }
     public function showProCate()
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
    public function cart()
    {
        $listCategory = $this->categoryQuery->all_category();
        //thêm sản phẩm  khi khách bấm vào nut mua  haowcj thêm vào giỏ hàng

        if (isset($_POST['addToCart']) && $_POST["id"] > 0) {
            //tìm kiếm sản phẩm mà khách bấm mua ngay bằng id
            $product = $this->productQuery->find($_POST['id']);

            $total = $product->price * $_POST['quantity'];

            $array_pro = [
                "image_src" => $product->image_src,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $product->quantity,
                "total" => $total
            ];
            array_push($_SESSION["myCart"], $array_pro);
        }
        include "view/cart.php";
    }
}
