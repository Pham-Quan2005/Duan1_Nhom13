<?php
session_start();

// những flie commom 
require_once "commom/env.php";
require_once "commom/function.php";
// nhúng toàn bộ flie controller sử dụng client
require_once "controller/HomeController.php";
require_once "controller/AccountController.php";
require_once "controller/ProductController.php";


// nhúng toàn bộ trong model
require_once "model/ProductQuery.php";
require_once "model/AccountQuery.php";
require_once "model/Account.php";
require_once "admin/model/Product.php";
require_once "admin/model/Category.php";
require_once "admin/model/CategoryQuery.php";
// thông tin act và id trên đường dẫn 
$act = $_GET['act'] ?? "";
$id = $_GET['id'] ?? "";
// $categoryId = $_GET['category'] ?? "";
match ($act) {
    // trang chủ
    '' => (new HomeController())->home(),
    'home' => (new HomeController())->home(),
    'login' => (new AccountController())->login(),
    'register' => (new  AccountController())->register(),
    'logout' => (new  AccountController())->logout(),
    'cart' => (new HomeController())->cart(),
    'admin' => (new AccountController())->admin(),
    'detail' => (new ProductController())->detailPro(),
    'category' => (new ProductController())->showPro(),
};
