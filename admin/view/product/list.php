<?php
include "view/components/header.php";
?>
<!-- END HEADER -->
<!-- CONTENT -->
<main class="d-flex container">
    <!-- Sidebar trái -->
    <?php
    include "view/components/sidebar.php";
    ?>
    <!-- Main content -->
    <div class="shadow bg-light pb-5 mt-4 ms-4 mb-4 col-md-10">
        <h4 class="p-3">Danh sách sản phẩm</h4>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <form action="" class="ms-4">
                <div class="input-group input-group-sm">
                    <input class="form-control rounded-0 mb-2" type="search" id="search" name="search"
                        placeholder="Nhập từ khóa tìm kiếm" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                    <div class="input-group-sm">
                        <button type="button" class="btn btn-secondary rounded-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="me-4">
                <button class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    <a href="?act=create-pro" class="text-light">Thêm</a>
                </button>
                <button class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    <a href="" class="text-light">Xóa</a>
                </button>
            </div>
        </div>


        <div class="pt-4 ms-4 me-4">
            <table class="table table-striped table-hover table-bordered">
                <thead>

                    <tr>
                        <th></th>
                        <th scope="col">Stt</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    extract($danhSachSp);
                    foreach ($danhSachSp as $sp) :
                    ?>
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">
                                <?= $sp->id ?></td>
                            <td>
                                <div style="width:190px; height:150px">
                                    <img src="<?= $sp->image_src ?>" alt="icon"
                                        style="width:100%; height:100%">
                                </div>
                            </td>
                            <td>
                                <div
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $sp->name ?>
                                </div>
                            </td>
                            <td> <?= $sp->quantity ?></td>
                            <td> <?= $sp->price ?></td>
                            <td>
                                <div
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $sp->category_id ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                if ($sp->status == 1) {
                                    echo '<span class="badge bg-success">Còn hàng</span>';
                                } else {
                                    echo '<span class="badge bg-danger">hết hàng</span>';
                                }
                                ?>


                            </td>
                            <td>
                                <button class="btn btn-success">
                                    <a href="?act=update-pro&id=<?= $sp->id ?>" class="text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="?act=delete-pro&id=<?= $sp->id ?>" class="text-white">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </button>
                            </td>
                        </tr>
                    <?php
                    endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End main content -->
</main>
<!-- FOOTER -->

<!-- END FOOTER -->
</body>

</html>