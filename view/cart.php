<?php
include "view/components/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-remove {
            color: white;
            background-color: red;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .btn-remove:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Giỏ hàng của bạn</h1>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Tổng giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
    <?php if (!empty($cart)) : ?>
        <?php foreach ($cart as $item) : ?>
            <tr>
                <td><?= htmlspecialchars($item['product_name']) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
                <td><?= number_format(htmlspecialchars($item['product_price']), 0, ',', '.') ?> VNĐ</td>
                <td><?= number_format(htmlspecialchars($item['product_price'] * $item['quantity']), 0, ',', '.') ?> VNĐ</td>
                <td>
                    <form action="?act=cart&act=remove" method="POST">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($_GET['user_id'] ?? 0) ?>">
                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($item['product_id']) ?>"> <!-- Sửa lại product_id -->
                        <button type="submit" class="btn-remove">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">Giỏ hàng của bạn hiện đang trống.</td>
        </tr>
    <?php endif; ?>
</tbody>
        </table>
        <!-- Hiển thị tổng giá trị giỏ hàng -->
        <?php 
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['product_price'] * $item['quantity'];
        }
        ?>
        <h3>Tổng giá trị giỏ hàng: <?= number_format($total, 0, ',', '.') ?> VNĐ</h3>
        <div>
    <a href="?act=checkout"><button>Đặt hàng</button></a>
    <!-- <form action="?act=checkout" method="POST" style="display:inline;">
        <input type="hidden" name="product_id" value="<?= $sp->id ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? 0 ?>">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="btn btn-success">Đặt hàng</button>
    </form> -->
        </div>
        
    </div>
</body>
</html>
