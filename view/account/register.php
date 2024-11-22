<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán thức ăn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "view/components/header.php" ?>
    <!-- END HEADER -->
    <!-- CONTENT -->
    <main class="container">
        <!-- Main content -->
        <div class="container d-flex justify-content-center">
            <div style="width: 50%; background-color: #FBA81F; margin:20px 0;" class="rounded-3">
                <form class="pb-2 bg-opacity-50" method="POST">
                    <H3 class="text-center pt-3 text-light">Đăng kí</H3>

                    <div class="mb-3 pe-3 pt-3 ps-3">
                        <input type="text" class="form-control" id="LastNameInput" placeholder="Tên" name="name">
                        <span class="text-danger"><?= isset($thongBaoLoi['name']) ? $thongBaoLoi['name'] : "" ?></span>
                    </div>
                    <div class="mb-3 pe-3 pt-3 ps-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Email" name="email">
                        <span class="text-danger"><?= isset($thongBaoLoi['email']) ? $thongBaoLoi['email'] : "" ?></span>
                    </div>
                    <div class="mb-3  pe-3 pt-3 ps-3">
                        <input type="text" class="form-control" placeholder="Địa Chỉ" name="address">
                        <span
                            class="text-danger"><?= isset($thongBaoLoi['address']) ? $thongBaoLoi['address'] : "" ?></span>
                    </div>
                    <div class="mb-3  pe-3 pt-3 ps-3">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu"
                            name="password">
                        <span
                            class="text-danger"><?= isset($thongBaoLoi['password']) ? $thongBaoLoi['password'] : "" ?></span>
                    </div>
                    <div class="mb-3  pe-3 pt-3 ps-3">
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Nhập Lại Mật khẩu" name="rPassword">
                        <span
                            class="text-danger"><?= isset($thongBaoLoi['rPassword']) ? $thongBaoLoi['rPassword'] : "" ?></span>
                    </div>
                    <div class="pe-3 pt-3 ps-3 d-flex justify-content-center">
                        <button type="submit" class="btn" name="submitRegister"
                            style="background-color: #F87537; color:#ffffff">
                            Đăng kí
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php include_once "view/components/footer.php" ?>
    <!-- END FOOTER -->
</body>

</html>