<?php
session_start();

// Những file commom 
require_once "commom/env.php";
require_once "commom/function.php";

// Nhúng toàn bộ file controller sử dụng cho client
require_once "controller/HomeController.php";
require_once "controller/AccountController.php";
require_once "controller/ProductController.php";
require_once "controller/CartController.php";
require_once "controller/OderController.php";


// Nhúng toàn bộ file trong model
require_once "model/ProductQuery.php";
require_once "model/AccountQuery.php";
require_once "model/Account.php";
require_once "admin/model/Product.php";
require_once "admin/model/Category.php";
require_once "admin/model/CategoryQuery.php";

// Lấy thông tin `act` và `id` trên đường dẫn 
$act = $_GET['act'] ?? "";
$id = $_GET['id'] ?? "";

match ($act) {
    // Trang chủ
    '' => (new HomeController())->home(),
    'home' => (new HomeController())->home(),

    // Tài khoản
    'login' => (new AccountController())->login(),
    'register' => (new AccountController())->register(),
    'logout' => (new AccountController())->logout(),

    // Quản lý giỏ hàng
        'add' => (new CartController())->add(),
        'view' => (new CartController())->view(),
        'remove' => (new CartController())->remove(),
    // Quản lý đơn hàng
    'addOder' => (new OderController())->addOder(),
    'viewOder' => (new OderController())->viewOder(),
    'removeOder' => (new OderController())->removeOder(),

    // Trang chi tiết sản phẩm
    'detail' => (new ProductController())->detailPro(),

    // Hiển thị sản phẩm theo danh mục
    'category' => (new ProductController())->showPro(),

    // Admin
    'admin' => (new AccountController())->admin(),
    'checkout' => (new CartController())->checkoutForm(),
    };
?>
