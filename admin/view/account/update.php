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
                <h4 class="p-3">Chỉnh Sửa Tài Khoản</h4>
            </div>
            <hr>
            <div class="row">
                <?php
                extract($updateAcc);
                foreach ($updateAcc as $acc) {
                ?>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control rounded-0" id="inputEmail4" placeholder="<?= $acc->name ?>">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control rounded-0" id="inputEmail4"
                            placeholder="<?= $acc->address ?>">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control rounded-0" id="inputEmail4"
                            placeholder="<?= $acc->email ?>">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control rounded-0" id="inputEmail4"
                            placeholder="<?= $acc->password ?>">
                    </div>
                <?php } ?>
                <div class="mt-3">
                    <span class="form-label">Lựa chọn Quyền</span>
                    <div class="row ps-3 pt-2">
                        <!-- 1: còn hàng 0: hết hàng -->
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="role" value="1"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                1
                            </label>
                        </div>
                        <div class="form-check col-5">
                            <input class="form-check-input" type="radio" name="role" value="0"
                                id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                0
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="submit" name="submitFormCreateAcc" class="btn btn-success">Chỉnh sửa</button>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- FOOTER -->

<!-- END FOOTER -->
</body>

</html>