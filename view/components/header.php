<?php 
require_once __DIR__ . '/../../commom/function.php';
require_once './commom/dbhelper.php';

// Lấy danh mục từ cơ sở dữ liệu
$sql = "SELECT * FROM category";
$listCategory = executeResult($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán thức ăn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <a href="" class="logo">
            <img src="assets/logo.png" alt="Logo">
        </a>
        <div id="menu">
            <div class="item">
                <a href="?act=home">Trang chủ</a>
            </div>
            <div class="item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($listCategory as $category): ?>
                            <li>
                                <a class="dropdown-item" href="?act=category&id=<?= htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['name']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </div>
            <div class="item">
                <a href="">Blog</a>
            </div>
            <div class="item">
                <a href="">Liên hệ</a>
            </div>
            <div class="item">
                <?php if (isset($_SESSION['user_name'])): ?>
                    Xin chào <?= htmlspecialchars($_SESSION['user_name']) ?> - 
                    <a href="?act=logout">Đăng xuất</a>
                <?php else: ?>
                    <a href="?act=login">Đăng nhập</a>
                <?php endif; ?>
            </div>
            <div class="item">
                <?php if (isset($_SESSION['user_name'])): ?>
                <?php else: ?>
                    <a href="?act=register">Đăng ký</a>
                <?php endif; ?>
                <?php if(isset($_SESSION['user_role'])==1){ ?>
                    <a href="?act=admin">Vào quản trị</a>
                <?php } ?>
            </div>
        </div>
        <div id="actions">
            <div class="item">
                <a href="?act=view"><img src="assets/cart.png" alt="Giỏ hàng"></a>
            </div>
        </div>
    </div>
   