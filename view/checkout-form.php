<?php
include "view/components/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h1>Đơn Hàng</h1>
    </header>
    <div class="container_cart">
        <div class="left-box-bill">
            <form action="index.php?act=checkout" id="orderForm" class="order-form" method="post">
                <h2>Thông Tin Người Đặt Hàng</h2>
                <label for="name">Họ và Tên:</label>
                <input type="text" id="name" name="name" required>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>
                <label for="adress">Địa chỉ nhận hàng:</label>
                <textarea id="adress" name="adress" rows="4" required></textarea>

           
        </div>
        <div class="right-box-bill">

            <h2>Giỏ Hàng</h2>
            <div class="order-summary">
              
                <table border="1">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if (!empty($cart)) : ?>
        <?php foreach ($cart as $item) : ?>
            <tr>
              
                <td><?= htmlspecialchars($item['product_name']) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
                <td><?= number_format(htmlspecialchars($item['product_price']), 0, ',', '.') ?> VNĐ</td>
           
             
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">Giỏ hàng của bạn hiện đang trống.</td>
        </tr>
    <?php endif; ?>
</tbody>
                </table>
            </div>
            <?php 
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['product_price'] * $item['quantity'];
        }
        ?>
        <h3>Tổng giá trị đơn hàng: <?= number_format($total, 0, ',', '.') ?> VNĐ</h3>
        <div>
            <h2>Phương Thức Thanh Toán</h2>
            <div class="payment-method">
                <table>
                    <tr>
                        <td>
                            <input type="radio" name="Method" id="creditCard" value="cod">
                        </td>
                        <td>
                            <label for="creditCard">Thanh toán khi nhận hàng</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="Method" id="creditCard" value="momo">
                        </td>
                        <td>
                            <label for="creditCard">Thanh toán ví điện tử</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="Method" id="creditCard" value="banktransfer">
                        </td>
                        <td>
                            <label for="creditCard">Thanh toán ngân hàng</label>
                        </td>
                    </tr>
                </table>
            </div>
            <button type="button" class="checkout-btn" id="checkoutBtn" name="thanhtoan">Đặt hàng</button>
        </div>
        </form>
    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #316b7d;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e6f7ff;
        }

        tfoot {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        tfoot td {
            padding: 10px;
            background-color: #e6f7ff;
        }

        h2 {
            font-size: 22px;
            color: #316b7d;
            margin-bottom: 20px;
        }

        .order-summary h2 {
            border-bottom: 2px solid #316b7d;
            padding-bottom: 10px;
        }

        .order-summary table {
            margin-top: 15px;
        }

        .order-summary td,
        .order-summary th {
            text-align: center;
        }

        .order-summary th,
        .order-summary td {
            padding: 10px 15px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #316b7d;
            margin-top: 20px;
        }

        .total span {
            font-size: 20px;
            color: #ff5722;
        }

        header {
            background-color: #316b7d;
            color: #fff;
            text-align: center;
            padding: 20px;
        }



        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .container_cart {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        .product-box {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .product {
            width: 30%;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            transition: transform 0.3s ease-in-out;
        }

        .product:hover {
            transform: scale(1.05);
        }

        footer {
            float: left;
            background-color: #316b7d;
            color: #fff;
            text-align: center;
            padding: 20px;
            width: 100%;
            margin-top: 30px;
        }

        .product img {
            width: 100%;
            object-fit: cover;
        }

        h2 {
            text-align: center;
            border-bottom: 1px #999 dotted;
            padding-bottom: 10px;
        }

        main {
            margin-bottom: 70px;
        }

        .left-box {
            float: left;
            width: 25%;
            box-sizing: border-box;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .right-box {
            float: left;
            width: 75%;
            box-sizing: border-box;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
        }

        .product {
            width: calc(33% - 30px);
            margin: 15px;
            box-sizing: border-box;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .product:hover {
            transform: scale(1.05);
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #316b7d;
            color: #fff;
            border-radius: 3px;
        }

        h2 {
            text-align: center;
            border-bottom: 1px #999 dotted;
            padding-bottom: 10px;
        }

        .left-box {
            float: left;
            width: 25%;
            box-sizing: border-box;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .left-box h2 {
            color: #316b7d;
            border-bottom: 1px solid #316b7d;
        }

        .left-box ul {
            list-style: none;
            padding: 0;
        }

        .left-box li {
            margin-bottom: 10px;
        }

        .left-box a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 5px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .left-box a:hover {
            background-color: #316b7d;
            color: #fff;
        }


        /* cart */

        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .product-image {
            flex: 1;
            max-width: 20%;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-info {
            flex: 1;
            padding-left: 20px;
        }

        .product-info h4 {
            color: #316b7d;
            margin: 0;
        }

        .product-info p {
            color: #666;
        }

        .product-actions {
            display: flex;
            align-items: center;
        }

        .quantity {
            margin: 0 10px;
        }

        .remove-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 5px;
        }

        .continue-btn {
            background-color: #316b7d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
        }


        /* bill */

        .left-box-bill {
            float: left;
            width: 50%;
            box-sizing: border-box;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .right-box-bill {
            float: left;
            width: 48%;
            margin-left: 2%;
            box-sizing: border-box;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .left-box-bill,
        .right-box-bill {
            flex: 1;
            padding: 20px;
        }

        .order-form {
            max-width: 400px;
            margin: auto;
        }

        .order-summary {
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 20px;
        }

        .order-summary h2 {
            color: #316b7d;
        }

        .order-summary ul {
            list-style: none;
            padding: 0;
        }

        .order-summary li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .payment-method,
        .voucher,
        .total,
        .checkout-btn {
            margin-top: 20px;
        }

        .payment-method label,
        .voucher label {
            margin-bottom: 10px;
        }

        .payment-method {
            text-align: left !important;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #316b7d;
        }

        .checkout-btn {
            background-color: #316b7d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }


        /* about */

        .about-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-top: 20px;
        }


        /* contact */

        .contact-form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-top: 20px;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            background-color: #316b7d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .order-button {
            background-color: #316b7d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
    <footer>&copy; 2023 Tên Công Ty</footer>
</body>

</html>