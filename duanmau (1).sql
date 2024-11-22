-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 21, 2024 lúc 09:45 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `address`, `email`, `role`, `password`) VALUES
(5, 'dodinhtruong', 'Ha Noi', 'dodinhtruong852005@gmail.com', 1, 'truong8525'),
(7, 'Du_an1', '221', 'quanpham0918@gmail.com', 1, '123456'),
(8, '474747', 'dfdfdf', 'quanpham0918@gmail.com', 0, '123456'),
(9, 'llklklkl', 'kljkjkjk', 'quanphajkjkm0918@gmail.com', 0, '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `account_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image_src`, `status`) VALUES
(1, 'Chó Cảnh', '../img/sanphamsan-phamcho2.jpg', '1'),
(2, 'Mèo Cảnh', '../img/sanphamsan-phammeo3.jpg', '1'),
(3, 'Cá Cảnh', '../img/sanphamcá rồng.jpg', '1'),
(5, '474747', '', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `image_src` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `quantity`, `image_src`, `category_id`, `status`) VALUES
(6, 'Chó Pug', 'Chó Pug được cho là đã xuất hiện từ thời nhà Hán (Trung Hoa) độ những năm 200 trước công nguyên. Chúng cao tầm 30 – 35cm, nặng không tới 10kg và có bộ lông ngắn nhiều màu ấn tượng (đen/nâu nhạt/vàng sẫm,...). Ngoài ra, đầu và mắt của chúng khá to, đặc biệt nhất là da mặt chảy xệ thành nếp, thích được vuốt ve và vui tính.', '6.000.000 – 25.000.000 ', 1600, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121500298598.jpg', 1, 1),
(7, 'Chó Alaska', 'Như tên gọi, chó Alaska vốn là loại chó kéo xe đến từ vùng Alaska ở Hoa Kỳ. Chúng thường cao tầm 55 – 70cm, nặng khoảng 35 – 50kg, thân hình khá to lớn, đôi mắt tựa hạt hạnh nhân và có màu lông rất đa dạng (xám trắng/đen trắng/nâu trắng,..). Alaska rất năng động, thân thiện và khá hiền lành.', '8.000.000 – 15.000.000 ', 1400, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121501444654.jpg', 1, 1),
(8, 'Chó Husky', 'Chó Husky là loài có xuất xứ từ khu vực Đông Bắc Siberia (Nga) tầm 3000 năm trước và được dạy để giúp con người di chuyển, vận chuyển hàng hóa. Chúng thường cao tầm 50 – 60cm, nặng khoảng 16 – 27kg, mắt cũng tựa hạt hạnh nhân, hơi xếch lên và có nhiều màu đa dạng (nâu/xanh dương/hổ phách/xanh lục,...).\r\nBộ lông của Husky vừa dài, vừa dày và cũng có màu đa dạng không kém như đen trắng/ nâu đỏ trắng/xám trắng,... Chúng có vẻ đẹp hơi giống chó sói nhưng lại vô cùng thân thiện, năng động và trung thành với chủ.', ' 6.000.000 – 10.000.000', 2200, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121502010322.jpg', 1, 1),
(9, 'Chó Samoyed', 'Chó Samoyed là loài chó săn đến từ vùng Siberia (Nga) có vẻ đẹp tựa “nàng bạch tuyết” bởi sở hữu bộ lông dài mượt trắng muốt, kiêu sa. Chúng thường cao khoảng 45 – 60cm, nặng tầm 16 – 30kg, tai tam giác với phần đỉnh hơi tù, luôn vểnh lên, đuôi cong cuộn tròn ở lưng, mắt hình hạnh nhân, rất đáng yêu, dễ gần và thông minh.', '6.000.000 – 9.000.000 ', 900, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121502180049.jpg', 1, 1),
(10, 'Chó Pomeranian (chó Phốc sóc)', 'Chó Pomeranian là loài có xuất xứ tại Âu châu có vẻ ngoài bé nhỏ, đôi mắt to tròn trông đáng yêu vô cùng. Chúng thường cao tầm dưới 15 – 30cm, nặng khoảng 1 – 3kg, hai má hóm, mõm nhỏ và có bộ lông dài với nhiều màu khác nhau (trắng/vàng/kem/nâu,...). Phốc sóc dễ dạy nhưng cũng khá tinh nghịch và thông minh.', '6.000.000 – 12.000.000 ', 650, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121502333310.jpg', 1, 1),
(11, 'Chó Beagle', 'Chó Beagle đã có mặt từ độ 2400 năm trước, đến thế kỷ XIX du nhập về Anh Quốc, rồi mới phổ biến ở mọi nơi. Chúng thường cao tầm 33 – 41cm, nặng khoảng 9 – 11kg, thân hình hơi vuông, tai cụp cùng bộ lông tam thể đặc trưng (trắng, đen và vàng nâu), luôn năng động, vui vẻ và có bản tính săn mồi (đối với mèo, thỏ, hamster,...).', ' 4.000.000 – 6.000.000 ', 1700, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121503320187.jpg', 1, 1),
(12, 'Chó Shiba Inu', 'Chó Shiba vốn nổi tiếng là giống chó đến từ Nhật Bản có vẻ mặt như đang cười, ngộ nghĩnh và rất thân thiện. Chúng thường cao tầm 33 – 43cm, nặng khoảng 8 – 10kg với hai lớp lông đặc trưng (bên ngoài thẳng cứng, còn phía trong mềm dày), đuôi khá dài, xù ra. Phổ biến nhất là Shiba lông vàng và nhiều màu khác như đen/nâu/xám,...', '20.000.000 – 45.000.000  ', 1600, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121503483790.jpg', 1, 1),
(13, 'Chó Golden Retriever', 'Chó Golden là giống có nguồn gốc từ Scotland, cực kỳ thân thiện, thông minh, hiền lành và yêu thích trẻ con. Chúng thường cao tầm 50 – 60 cm, nặng khoảng 25 – 35kg, đầu to, tai mềm cụp xuống, đuôi dài và có bộ lông vàng đặc trưng (phía ngoài ít thấm nước, còn bên trong thì khá ngắn, mềm mịn).', '7.000.000 – 18.000.000 ', 1100, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121504038187.jpg', 1, 1),
(14, 'Chó Becgie', 'Nếu bạn muốn nuôi loại vừa để giữ nhà, vừa là chó cảnh thì chó Becgie sẽ là lựa chọn phù hợp. Bởi chúng là giống có nguồn gốc từ Đức, khá dữ và cảnh giác người lạ. Chúng thường nặng khoảng 32 – 42kg, cao tầm 58 – 65cm, tai vểnh lên, mõm dài và lông có 2 màu cơ bản là vàng lửa pha đen và đen tuyền.', '18.000.000 – 30.000.000 ', 1300, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121504182347.jpg', 1, 1),
(15, 'Chó Corgi', 'Chó Corgi nổi tiếng là chú chó “mông to, chân ngắn” đến từ xứ Wales, Anh Quốc. Chúng thường cao tầm 25 – 30cm, nặng khoảng 10 – 13kg, tai tam giác dựng thẳng, mắt to tròn cùng bộ lông ngắn, mềm mượt với đủ màu khác nhau (cam trắng/vàng trắng/đen trắng/nâu trắng,...). Corgi rất đáng yêu, hiền lành, vâng lời và thông minh.', '13.000.000 – 20.000.000 ', 1150, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202104121504407738.jpg', 1, 1),
(16, 'Chó Mông Cộc', 'Chó Mông cộc còn được gọi là chó H’mông cộc. Chúng có thân hình khá giống loài sói, cơ thể chắc nịch, đầy cơ bắp. Chó trưởng thành có chiều dài từ 45-55cm và cân nặng dao động từ 15 đến 25 kg. Chó Mông cộc được sử dụng để trông nhà, giữ của, ngày nay với bản tính dũng mãnh, cùng lòng trung thành.thì chúng còn được huấn luyện để đi săn hoặc sát cánh cùng cảnh sát trong công tác phòng chống tội phạm. Do đó, chúng có thể xem là 1 trong tứ đại Quốc khuyển của Việt Nam.', '5.000.000 – 10.000.000 ', 800, 'https://cdn.tgdd.vn/Files/2021/04/12/1342796/15-giong-cho-canh-dep-de-cham-soc-pho-bien-tai-viet-nam-202203261607318754.jpg', 1, 1),
(17, ' Mèo Xiêm', 'Tại nước ta, mèo Xiêm là một trong các loại mèo cảnh khá phổ biến, chúng có nguồn gốc từ Thái Lan. Giống mèo này có kích thước trung bình, thân hình dãi, mõm hình tam giác nhìn vùng đôi tai khá lớn so với đầu.\r\nĐặc điểm nổi bật nhất của những chú mèo Xiêm chính là bộ lông với điểm đậm ở tai, mắt, 4 chân và đuôi. Khác với các loại mèo trên thế giới khác, mèo Xiêm có tính hoạt bát, sôi động và không thích nằm ì một chỗ.', '1.000.000 - 6.000.000', 1500, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-Xiem.jpg', 2, 1),
(18, 'Mèo Ba Tư', 'Mèo Ba Tư có khuôn mặt tròn, mõm ngắn, nhưng theo thời gian thì đặc điểm này đã trở nên cường điệu hơn, đặc biệt là ở vùng Bắc Mỹ. Lông mèo Ba tư có đủ màu, hoa văn đa dạng.\r\nTính cách của giống mèo này khá trầm, nó thích nghi tốt với cuộc sống tại các căn hộ. Theo kết quả của một số nghiên cứu khi so sánh nhận thức của các loại mèo cảnh, mèo Ba tư được đánh giá cao hơn về sự gần gũi, thân thiện.', '4.000.000 - 60.000.000', 1000, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-Ba-Tu.jpg', 2, 1),
(19, 'Mèo Anh lông ngắn\r\n', 'Mèo Anh lông ngắn là một trong các loại mèo trên thế giới chiếm được tình cảm của người nuôi bởi sự đáng yêu, dễ tính. Chúng có những đặc điểm như thân hình mũm mĩm, lông ngắn, dày với khuôn mặt to. Màu sắc lông phổ biến nhất của mèo Anh lông ngắn là xam xanh cùng màu mắt càng đồng. Bên cạnh đó, chúng cũng có những màu sắc hoa văn khác, bao gồm cả vằn…\r\nMèo Anh lông ngắn khá dễ tính, không hoạt bạt và vui tươi như những giống mèo cảnh khác, thế nhưng chung lại rất ngọt ngào với người nuôi.', '7.000.000 - 15.000.000', 1200, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-Anh-long-ngan.jpg', 2, 1),
(20, 'Mèo Anh lông dài', 'Mèo Anh lông dài thuộc giống mèo nhà cỡ vừa, độ dài của lông ở mức trung bình, có xuất xứ từ Anh. Chúng được phát triển từ giống mèo Anh lông ngắn nhưng là phiên bản có bộ lông dài hơn.\r\nGiống mèo này nổi bật với chiếc đầu trong cùng đôi mắt sáng, tai ngắn hình tam giác luôn dựng đứng. Thân hình của mèo Anh lông dài chắc nịch, bốn chân ngắn nhưng vô cùng khỏe và chiếc đuôi dài.\r\nBản tính của mèo Anh lông dài là ngoan ngoãn, ôn hòa và đồng thời là giống mèo thích đùa giỡn khi còn nhỏ. Chúng rất thích hợp với những người luôn bận rộn, làm việc cả ngày vì tính hiền lành và có thể ở yên một mình trong nhiều giờ.', '1.500.000 - 5.000.000', 1500, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-Anh-long-dai.jpg', 2, 1),
(21, 'Mèo tai cụp Scottish Fold', 'Mèo tai cụp là giống mèo nhà với đột biến gen trội tự nhiên nên đôi tai của chúng thường cụp lại, hướng về phía trước. Cấu trúc tổng thể của giống mèo này, đặc biệt là phần đầu và mặt khá tròn trịa; mắt to và tròn; cổ ngắn.\r\nBản tính của mèo tai cụp là điềm tỉnh, giỏi hòa hợp với các loại động vật khác trong gia đình. Chúng sống rất tình cảm và có xu hướng gần gũi với người nuôi. Mèo tai cụp cũng rất thông minh, tinh nghịch. Chúng vực kỳ ghét sự cô đơn và dễ rơi vào trầm cảm.\r\nTuổi thọ của giống mèo tai cụp tầm là tầm khoảng 15 tuổi, cao hơn so với các loại mèo cảnh khác.', ' 3.000.000 - 12.000.000', 1400, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-tai-cup-Scottish-Fold.jpg', 2, 1),
(22, 'Mèo Ai Cập', 'Mèo Ai Cập hay còn được biết đến là mèo không lông. Hiện tượng này là kết quả của dạng đột biến gen từ nhiên. Da của mèo Ai Cập có kết cấu giống da sơn dương, có thể có lông mịn hoặc hoàn toàn không có long.\r\nGiống mèo không lông có đầu hẹp, dài và chân có màng. Bởi vì không có lông, nên mèo Ai Cập rất dễ hạ thân nhiệt, điều này khiến chúng thích được âu yêm và tìm những nơi có nhiệt độ ấm áp.\r\nNhững chú mèo Ai Cập có mức độ năng lượng, trí thông minh và tình cảm cao với người nuôi. Mèo không lông một trong các loại mèo cảnh có đặc điểm khá giống với chó chó, thường xuyên chào hỏi chủ và thân thiện khi gặp người lạ. ', '20.000.000 - 70.000.000', 1100, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-Ai-Cap.jpg', 2, 1),
(23, 'Mèo chân ngắn Munchkin', 'Mèo chân ngắn Munchkin hay còn gọi là mèo xúc xích. Đây là một trong các loại mèo trên thế giới khá mới, chũng có đặc điểm là đôi chân ngắn do đột biến gen. Chân sau của mèo Munchkin có thể dài hơn so với chân trước nên phần cơ thể từ vai đến mông thường hơi nhô lên. Chúng là giống mèo rất tình cảm với chủ. Đặc biệt, mèo chân ngắn Munchkin khá thích ngủ nên rất dễ béo phì.', '15.000.000 - 20.000.000', 1400, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-chan-ngan-Munchkin.jpg', 2, 1),
(24, 'Mèo Nga mắt xanh', 'Đây là giống mèo có nguồn gốc xuất xứ từ Nga giống như tên gọi của chúng vậy. Mèo Nga mắt xanh có thân hình săn chắc và lối sống linh hoạt. Cùng với đó, mèo Nga mắt xanh có đầu hơi nhọn, 4 chân khá dài. Điểm đặc biệt của chúng là đôi mắt xanh huyền bí và vô vùng thu hút ánh nhìn.\r\nTính cách của mèo Nga mắt xanh khá hiền lành, đôi khi còn có chút sự nhút nhát. Thế nhưng, sau thời gian làm quen với người nuôi, chúng sẽ trở nên thân thiện và vui vẻ hơn.', '10.000.000 - 15.000.000', 2000, 'https://animalandzoo.com/wp-content/uploads/2022/01/Meo-Nga-mat-xanh.png', 2, 1),
(25, 'Mèo Chinchilla', 'Chinchilla là một trong các loại mèo cảnh được nhân giống từ mèo Ba tư và mèo Nam Phi. Vậy nên, chúng có bộ lông giống mèo ba tư và đôi mắt xanh ngọc như mèo Nam Phi. ', '6.000.000', 900, 'https://animalandzoo.com/wp-content/uploads/2022/01/Chinchilla.jpg', 2, 1),
(26, 'Mèo Ragdoll', 'Mèo Ragdoll là một trong các loại mèo trên thế giới có đôi mắt màu xanh, bộ lông hai màu tương phản đặc trưng. Chúng có cơ bắp rắn chắc, bộ lông dài và mềm mại. Đồng thời, mèo Ragdoll cũng được biết đến là giống mèo có tính cách hiền lành, dễ bảo.\r\nBản tính ngoan ngoãn của những chú mèo Ragdoll được cho là thừa hưởng từ mèo Ba tư và mèo Xiêm. Chính vì thế, nhiều người cho rằng chúng rất giỏi chịu đau và đã tìm cách loại bỏ chúng như hạn chế bớt sự ẻo lả của chúng vì đây không phải là đặc tính tốt nhất của loài mèo.', '12.000.000 - 20.000.000', 1600, 'https://animalandzoo.com/wp-content/uploads/2022/01/image11-1602821817-665-width600height400.jpg', 2, 1),
(34, 'Du_an1', 'frtrt', '747474', 56545, '', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `account` ADD FULLTEXT KEY `password` (`password`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acount_id_fk` (`account_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `acount_id_fk` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
