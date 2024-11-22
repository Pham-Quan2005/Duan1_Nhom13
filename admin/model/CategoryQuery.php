<?php

class CategoryQuery
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

    public function all_category()
    {
        try {
            $sql = "SELECT * FROM category";

            $data = $this->pdo->query($sql)->fetchAll();

            $listCategory = [];

            foreach ($data as $row) {
                $listCategory[] = converToObjectCategory($row);
            }
            return $listCategory;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getOneCate($pro_id)
    {

        //gọi model lấy danh sách sản phẩm
        // $listCategory = $this->categoryQuery->all_category();
        try {
            $sql = "SELECT * FROM category WHERE 1";
            if ($pro_id > 0) {
                $sql .= " AND id = " . $pro_id;
            }
            // $sql .= " ORDER BY id LIMIT " . $quantity;

            $data = $this->pdo->query($sql)->fetchAll();

            $ds = [];

            foreach ($data as $row) {
                $product = converToObjectCategory($row);
                $ds[] = $product;
            }
            return $ds;
        } catch (Exception $e) {
            echo "Lỗi//" . $e->getMessage();
            echo "<hr>";
        }
        //hiện thị view tương ứng 
        include "view/category/update.php";
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM category WHERE id = $id";

            $data = $this->pdo->exec($sql);

            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function insert(Category $category)
    {
        try {
            $sql = "INSERT INTO `category`(`id`, `name`, `image_src`, `status`) VALUES (NULL,'$category->name','$category->image_src','$category->status')";


            $data = $this->pdo->exec($sql);

            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function find($id)
    {
        try {
            $sql = "SELECT * FROM category WHERE id = $id";

            $data = $this->pdo->query($sql)->fetch();

            if ($data !== false) {
                $category = new Category();
                $category->id = $data['id'];
                $category->name = $data['name'];
                $category->image_src = $data['image_src'];
                $category->status = $data['status'];

                return $category;
            } else {
                echo "bảng ghi không tồn tại";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function update($id, Category $category)
    {
        try {
            $sql = "UPDATE `category` SET `name`='$category->name',`image_src`='$category->image_src',`status`='$category->status' WHERE id = $id";


            $data = $this->pdo->exec($sql);

            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
