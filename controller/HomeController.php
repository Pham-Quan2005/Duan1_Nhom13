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
        {
           // Kiểm tra nếu có từ khóa tìm kiếm
           $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    
           // Lấy sản phẩm yêu thích, mới nhất, các danh mục (Nếu không có tìm kiếm)
           $listProductLove = $this->productQuery->getProductLove();
           $listProductLatest = $this->productQuery->getTop8ProductLatest();
           
           // Nếu có từ khóa tìm kiếm, gọi hàm tìm kiếm trong ProductQuery
           if ($keyword != '') {
               $listProductLatest = $this->productQuery->searchByName($keyword);
           }
    
           $listCategory = $this->categoryQuery->all_category();
           
           // Hiển thị view
           include "view/home.php";
       }
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
