<?php
include_once 'components/header.php';
?>
<!-- CONTENT -->
<main class="container">
    <!-- Main content -->
    <div class="shadow bg-light mt-4 ms-4 mb-4 p-4">
        <h2 class="" style="text-align: center;">Danh sách sản phẩm</h4>
            <hr>
            <!-- Sản phẩm bán chạy -->
            <hr>
            <div class="row">
                <!-- Box sản phẩm -->
                <?php
                extract($listProduct);
                foreach ($listProduct as $sp) { ?>
                    <div class="col-3">
                        <div class="border rounded-3 mb-3 overflow-hidden">
                            <!-- ẢNh -->
                            <!-- Hiển thị ảnh dạng nâng cao -->

                            <div class="bg-danger ratio-1x1">
                                <img src="<?= $sp->image_src ?>" alt="" class="mw-100 mh-100" style="width: 285px;height: 180px">
                            </div>
                            <!-- Text và button -->
                            <div class="p-2">
                                <h5 style="height: 50px; text-align: center"><?= $sp->name ?></h5>
                                <div class="mb-3" style="text-align: center; color: red; font-size:larger">
                                    <span class=""><?= $sp->price ?></span>
                                </div>
                                <button class="btn btn-danger rounded-pill w-100 btn-sm mt-1" name="detail1"><a href="?act=detail&id=<?= $sp->id ?>">Xem chi tiết</a></button>
                                <button class="btn btn-danger rounded-pill w-100 btn-sm mt-1">Mua ngay</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Hết box sản phẩm -->
            </div>
            <!-- Hết sản phẩm -->
    </div>
    <!-- End main content -->
</main>
<?php
include_once 'components/footer.php';
?>