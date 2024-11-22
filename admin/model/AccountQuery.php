<?php
class AccountQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
    public function getOneAcc($pro_id)
    {

        //gọi model lấy danh sách sản phẩm
        // $listCategory = $this->categoryQuery->all_category();
        try {
            $sql = "SELECT * FROM account WHERE 1";
            if ($pro_id > 0) {
                $sql .= " AND id = " . $pro_id;
            }
            // $sql .= " ORDER BY id LIMIT " . $quantity;

            $data = $this->pdo->query($sql)->fetchAll();

            $ds = [];

            foreach ($data as $row) {
                $account = new Account();
                $account->id = $row['id'];
                $account->name = $row['name'];
                $account->address = $row['address'];
                $account->email = $row['email'];
                $account->role = $row['role'];
                $account->password = $row['password'];
                $ds[] = $account;
            }
            return $ds;
        } catch (Exception $e) {
            echo "Lỗi//" . $e->getMessage();
            echo "<hr>";
        }
        //hiện thị view tương ứng 
    }
    public function all_account()
    {
        try {
            $sql = "SELECT * FROM account";

            $data = $this->pdo->query($sql)->fetchAll();

            $listAccount = [];

            foreach ($data as $row) {
                $account = new Account();
                $account->id = $row['id'];
                $account->name = $row['name'];
                $account->address = $row['address'];
                $account->email = $row['email'];
                $account->password = $row['password'];
                $account->role = $row['role'];

                $listAccount[] = $account;
            }
            return $listAccount;
        } catch (Exception $e) {
            //throw $th;
        }
    }
    public function update($id, Account $account)
    {
        try {
            $sql = "UPDATE `account` SET `name`='$account->name',`address`='$account->address',`email`='$account->email',`password`='$account->password',`role`='$account->role' WHERE id = $id";


            $data = $this->pdo->exec($sql);

            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
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
            // xml_parse();
        } catch (Exception $e) {
            echo "Lỗi //" . $e->getMessage();
            echo "<hr>";
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM account WHERE id = $id";

            $data = $this->pdo->exec($sql);

            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
