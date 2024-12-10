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
        <h1>Tao Don hang</h1>
    </header>
    <div class="container">
        <form method="POST">
            <div class="checkout-info">
                <h2>Thông tin khach hang</h2>
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" name="fullname" id="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Số điện thoại:</label>
                    <input type="text" name="phone_number" id="phone_number" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="voucherCode">Mã giảm giá:</label>
                    <input type="text" name="voucher_code" id="voucher_code">
                </div>
            </div>
            <div class="checkout-summary">
                <h2>Tóm tắt đơn hàng</h2>
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
            <h2 class="total">Tổng Cộng:<?= number_format($total, 0, ',', '.') ?> <span id="totalAmount">VNĐ</span></h2>
            </div>
            <button type="submit" name="submit-order">Tạo đơn hàng</button>
        </form>
    </div>
    <?php include "view/components/footer.php" ?>
</body>
</html>