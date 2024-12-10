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

        th,
        td {
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

        .status {
            font-weight: bold;
        }

        .status.pending {
            color: orange;
        }

        .status.confirmed {
            color: green;
        }

        .status.canceled {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel-heading" style="padding: 1rem 0;">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="?act=view">Giỏ hàng</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active">Lịch sử mua hàng</a>
                </li>
            </ul>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Tổng giá</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cart)) : ?>
                    <?php foreach ($cart as $item) : ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
                                    $orderId = $_POST['order_id'];

                                    // Gọi hàm để xóa đơn hàng
                                    if (deleteorder($orderId)) {
                                        echo "alert('Đơn hàng đã được xóa!');";
                                    }
                                }
                                // Lấy danh sách đơn hàng
                                $orders = getOrders();
                                ?>
                                <td><?= htmlspecialchars($item['product_name']) ?></td>
                                <td><?= htmlspecialchars($item['quantity']) ?></td>
                                <td><?= number_format($item['product_price'], 0, ',', '.') ?> VNĐ</td>
                                <td><?= number_format($item['product_price'] * $item['quantity'], 0, ',', '.') ?> VNĐ</td>
                                <td>
                                    <span class="status <?= htmlspecialchars($item['status']) ?>">
                                        <?= htmlspecialchars(ucfirst($item['status'])) ?>
                                    </span>
                                </td>
                                <td>
                                    <form action="?act=removeOder" method="POST" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id'] ?? 0) ?>">
                                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($item['product_id']) ?>">
                                        <button type="submit" class="btn-remove">Hủy đơn hàng</button>
                                    </form>
                                    <!-- Chỉnh sửa trạng thái -->
                                    <!-- <form action="?act=cart&act=updateStatus" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id'] ?? 0) ?>">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($item['product_id']) ?>">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" <?= $item['status'] === 'pending' ? 'selected' : '' ?>>Chờ xử lý</option>
                                    <option value="confirmed" <?= $item['status'] === 'confirmed' ? 'selected' : '' ?>>Xác nhận</option>
                                    <option value="canceled" <?= $item['status'] === 'canceled' ? 'selected' : '' ?>>Hủy</option>
                                </select>
                            </form> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Giỏ hàng của bạn hiện đang trống.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Hiển thị tổng giá trị giỏ hàng -->
    </div>
</body>

</html>