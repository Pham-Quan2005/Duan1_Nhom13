<?php
class AccountController
{

    public $accountQuery;
    public $categoryQuery;


    public function __construct()
    {
        $this->accountQuery = new AccountQuery();
        $this->categoryQuery = new CategoryQuery();
    }

    public function __destruct() {}
    public function admin()
    {
        $listCategory = $this->categoryQuery->all_category();
        // xử lý logic login
        // lấy thông tin email và pasword ng=người dùng nhập vào
        //lưu thong tin đăng nhập
        if (($_SESSION['user_name']) !== '' && ($_SESSION['user_email']) !== '') {
            header('Location: admin/index.php');
        } else {
            echo "<script>alert('Bạn không phải là quản trị viên !!!');</script>";
            header('location: index.php');
        }
    }
    public function login()
    {
        $listCategory = $this->categoryQuery->all_category();
        // xử lý logic login
        // lấy thông tin email và pasword ng=người dùng nhập vào
        if (isset($_POST['submitLogin'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            //gọi hàm checkLogin
            $result = $this->accountQuery->checkLogin($email, $password);
            if ($result === false) {
                echo "<script>alert('sai mật khẩu hoăc tài khoản');</script>";
            } else {
                //lưu thong tin đăng nhập
                $_SESSION['user_name'] = $result->name;
                $_SESSION['user_email'] = $result->email;
                $_SESSION['user_id'] = $result->id;
                $_SESSION['user_role'] = $result->role;

                // if ($result->role === 1) {
                //     header('Location: admin/index.php');
                // } else {
                //     header('location: index.php');
                // }
                header('location: index.php');
            }
        }


        //hiện thị nlogin 
        include "view/account/login.php";
    }


    public function register()
    {
        $listCategory = $this->categoryQuery->all_category();

        $thongBaoLoi = [];
        if (isset($_POST['submitRegister'])) {
            $account = new Account();

            $account->name =  trim($_POST['name']);
            $account->email = trim($_POST['email']);
            $account->address = trim($_POST['address']);
            $account->password = trim($_POST['password']);
            $rPassword = trim($_POST['rPassword']);

            if ($account->name === "") {
                $thongBaoLoi['name'] = "không được để trống";
            }
            if ($account->email === "") {
                $thongBaoLoi['email'] = "không được để trống email";
            }
            if ($account->address === "") {
                $thongBaoLoi['address'] = "khôn g được để trống address";
            }
            if ($account->password === "") {
                $thongBaoLoi['password'] = "không được để trống password";
            }
            if ($rPassword != $account->password) {
                $thongBaoLoi['rPassword'] = "Mật khẩu nhập lại không đúng";
            }
            if (empty($thongBaoLoi)) {

                $ketQua = $this->accountQuery->insert($account);

                if ($ketQua === "ok") {
                    header("Location: ?act=login");
                    exit();
                } else {
                    echo 'Đăng ký thất bại';
                }
            }
        }
        include "view/account/register.php";
    }
    public function logout()
    {
        session_destroy();
        header("Location: ?act=login");
    }
    public function profile()
{
    // Kiểm tra người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user_id'])) {
        header("Location: ?act=login"); // Chuyển về trang đăng nhập nếu chưa đăng nhập
        exit();
    }

    // Lấy thông tin tài khoản từ database
    $userId = $_SESSION['user_id'];
    $userInfo = $this->accountQuery->getAccountInfo($userId);

    // Kiểm tra dữ liệu và chuyển sang giao diện
    if ($userInfo) {
        include "view/account/checkout.php"; // Gọi file view hiển thị
    } else {
        echo "Không tìm thấy thông tin tài khoản.";
    }
}
    
}
