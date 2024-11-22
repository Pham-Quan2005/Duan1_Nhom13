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
                    <H3 class="text-center pt-3 text-light">Đăng nhập</H3>
                    <div class="mb-3 pe-3 pt-3 ps-3">
                        <input type="text" class="form-control" placeholder="Email" required name="email">
                    </div>
                    <div class="mb-3 pe-3 pt-3 ps-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" required name="password">
                    </div>
                    <div class="pe-3 pt-3 ps-3 d-flex justify-content-center">
                        <button type="submit" class="btn" name="submitLogin"
                            style="background-color: #F87537; color:#ffffff" href="">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php include "view/components/footer.php" ?>

    <!-- END FOOTER -->
</body>
</html>