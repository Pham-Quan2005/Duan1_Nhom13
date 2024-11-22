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
        $listProductLatest = $this->productQuery->getTop8ProductLatest();
        $listCategory = $this->categoryQuery->all_category();
        // hiện thị vieww trang chủ
        include "view/home.php";
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
