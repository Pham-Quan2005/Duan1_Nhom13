<?php
class AccountQuery
{

    public $pdo;


    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct() {}

    // viết hàm kiểm tra thông tin người dùng nhập vào

    public function checkLogin($email, $password)
    {
        try {
            $sql = "SELECT * FROM `account` WHERE email = '$email' and password = '$password';";
            $data = $this->pdo->query($sql)->fetch();
            // trường hợp k tìm thấy tài khoẻn $data = false / 0
            if ($data === false) {
                return $data;
            } else {
                // chuyển đổi -> object 
                $account = new Account();
                $account->id = $data['id'];
                $account->name = $data['name'];
                $account->email = $data['email'];
                $account->password = $data['password'];
                $account->role = $data['role'];
                return $account;
            }
        } catch (Exception $e) {
            echo "Lỗi //" . $e->getMessage();
            echo "<hr>";
        }
    }
    public function insert(Account $account)
    {
        try {
            $sql = "INSERT INTO `account`(`id`, `name`, `address`, `email`, `password`) VALUES (NULL,'$account->name','$account->address','$account->email','$account->password');";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi //" . $e->getMessage();
            echo "<hr>";
        }
    }
}
