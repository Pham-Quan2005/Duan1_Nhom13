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

    public function all_account()
    {
        $listCategory = $this->categoryQuery->all_category();
        //goi model
        $listAccount = $this->accountQuery->all_account();
        //hiện vào viêw
        include "view/account/list.php";
    }

    public function deleteAcc($id)
    {
        if ($id !== "") {
            $ketQua = $this->accountQuery->delete($id);

            if ($ketQua === "ok") {
                header("Location: ?act=list-account");
            } else {
                echo "Xoá thất bại";
            }
        } else {
            echo " tham số id trống. Mời xem lại";
        }
    }
    public function CreateAcc()
    {
        $listCategory = $this->categoryQuery->all_category();

        $listAccount = $this->accountQuery->all_account();

        if (isset($_POST['submitFormCreateAcc'])) {
            $account = new Account();
            $account->name = trim($_POST['name']);
            $account->address = trim($_POST['address']);
            $account->email = trim($_POST['email']);
            $account->password = trim($_POST['password']);

            $relust = $this->accountQuery->insert($account);

            if ($relust === "ok") {
                echo "tạo mới thành công";
                header("Location: ?act=list-account");
            } else {
                echo "tạo mới thất bại";
            }
        }
        include "view/account/create.php";
    }

    public function Update($id)
    {
        if (!isset($_GET['id'])) {
            $category_id = 0;
        } else {
            $category_id = $_GET['id'];
        }
        $updateAcc = $this->accountQuery->getOneAcc($category_id);

        $listCategory = $this->categoryQuery->all_category();

        $listAccount = $this->accountQuery->all_account();

        if ($id !== "") {

            if (isset($_POST['submitFormCreateAcc'])) {
                $account = new Account();
                $account->name = trim($_POST['name']);
                $account->address = trim($_POST['address']);
                $account->email = trim($_POST['email']);
                $account->password = trim($_POST['password']);
                $account->role = trim($_POST['role']);

                $ketQua = $this->accountQuery->update($id, $account);

                if ($ketQua === "ok") {
                    echo "tạo thành công";
                    header("Location: ?act=list-account");
                } else {
                    echo "chỉnh sửa thất bại";
                }
            }
        } else {
            echo " tham số id trống. Mời xem lại";
        }
        include "view/account/update.php";
    }
    public function logout()
    {


        session_destroy();
        header("Location: ?act=login");
    }
}
