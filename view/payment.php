<?php
include "view/components/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <!-- Your header content goes here -->
    </header>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Phương Thức Thanh Toán</h2>
                    </div>
                    <div class="card-body">
                        <div class="payment-method">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="index.php?act=checkout" class="btn btn-primary w-100">Thanh toán khi nhận hàng</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="online" class="btn btn-success w-100">Thanh toán online</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php' ?>

</body>
</html>
