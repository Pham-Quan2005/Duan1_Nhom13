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
                <h4 class="p-3">Thêm Tài Khoản</h4>
            </div>
            <hr>
            <div class="row">
                <div class="">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên">
                </div>
                <div class="">
                    <label for="inputEmail4" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control rounded-0" id="inputEmail4"
                        placeholder="Nhập địa chỉ">
                </div>
                <div class="">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control rounded-0" id="inputEmail4"
                        placeholder="Nhập email">
                </div>
                <div class="">
                    <label for="inputEmail4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" id="inputEmail4"
                        placeholder="Nhập mật khẩu">
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="submit" name="submitFormCreateAcc" class="btn btn-success">Tạo mới</button>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- FOOTER -->

<!-- END FOOTER -->
</body>

</html>