<?php include "view/components/header.php" ?>
<!-- END HEADER -->
<!-- CONTENT -->
<main class="d-flex container">
    <!-- Sidebar trái -->
    <?php
    include "view/components/sidebar.php";
    ?>
    <!-- Main content -->
    <div class="shadow bg-light pb-5 mt-4 ms-4 mb-4 col-md-10">
        <form action="" class="pb-5 mt-4 ms-4 me-4" method="POST" enctype="multipart/form-data">
            <div>
                <h4 class="p-3">Thêm sản phẩm</h4>
            </div>
            <hr>
            <div class="row">
                <div class="">
                    <label for="inputEmail4" class="form-label">Ảnh sản phẩm</label>
                    <input type="file" name="image_upload" class="form-control rounded-0" id="inputEmail4">
                </div>
                <div class="">
                    <label for="inputEmail4" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control rounded-0" id="inputEmail4"
                        placeholder="Nhập tên sản phẩm">
                </div>
                <div class="">
                    <label for=" inputPassword4" class="form-label">Mô tả</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control"
                        placeholder="Mô tả"></textarea>
                </div>
                <div class="">
                    <label for="inputEmail4" class="form-label">Số lượng</label>
                    <input type="text" name="quantity" class="form-control rounded-0" id="inputEmail4"
                        placeholder="Nhập số lượng">
                </div>
                <div class="">
                    <label for="inputEmail4" class="form-label">Giá</label>
                    <input type="text" name="price" class="form-control rounded-0" id="inputEmail4"
                        placeholder="Nhập giá bán">
                </div>
                <div class="mt-3">
                    <span class="form-label">Danh mục sản phẩm:</span>
                    <select class="form-control" name="category_id">
                        <option value="">-- Lựa chọn --</option>
                        <?php
                        extract($listCategory);
                        foreach ($listCategory as $sp) : ?>
                            <option value="<?= $sp->id ?>"><?= $sp->name ?></option>
                        <?php endforeach; ?>
                        <!-- <option value="">PC Gaming</option>
                            <option value="">PC Văn phòng</option>
                            <option value="">Laptop</option>
                            <option value="">Màn hình máy tính</option> -->

                    </select>
                </div>
                <div class="mt-3">
                    <span class="form-label">Lựa chọn</span>
                    <div class="row ps-3 pt-2">
                        <!-- 1: còn hàng 0: hết hàng -->
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="status" value="1"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Còn hàng
                            </label>
                        </div>
                        <div class="form-check col-5">
                            <input class="form-check-input" type="radio" name="status" value="0"
                                id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Hết hàng
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="submit" name="submitFormCreateProduct" class="btn btn-success">Tạo mới</button>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- FOOTER -->

<!-- END FOOTER -->
</body>

</html>