<?php include "view/components/header.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="styles.css">  <!-- Liên kết đến file CSS để tạo kiểu cho trang -->
</head>
<body>

    <!-- Phần nội dung chính của trang About -->
    <section class="about-section">
        <div class="container">
            <h1>Về Chúng Tôi</h1>
            <p>Chào mừng đến với <strong>[Tên Doanh Nghiệp]</strong> – nơi hội tụ những món ăn thượng hạng, được chế biến từ nguyên liệu tươi ngon và chất lượng cao nhất. Chúng tôi cam kết mang đến cho bạn những trải nghiệm ẩm thực tuyệt vời, từ các món ăn đẳng cấp đến dịch vụ khách hàng tận tâm.</p>

            <h2>Sứ Mệnh của Chúng Tôi</h2>
            <p>Tại <strong>[Tên Doanh Nghiệp]</strong>, sứ mệnh của chúng tôi là mang đến những món ăn không chỉ thỏa mãn vị giác mà còn nâng tầm trải nghiệm ẩm thực của bạn. Chúng tôi luôn tìm kiếm những nguyên liệu tốt nhất từ khắp nơi trên thế giới, kết hợp với tay nghề của đội ngũ đầu bếp chuyên nghiệp để tạo ra những món ăn hoàn hảo, đáp ứng yêu cầu của những thực khách khó tính nhất.</p>

            <h2>Nguyên Liệu Chất Lượng</h2>
            <p>Mỗi món ăn tại <strong>[Tên Doanh Nghiệp]</strong> đều được chế biến từ những nguyên liệu tươi ngon và cao cấp. Chúng tôi lựa chọn kỹ lưỡng từ các nhà cung cấp uy tín, đảm bảo rằng mỗi món ăn đều có hương vị tuyệt vời, dinh dưỡng đầy đủ và an toàn cho sức khỏe.</p>

            <h2>Đội Ngũ Đầu Bếp</h2>
            <p>Đội ngũ đầu bếp của chúng tôi là những chuyên gia ẩm thực, được đào tạo bài bản và có kinh nghiệm nhiều năm trong ngành. Họ không chỉ là những người tạo ra món ăn ngon mà còn là những nghệ sĩ trong việc biến mỗi bữa ăn thành một tác phẩm nghệ thuật đầy sáng tạo.</p>

            <h2>Trải Nghiệm Khách Hàng</h2>
            <p>Chúng tôi hiểu rằng mỗi bữa ăn không chỉ là việc thưởng thức thức ăn mà còn là một trải nghiệm. Vì vậy, chúng tôi cam kết mang đến cho bạn không gian ấm cúng, sang trọng và dịch vụ chuyên nghiệp, tận tình.</p>

            <p><strong>Hãy đến với chúng tôi và để <strong>[Tên Doanh Nghiệp]</strong> mang đến cho bạn những bữa ăn tuyệt vời!</strong></p>
        </div>
    </section>

    <?php
      include "view/components/footer.php";
    ?>
 <style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body - Cơ bản */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
    padding-top: 50px;  /* Khoảng cách trên cùng */
}

/* Container chứa toàn bộ nội dung */
.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

/* Tiêu đề chính */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 36px;
}

/* Các tiêu đề phụ */
h2 {
    color: #333;
    font-size: 28px;
    margin-top: 30px;
    margin-bottom: 10px;
}

/* Đoạn văn bản nội dung */
p {
    font-size: 18px;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.8;
}

/* Section cho trang About */
.about-section {
    background-color: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

/* Phần thân chính */
.about-section .container {
    max-width: 900px;
}

/* Phần hình ảnh trong About - nếu có */
.about-section img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Phần footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
    position: absolute;
    bottom: 0;
    width: 100%;
}

/* Đảm bảo các thẻ a được định dạng đẹp */
a {
    text-decoration: none;
    color: inherit;
}

a:hover {
    color: #f4a261; /* Màu sắc khi hover */
}

/* Điều chỉnh cho màn hình di động */
@media (max-width: 768px) {
    .container {
        width: 90%;
    }

    h1 {
        font-size: 28px;
    }

    h2 {
        font-size: 24px;
    }

    p {
        font-size: 16px;
    }
}</style>
</body>
</html>