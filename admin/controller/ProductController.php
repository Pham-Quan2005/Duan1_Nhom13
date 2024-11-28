<?php
class  ProductController
{
    public $productQuery;
    public $categoryQuery;
    public $pdo;
    public function __construct()
    {
        $this->productQuery = new ProductQuery();
        $this->categoryQuery = new CategoryQuery();
        $this->pdo = connectDB();
    }

    public function __destruct() {}

    public function list()
    {

        //gọi model lấy danh sách sản phẩm
        $danhSachSp = $this->productQuery->all();
        $listCategory = $this->categoryQuery->all_category();

        //hiện thị view tương ứng 
        include "view/product/list.php";
    }
    public function showPro()
    {
        if (!isset($_GET['id'])) {
            $category_id = 0;
        } else {
            $category_id = $_GET['id'];
        }
        //gọi model lấy danh sách sản phẩm
        $listCategory = $this->categoryQuery->all_category();
        $listProduct = $this->productQuery->getCate($category_id);
        //hiện thị view tương ứng 
        include "../view/productCate.php";
    }
    public function showCreate()
    {
        $listCategory = $this->categoryQuery->all_category();

        // thực hiện xử lý logic 
        // ktra nut tao
        if (isset($_POST['submitFormCreateProduct'])) {
            // lấy dữ liệu -> object
            $product = new Product();
            $product->name = trim($_POST['name']);
            $product->price = trim($_POST['price']);
            $product->description = trim($_POST['description']);
            $product->status = trim($_POST['status']);
            $product->quantity = trim($_POST['quantity']);
            $product->category_id = trim($_POST['category_id']);

            if (isset($_FILES['image_upload']) && $_FILES['image_upload']['tmp_name']) {
                // Kiểm tra và lấy tệp ảnh tải lên
                $image = $_FILES['image_upload']['tmp_name'];
                // Đường dẫn nơi lưu ảnh
                $target_dir = "../upload/";
                // Tên ảnh sau khi tải lên, có thể thay đổi tên để tránh trùng
                $target_file = $target_dir . basename($_FILES['image_upload']['name']);
                
                // Kiểm tra nếu tệp là ảnh
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowedTypes = array("jpg", "jpeg", "png", "gif");
                if (!in_array($imageFileType, $allowedTypes)) {
                    echo "Chỉ chấp nhận ảnh định dạng JPG, JPEG, PNG hoặc GIF.";
                    exit;
                }
                
                // Kiểm tra nếu ảnh đã được tải lên thành công
                if (move_uploaded_file($image, $target_file)) {
                    echo "Upload ảnh thành công.";
                    // Cập nhật đường dẫn ảnh cho sản phẩm
                    $product->image_src = $target_file;
                } else {
                    echo "Upload thất bại.";
                }
            } else {
                echo "Không có tệp ảnh nào được tải lên.";
            }

            $result = $this->productQuery->create($product);
            if ($result === "Ok") {
                //quay về trang danh sách

                header("Location: ?act=list-product");
            } else {
                echo "tạo mới thất bại. Mời kiểm tra";
            }
        }

        include "view/product/create.php";
    }
    public function detail($id)
    {
        try {
            $sql = "SELECT * FROM `product` WHERE id =$id";

            $data = $this->pdo->query($sql)->fetch();

            if ($data !== false) {

                $product = new Product();
                $product->id = $data['id'];
                $product->name = $data['name'];
                $product->description = $data['description'];
                $product->price = $data['price'];
                $product->quantity = $data['quantity'];
                $product->image_src = $data['image_src'];
                $product->category_id = $data['category_id'];
                $product->status = $data['status'];

                return $product;
                header('location: view/product/detail');
            } else {
                echo "bảng ghi không tồn tại";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    public function deletePro($id)
    {
        $listCategory = $this->categoryQuery->all_category();


        if ($id !== "") {
            $ketQua = $this->productQuery->delete($id);

            if ($ketQua === "ok") {

                header("Location: ?act=list-product");
            } else {
                echo "Xoá thất bại";
            }
        } else {
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
        }
    }

    public function Update($id)
    {
        if (!isset($_GET['id'])) {
            $category_id = 0;
        } else {
            $category_id = $_GET['id'];
        }
        $listCategory = $this->categoryQuery->all_category();
        $listProduct = $this->productQuery->getPro($category_id);

        if ($id !== "") {
            $product = new Product();

            $product = $this->productQuery->find($id);

            if (isset($_POST['submitFormCreateProduct'])) {
                // lấy dữ liệu -> object
                $product = new Product();
                $product->name = trim($_POST['name']);
                $product->price = trim($_POST['price']);
                $product->description = trim($_POST['description']);
                $product->status = trim($_POST['status']);
                $product->quantity = trim($_POST['quantity']);
                $product->category_id = trim($_POST['category_id']);

                if (isset($_FILES['image_upload']) && $_FILES['image_upload']['tmp_name']) {
                    $image = $_FILES['image_upload']['tmp_name'];
                    $vi_tri_luu_anh = "../upload/" . $_FILES['image_upload']['name'];

                    if (move_uploaded_file($image, $vi_tri_luu_anh)) {
                        echo "upload ảnh thành công";
                        $product->image_src = '../upload/' . $_FILES['image_upload']['name'];
                    } else {
                        echo "upload thất bại";
                    }
                }

                $result = $this->productQuery->update($id, $product);
                if ($result === "ok") {
                    //quay về trang danh sách

                    header("Location: ?act=list-product");
                } else {
                    echo "Chỉnh Sửa thất bại. Mời kiểm tra";
                }
            }

            include "view/product/update.php";
        } else {
            echo " Lỗi tham số id trông . Mời bạn nhập lại";
        }
    }
}
