<?php
include "view/components/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <header>
        
    </header>
    <div class="container_cart">
        <div class="right-box-bill">
            <h2>Phương Thức Thanh Toán</h2>
            <div class="payment-method">
                <table>
                    <tr>
                        <td>
                        <p><a href="index.php?act=checkout">Thanh toán khi nhận hàng </a></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="creditCard"><a href="online">Thanh toán online </a></label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php' ?>
</body>
</html>
