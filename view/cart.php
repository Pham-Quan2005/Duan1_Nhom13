<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
        include "view/components/header.php";
    ?>
    <!-- END HEADER -->
    <!-- CONTENT -->
    <main class="container">
        <!-- Main content -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col" class="text-center">Đơn Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Số Tiền</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php  
                if(isset($_SESSION['myCart'])){

                foreach($_SESSION['myCart'] as $sp) :
                ?>
                <tr>
                    <th scope="row" style="width: 50%;">
                        <input type="checkbox" class="me-2">
                        <img src="<?= BASE_URL . $sp["image_src"] ?>" width="10%" alt="">
                        <span><?= $sp["name"] ?></span>
                    </th>
                    <td>
                        <div class="d-flex text-center">
                            <span class="text-black fw-bold pe-2"><?= $sp["price"] ?></span>
                        </div>
                    </td>
                    <td>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination d-flex">
                                <li class="page-item">
                                    <a class="page-link text-success" aria-label="Next">
                                        <span> - </span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link text-success" href="#">1</a></li>
                                <li class="page-item">
                                    <a class="page-link text-success" aria-label="Previous">
                                        <i class="fa-solid fa-plus fa-xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </td>
                    <td><?= $sp["total"] ?></td>
                    <td>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                <?php  endforeach; }?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <input type="checkbox" class="me-3">
                <span class="me-3">Chọn tất cả(3)</span>
                <button class="btn btn-danger">Xóa</button>
            </div>
            <div class="d-flex">
                <div>
                    <span><b>Tổng tiền: </b>1.000.000đ</span>
                </div>
                <a href="./XacNhanSp.html" style="width: 100%; height: 35px;">
                    <button class="btn btn-success">Mua hàng</button>
                </a>
            </div>
        </div>
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php
        include "view/components/footer.php";
    ?>
    <!-- END FOOTER -->
</body>

</html>