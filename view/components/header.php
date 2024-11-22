<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán thức ăn </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div id="wrapper">
        <div id="header">
            <a href="" class="logo">
                <img src="assets/logo.png" alt="">
            </a>
            <div id="menu">
                <div class="item">
                    <a href="?act=home">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="">Sản phẩm</a>
                </div>
                <div class="item">
                    <a href="">Blog</a>
                </div>
                <div class="item">
                    <a href="">Liên hệ</a>
                </div>
                <div class="item">
                <?php if (isset($_SESSION['user_name'])): ?>
                    <a href="?act=admin"></a>
                <?php else: ?>
                    <a href="?act=register">Đăng Ký</a>
                <?php endif; ?>
                </div>
                <div class="item">
                <?php if (isset($_SESSION['user_name'])): ?>
                    Xin chào <?= $_SESSION['user_name'] ?> - 
                    <a href="?act=logout">Đăng xuất</a>
                <?php else: ?>
                    <a href="?act=login">Đăng nhập</a>
                <?php endif; ?>
            </div>
            </div>
            <div id="actions">
                <div class="item">
                    <img src="assets/user.png" alt="">
                </div>
                <div class="item">
                    <img src="assets/cart.png" alt="">
                </div>
            </div>
        </div>
        <div id="banner">
            <div class="box-left">
                <h2>
                    <span>THỨC ĂN</span>
                    <br>
                    <span>THƯỢNG HẠNG</span>
                </h2>
                <p>Chuyên cung cấp các món ăn đảm bảo dinh dưỡng
                    hợp vệ sinh đến người dùng,phục vụ người dùng 1 cái
                    hoàn hảo nhất</p>
                <button>Mua ngay</button>
            </div>
            <div class="box-right">
                <img src="assets/img_1.png" alt="">
                <img src="assets/img_2.png" alt="">
                <img src="assets/img_3.png" alt="">
            </div>
            <div class="to-bottom">
                
            </div>
        </div>