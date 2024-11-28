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
}
