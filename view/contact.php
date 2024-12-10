<?php include "view/components/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
</head>
<body>

<div class="container_cart">
    <div class="left-box-bill">
    <div class="contact-form">
        <form>
            <label for="name">Họ và Tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Nội dung:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Gửi</button>
        </form>
    </div>
</div>

<div class="right-box-bill">
        <h3>Thông tin liên hệ</h3>
        <p>
            <span>Địa chỉ:</span>
            <span>13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</span>
        </p>
        <p>
            <span>Email:</span>
            <span>hotb@fpt.edu.vn</span>
        </p>
        <p>
            <span>Số điện thoại:</span>
            <span>0123456789</span>
        </p>
        <p>
            <span>Website:</span>
            <span>caodang.fpt.edu.vn</span>
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863931182066!2d105.74468687503175!3d21.038129780613545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1733103561052!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        

</div>
</div>
<?php include "view/components/footer.php"; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .container_cart {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .left-box-bill, .right-box-bill {
        flex: 1;
        min-width: 300px;
        margin: 10px;
    }

    .contact-form {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .contact-form form {
        display: flex;
        flex-direction: column;
    }

    .contact-form label {
        font-weight: bold;
        margin-bottom: 5px;
        margin-top: 15px;
    }

    .contact-form input, 
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .contact-form button {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .contact-form button:hover {
        background-color: #0056b3;
    }

    .right-box-bill {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .right-box-bill h3 {
        margin-bottom: 15px;
        font-size: 20px;
        color: #333;
    }

    .right-box-bill p {
        margin: 5px 0;
        font-size: 16px;
        color: #555;
    }

    .right-box-bill span:first-child {
        font-weight: bold;
        color: #000;
    }

    iframe {
        margin-top: 20px;
        border-radius: 8px;
        border: none;
    }

    @media (max-width: 768px) {
        .container_cart {
            flex-direction: column;
        }

        .left-box-bill, .right-box-bill {
            margin: 0 0 10px 0;
        }
    }
</style>

</body>
</html>
