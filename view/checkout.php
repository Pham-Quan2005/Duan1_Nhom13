<?php
include "view/components/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header class="bg-success text-white text-center py-4">
    <h1>Tạo Đơn Hàng</h1>
</header>

<div class="container my-5">
    <form method="POST">
        <div class="checkout-info mb-5">
            <h2 class="h3 mb-3">Thông tin khách hàng</h2>
            <div class="form-group mb-3">
                <label for="fullname" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" name="fullname" id="fullname"  required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone_number" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" required>
            </div>
            <div class="form-group mb-3">
                <label for="address" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>
            <div class="form-group mb-3">
                <label for="voucherCode" class="form-label">Mã giảm giá:</label>
                <input type="text" class="form-control" name="voucher_code" id="voucher_code">
            </div>
        </div>

        <div class="checkout-summary mb-5">
            <h2 class="h3 mb-3">Tóm tắt đơn hàng</h2>
            <table class="table table-bordered">
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
                            <td colspan="3">Giỏ hàng của bạn hiện đang trống.</td>
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
        <h2 class="h4 mb-3">Tổng cộng: <?= number_format($total, 0, ',', '.') ?> <span id="totalAmount">VNĐ</span></h2>

        <button type="submit" class="btn btn-success w-100" name="submit-order">Thanh Toán</button>
    </form>
</div>

<?php include "view/components/footer.php" ?>

<!-- Bootstrap JS (Optional) -->
</body>
</html>
