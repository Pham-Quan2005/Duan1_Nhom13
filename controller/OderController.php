<?php
require_once 'model/OderQuery.php';

class OderController {
    private $oderModel;

    public function __construct() {
        $this->oderModel = new OderQuery(); // Đảm bảo `OderQuery` đã được định nghĩa đúng
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addOder() {
        if (!empty($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $productId = $_POST['product_id'] ?? 0;
            $quantity = $_POST['quantity'] ?? 1;
            $status = 'Chờ giao hàng'; // Đặt trạng thái mặc định là

            if ($productId <= 0 || $quantity <= 0) {
                echo "<script>alert('Dữ liệu không hợp lệ!'); window.history.back();</script>";
                return;
            }

            if ($this->oderModel->addToOder($userId, $productId, $quantity, $status)) {
                echo "<script>alert('Đặt hàng thành công!'); window.location.href='?act=viewOder';</script>";
            } else {
                echo "<script>alert('Đặt hàng thất bại!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Bạn chưa đăng nhập.'); window.location.href='?act=login';</script>";
        }
    }

    // Hiển thị giỏ hàng
    public function viewOder() {
        // if (empty($_SESSION['user_id'])) {
        //     echo "<script>alert('Bạn cần đăng nhập để xem đơn hàng.'); window.location.href='?act=login';</script>";
        //     return;
        // }

        $userId = $_SESSION['user_id'];
        $oder = $this->oderModel->getOder($userId); // Lấy dữ liệu giỏ hàng từ model
        require_once 'view/Oder.php'; // Hiển thị view giỏ hàng
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeOder() {
        $userId = $_SESSION['user_id'] ?? 0;
        $productId = $_POST['product_id'] ?? 0;

        if ($userId === 0 || $productId === 0) {
            echo "<script>alert('Dữ liệu không hợp lệ!'); window.history.back();</script>";
            return;
        }

        if ($this->oderModel->removeFromOder($userId, $productId)) {
            header("Location: ?act=viewOder");
        } else {
            echo "<script>alert('Không thể xóa sản phẩm!'); window.history.back();</script>";
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateOder() {
        $userId = $_SESSION['user_id'] ?? 0;
        $productId = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;

        if ($userId === 0 || $productId === 0 || $quantity < 1) {
            echo "<script>alert('Dữ liệu không hợp lệ!'); window.history.back();</script>";
            return;
        }

        if ($this->oderModel->updateQuantityOder($userId, $productId, $quantity)) {
            header("Location: ?act=viewOder");
        } else {
            echo "<script>alert('Không thể cập nhật số lượng sản phẩm!'); window.history.back();</script>";
        }
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatusOder() {
        $userId = $_SESSION['user_id'] ?? 0;
        $productId = $_POST['product_id'] ?? 0;
        $status = $_POST['status'] ?? '';

        if ($userId === 0 || $productId === 0 || !in_array($status, ['Chờ giao hàng', 'Đang giao hàng', 'Đã giao hàng'])) {
            echo "<script>alert('Dữ liệu không hợp lệ!'); window.history.back();</script>";
            return;
        }

        if ($this->oderModel->updateStatusOder($userId, $productId, $status)) {
            echo "<script>alert('Cập nhật trạng thái thành công!'); window.location.href='?act=viewOder';</script>";
        } else {
            echo "<script>alert('Không thể cập nhật trạng thái!'); window.history.back();</script>";
        }
    }
}
?>
