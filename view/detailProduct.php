<?php include 'components/header.php'; ?>
<!-- END HEADER -->
<!-- CONTENT -->
<main class="container">
    <!-- Main content -->
    <?php
    extract($detailPro);
    foreach ($detailPro as $sp) { ?>
        <div class="row p-4">
            <div class="col-md-4 rounded-2">
                <img src="<?= $sp->image_src ?>" class="rounded-4" alt="" width="100%">
            </div>

            <div class="col-md-6 d-flex justify-content-center flex-column">
                <h3 class="fw-bold fs-2"><?= $sp->name ?></h3>
                <h2 class="text-danger fw-bold pe-2 fs-5s"><?= $sp->price ?> VNĐ</h2>
                <div class="d-flex align-items-center">
                    <span class="badge bg-success rounded-pill ps-2 ms-3"><?= $sp->status ?></span>
                </div>
                <br>
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
                <span>Số Lượng: <?= $sp->quantity ?> con</span>
                <br>
                <div>
    <a href="#"><button class="btn btn-success">Mua ngay</button></a>
    <form action="?act=cart&action=add" method="POST" style="display:inline;">
        <input type="hidden" name="product_id" value="<?= $sp->id ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? 0 ?>">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
    </form>
</div>
                <br>
                <div class="border-top">
                    <span class=" pt-1">Danh Mục: <?= $sp->category_id ?></span>
                </div>
                <br>
            </div>
        </div>
        <!-- End main content -->
        <!-- Product description -->
        <h3>Mô tả sản phẩm</h3>
        <hr>
        <p>
            <?= $sp->description ?>
        </p>
    <?php } ?>
</main>
<!-- FOOTER -->
<?php include 'components/footer.php'; ?>