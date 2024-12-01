<?php
include "view/components/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="./css/style1.css">
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
        <h3 style="margin: 20px;">Tổng giá trị đơn hàng: <?= number_format($total, 0, ',', '.') ?> VNĐ</h3>
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
            <div>
            <form action="?act=addOder" method="POST" style="display:inline;">
        <!-- <input type="hidden" name="product_id" value="<?= $sp->id ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? 0 ?>"> -->
        <button type="submit" class="btn btn-success" style="margin: 20px;">Đặt hàng</button>
        </form>
            </div>
        </div>
    </div>
  
    </div>
    <?php include "view/components/footer.php" ?>
</body>
</html>