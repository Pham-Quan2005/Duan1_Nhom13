
<?php
    include "view/components/header.php";
    ?>
     <div id="banner">
            <div class="box-left">
                <h2>
                    <span>THỨC ĂN</span>
                    <br>
                    <span>THƯỢNG HẠNG</span>
                </h2>
                <p>Chuyên cung cấp các món ăn đảm bảo dinh dưỡng
                    hợp vệ sinh đến người dùng,phục vụ người dùng 1 cái
                    hoàn hảo nhất</p>
                <button>Mua ngay</button>
            </div>
            <div class="box-right">
                <img src="assets/img_1.png" alt="">
                <img src="assets/img_2.png" alt="">
                <img src="assets/img_3.png" alt="">
            </div>
            <div class="to-bottom">
                <a href="">
                    <img src="assets/to_bottom.png" alt="">
                </a>
            </div>
        </div>
        <div id="wp-products">
        <div class="container">
    <div id="ant-layout">
    <section class="search-quan">
    <form action="index.php?act=productCate" method="get" class="d-flex">
        <div class="input-group">
            <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="<?= $_GET['keyword'] ?? '' ?>" />
            <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
        </div>
    </form>
</section>
    </div>
    </div>
            <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <main class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php
                extract($listProductLatest);
                foreach ($listProductLatest as $sp) : ?>
                    <!-- Box sản phẩm -->
                    <div class="col">
                        <div class="card">
                        <img src="./upload/<?=$sp->image_src?>" class="card-img-top w-100" style="height: 150px; object-fit: cover;" alt="<?= $sp->name ?>">
                            <div class="card-body flex-1">
                                <h5 class="card-title truncate"><?= $sp->name ?></h5>
                                <span class="fw-bold"><?= $sp->price ?>VND</span>
                                <!-- <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $sp->id ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="btn btn-danger rounded-pill w-100 btn-sm mt-1"><a href="?act=detail&id=<?= $sp->id ?>">Xem chi tiết</a></button>
                                    <a href="?act=checkout"><button class="btn btn-danger rounded-pill w-100 btn-sm mt-1">Đặt hàng</button></a>
                                </form> -->
                                <a href="?act=detail&id=<?= $sp->id ?>"> <button class="btn btn-danger rounded-pill w-100 btn-sm mt-1" name="detail1">Xem chi tiết</button></a>
                                <a href="?act=checkout"><button class="btn btn-danger rounded-pill w-100 btn-sm mt-1">Đặt hàng</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- Hết box sản phẩm -->
                <?php endforeach; ?>
            </div>
            </main>
            <div class="list-page">
                <div class="item">
                    <a href="">1</a>
                </div>
                <div class="item">
                    <a href="">2</a>
                </div>
                <div class="item">
                    <a href="">3</a>
                </div>
                <div class="item">
                    <a href="">4</a>
                </div>
            </div>
        </div>

        <div id="saleoff">
            <div class="box-left">
                <h1>
                    <span>GIẢM GIÁ LÊN ĐẾN</span>
                    <span>45%</span>
                </h1>
            </div>
            <div class="box-right"></div>
        </div>

        <div id="comment">
            <h2>NHẬN XÉT CỦA KHÁCH HÀNG</h2>
            <div id="comment-body">
                <div class="prev">
                    <a href="#">
                        <img src="assets/prev.png" alt="">
                    </a>
                </div>
                <ul id="list-comment">
                    <li class="item">
                        <div class="avatar">
                            <img src="assets/avatar_1.png" alt="">

                        </div>
                        <div class="stars">
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                        </div>
                        <div class="name">Nguyễn Đình Vũ</div>

                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type
                                specimen book.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="avatar">
                            <img src="assets/avatar_1.png" alt="">

                        </div>
                        <div class="stars">
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                        </div>
                        <div class="name">Trần Ngọc Sơn</div>

                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type
                                specimen book.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="avatar">
                            <img src="assets/avatar_1.png" alt="">

                        </div>
                        <div class="stars">
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                        </div>
                        <div class="name">Nguyễn Trần Vi</div>

                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type
                                specimen book.</p>
                        </div>
                    </li>
                </ul>
                <div class="next">
                    <a href="#">
                        <img src="assets/next.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <?php include 'components/footer.php' ?>
    </div>
    <script src="script.js"></script>
</body>

</html>