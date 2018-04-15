-- Database

CREATE DATABASE book_store
COLLATE	utf8_unicode_ci;
USE book_store;

-- Table admin

CREATE TABLE admin(
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(40) NOT NULL,
password varchar(40) NOT NULL,
fullname varchar(100) NOT NULL DEFAULT 'Admin',
phone varchar(40) NOT NULL,
created timestamp,
PRIMARY KEY (id)
);

INSERT INTO admin(username, password, fullname, phone) VALUES ('admin', '1234','Trần Quang Trung', '0987654321');


-- Table user 

CREATE TABLE user(
id int(255) NOT NULL AUTO_INCREMENT,
name varchar(40),
email varchar(40) NOT NULL,
password varchar(40) NOT NULL,
phone varchar(15),
address varchar(100),
created timestamp NOT NULL,
status int(2) NOT NULL,
PRIMARY KEY(id)
);
-- Table category
create table Category(
cat_id int(11) AUTO_INCREMENT,
cat_name varchar(100) NOT NULL,
created timestamp,
PRIMARY KEY (cat_id)
);
-- INSERT INTO Category(cat_name) VALUES ('');
INSERT INTO Category(cat_name) VALUES ('Hành động & Phiêu lưu');
INSERT INTO Category(cat_name) VALUES ('Kinh doanh & Kinh tế');
INSERT INTO Category(cat_name) VALUES ('Truyện thiếu nhi');
INSERT INTO Category(cat_name) VALUES ('Truyện tranh & Mangas');
INSERT INTO Category(cat_name) VALUES ('Máy tính, Internet và Truyền thông kỹ thuật số');
INSERT INTO category(cat_name)VALUES ('Văn học Việt Nam');
INSERT INTO category(cat_name)VALUES ('Văn học nước ngoài');
INSERT INTO category(cat_name)VALUES ('Ngôn tình Trung Quốc');
INSERT INTO category(cat_name)VALUES ('Tiểu thuyết');
INSERT INTO category(cat_name)VALUES ('Truyện ma - Kinh dị');
INSERT INTO category(cat_name)VALUES ('Truyện trinh thám');
INSERT INTO category(cat_name)VALUES ('Văn hóa - Xã hội');
INSERT INTO category(cat_name)VALUES ('Khoa học - Kỹ thuật');
INSERT INTO category(cat_name)VALUES ('Kỹ năng sống');



-- Table Publisher

create table Publisher(
pub_id int(11) AUTO_INCREMENT,
pub_name varchar(100) NOT NULL,
phone varchar(30),
address varchar(100), 
created timestamp,
status int(1),
PRIMARY KEY(pub_id)
);

INSERT INTO Publisher(pub_name, phone, address) VALUES ('Kim Đồng', '0987654321','Hà Nội');
INSERT INTO Publisher(pub_name, phone, address) VALUES ('NXB Thanh Niên', '0987654321','Hà Nội');
INSERT INTO Publisher(pub_name, phone, address) VALUES ('NXB Lao Động', '0987654321','Hà Nội');
INSERT INTO Publisher(pub_name, phone, address) VALUES ('NXB Đại học QGHN', '0987654321','Hà Nội');
INSERT INTO Publisher(pub_name, phone, address) VALUES ('NXB Văn hóa', '0987654321','Hà Nội');


create table Book(
id int(11) AUTO_INCREMENT PRIMARY KEY,
cat_id int(11) UNIQUE,
cat_name varchar(100) NOT NULL,
name varchar(100) NOT NULL,
author varchar(100) NOT NULL,
price decimal(15) NOT NULL,
price_sale decimal(15),
pub_id int(11),
description text,
img_link varchar(100),
created timestamp,
viewd int(11),
status tinyint(1),
FOREIGN KEY(cat_id) REFERENCES category(cat_id),
FOREIGN KEY(pub_id) REFERENCES Publisher(pub_id)
);

-- Đang đổ dữ liệu cho bảng `book`

-- INSERT INTO `book` (`id`, `cat_name`, `name`, `author`, `price`, `price_sale`, `pub_name`, `description`, `img_link`, `created`, `viewd`, `p_status`) VALUES
-- (1, 'Văn học nước ngoài', 'Ông già và biển cả', 'Ernest Hemingway', '23000', '17000', 'NXB Văn Học', 'Tóm tắt sách Ông Già Và Biển Cả: Ông già và Biển cả (tên tiếng Anh: The Old Man and the Sea) là một tiểu thuyết ngắn được Ernest Hemingway viết ở Cuba năm 1951 và xuất bản năm 1952. Nó là truyện ngắn dạng viễn tưởng cuối cùng được viết bởi Hemingway. Đây cũng là tác phẩm nổi tiếng và là một trong những đỉnh cao trong sự nghiệp sáng tác của nhà văn. Tác phẩm này đoạt giải Pulitzer cho tác phẩm hư cấu năm 1953. Nó cũng góp phần quan trọng để nhà văn được nhận Giải Nobel văn học năm 1954. Trong Ông già và Biển cả, ông đã triệt để dùng nguyên lý mà ông gọi là “tảng băng trôi”, chỉ mô tả một phần nổi còn lại bảy phần chìm, khi mô tả sức mạnh của con cá, sự chênh lệch về lực lượng, về cuộc chiến đấu không cân sức giữa con cá hung dữ với ông già. Tác phẩm ca ngợi niềm tin, sức lao động và khát vọng của con người. Waka trân trọng giới thiệu sách Ông Già Và Biển Cả.', 'Uploads/11445.jpg', '2018-04-13 16:39:39', 0, 1),
-- (2, 'Tiểu thuyết', 'Không gia đình', 'Hector Malot', '139000', '90000', 'NXB Văn Học', 'Giới thiệu cuốn sách Không Gia Đình của tác giả Hector Malot: Không Gia Đình kể chuyện một em bé không cha mẹ, không họ hàng thân thích, đi theo một đoàn xiếc chó, khỉ, rồi cầm đầu đoàn ấy đi lưu lạc khắp nước Pháp, sau đó bị tù ở Anh, cuối cùng tìm thấy mẹ và em. Em bé Rêmi ấy đã lớn lên trong gian khổ. Em đã lao động mà sống, lúc đầu dưới quyền điều khiển của một ông già từng trải và đạo đức, cụ Vitali, về sau thì tự lập và không những lo cho mình, còn bảo đảm việc biểu diễn và sinh sống cho cả một gánh hát rong. Đã có khi em và cả đoàn lang thang mấy hôm liền không có chút gì trong bụng. Đã có khi em suýt chết rét. Đã có khi em bị lụt ngầm chôn trong giếng mỏ mười mấy ngày đêm. Đã có khi em mắc oan bị giải ra trước tòa và bị ở tù. Và cũng có khi em được nuôi nấng đàng hoàng, no ấm. Nhưng dù ở đâu, trong cảnh ngộ nào, em vẫn noi theo nếp rèn dạy của ông già Vitali giữ phẩm chất làm người, nghĩa là ngay thẳng, gan dạ, tự trọng, thương người, ham lao động, không ngửa tay xin xỏ, không dối trá, gian giảo, nhớ ơn nghĩa, luôn luôn muốn làm người có ích... Tác giả quả thật đã rất tài tình khi vẽ nên những hình ảnh vô cùng sắc nét về thế giới quan, làm cho người đọc phải khắc khoải theo từng nỗi đau của nhân vật, hí hửng reo vang khi bắt gặp chân lý của sự sống. Rồi có lúc lại thỏa mãn vui mừng khi cái thiện lên ngôi. Ngay cả những con vật cũng được tác giả thổi hồn cho hiện lên một cách rõ nét, chân thực và sống động nhất. Tất cả làm cho ta cứ muốn đọc nữa, đọc mãi như “uống” từng câu chữ và tự biến mình thành một đơn vị, một tế bào giúp hình thành nên sự hấp dẫn của câu chuyện. Mà càng “uống” thì càng say, đê mê trong mớ cảm xúc hỗn độn. Waka trân trọng giới thiệu đến bạn đọc cuốn sách “Không Gia Đình”!', 'Uploads/11341.jpg', '2018-04-13 16:39:45', 1, 1),
-- (3, 'Tiểu thuyết', 'Con hủi', 'Helena Mniszek', '139000', '106000', 'NXB Hà Nội', 'Con hủi được viết năm 1909, là tác phẩm tiêu biểu và nổi tiếng nhất của nữ văn sĩ người Ba Lan Helena Mniszek (1878–1943). Trái với thái độ lạnh nhạt và hờ hững của các nhà phê bình, tiểu thuyết Con hủi lập tức trở thành một hiện tượng văn học làm náo động thị trường xuất bản, được tái bản liên tục hàng chục lần với số lượng kỉ lục thời gian đó, là tác phẩm văn học bán chạy nhất trong khoảng thời gian giữa hai cuộc chiến tranh thế giới. Sau đó tác phẩm được dịch ra nhiều thứ tiếng nước ngoài và được chuyển thể thành 3 phim điện ảnh (các năm 1926, 1936, 1976) và một bộ phim truyền hình (năm 2000).', 'Uploads/8367.jpg', '2018-04-13 16:40:10', 0, 1),
-- (5, 'Tiểu thuyết', 'AQ chính truyện', 'Lỗ Tấn', '110000', '69000', 'Đang cập nhật', 'Tóm tắt sách AQ chính truyện: là truyện vừa duy nhất của Lỗ Tấn được đăng tải lần đầu trên \"Thần báo phó san\" ở Bắc Kinh trong khoảng thời gian từ 4 tháng 12, 1921 đến 12 tháng 2, 1922. Sau đó truyện được in trong tuyển tập truyện ngắn \"Gào thét\" năm 1923 và là truyện dài nhất trong tuyển tập này. Tác phẩm này thường được coi là một kiệt tác của Văn học Trung Quốc hiện đại; nó cũng được coi là tác phẩm đầu tiên viết bằng bạch thoại văn sau phong trào Ngũ Tứ (1919) tại Trung Quốc. Câu chuyện kể lại cuộc phiêu lưu của A Q, một anh chàng thuộc tầng lớp bần nông ít học và không có nghề nghiệp ổn định. A Q nổi tiếng vì phương pháp thắng lợi tinh thần. Ví dụ như mỗi khi anh bị đánh thì anh lại cứ nghĩ \"chúng đang đánh bố của chúng\". AQ có nhiều tình huống lý luận đến \"điên khùng\". A Q hay bắt nạt kẻ kém may mắn hơn mình nhưng lại sợ hãi trước những kẻ hơn mình về địa vị, quyền lực hoặc sức mạnh. Anh ta tự thuyết phục bản thân rằng mình có tinh thần cao cả so với những kẻ áp bức mình ngay trong khi anh ta phải chịu đựng sự bạo ngược và áp bức của chúng. Lỗ Tấn đã cho thấy những sai lầm cực đoan của A Q, đó cũng là biểu hiện của tính cách dân tộc Trung Hoa thời bấy giờ. Kết thúc tác phẩm, hình ảnh A Q bị đưa ra pháp trường vì một tội nhỏ cũng thật là sâu sắc và châm biếm. Mời các bạn đón đọc sách AQ chính truyện.', 'Uploads/8511.jpg', '2018-04-13 16:40:20', 0, 1),
-- (6, 'Văn học nước ngoài', 'David Copperfield', 'Charles Dickens', '89000', '67000', 'Đang Cập Nhật', 'Tóm tắt sách David Copperfield: là một tiểu thuyết của Charles Dickens. Các hồi ký cá nhân, cuộc phiêu lưu thám hiểm, trải nghiệm và quan sát của David Copperfield trẻ, được xuất bản lần đầu tiên vào năm 1850. Nhiều chi tiết trong tác phẩm được chắt lọc từ chính cuộc đời của nhà văn, vì thế đây có lẽ là tác phẩm mang tính tự truyện đậm nét nhất trong kho tàng văn chương Charles Dickens. Trong Lời tựa sách ấn bản năm 1867, C. Dickens bộc bạch: \"…như những bậc cha mẹ nâng niu con cái, tôi ôm ấp trong trái tim mình một đứa con tinh thần đặc biệt. Và tên của đứa bé là David Copperfield\".', 'Uploads/8517.jpg', '2018-04-13 12:16:14', 0, 0),
-- (7, 'Tiểu thuyết', 'Hội chợ phù hoa - P1', ' William Makepeace Thackeray', '82000', '57000', 'Đang Cập Nhật', 'Tóm tắt sách Hội chợ phù hoa: Cuốn tiểu thuyết không có Anh hùng là một cuốn tiểu thuyết của William Makepeace Thackeray châm biếm xã hội vào đầu thế kỷ 19 ở Anh. Thuật ngữ \"hội chợ phù hoa\" xuất phát từ câu chuyện ngụ ngôn Chuyến đi của người hành hương, do John Bunyan xuất bản vào năm 1678 ở dó có một hội chợ tổ chức trong làng có tên Vanity (Hội chợ phù hoa). Cuốn tiểu thuyết đã được nhiều lần chuyển thể thành phim. Hội chợ phù hoa là một tiểu thuyết đa tuyến nói về xã hội quý tộc tư sản và số phận của con người với nhiều thành phần trong xã hội đó. Trục chính của truyện là cuộc đời của hai cô thiếu nữ là bạn học cùng lớp, cùng trường nhưng không cùng tầng lớp và cũng không cùng số phận.', 'Uploads/8520.jpg', '2018-04-13 12:15:50', 1, 0),
-- (8, 'Tiểu thuyết', 'Hội chợ phù hoa - P2', 'William Makepeace Thackeray', '82000', '53000', 'Đang cập nhật', 'Tóm tắt sách Hội chợ phù hoa: Cuốn tiểu thuyết không có Anh hùng là một cuốn tiểu thuyết của William Makepeace Thackeray châm biếm xã hội vào đầu thế kỷ 19 ở Anh. Thuật ngữ \"hội chợ phù hoa\" xuất phát từ câu chuyện ngụ ngôn Chuyến đi của người hành hương, do John Bunyan xuất bản vào năm 1678 ở dó có một hội chợ tổ chức trong làng có tên Vanity (Hội chợ phù hoa). Cuốn tiểu thuyết đã được nhiều lần chuyển thể thành phim. Hội chợ phù hoa là một tiểu thuyết đa tuyến nói về xã hội quý tộc tư sản và số phận của con người với nhiều thành phần trong xã hội đó. Trục chính của truyện là cuộc đời của hai cô thiếu nữ là bạn học cùng lớp, cùng trường nhưng không cùng tầng lớp và cũng không cùng số phận.', 'Uploads/8523.jpg', '2018-04-13 12:15:51', 0, 0),
-- (9, 'Văn học nước ngoài', 'Thần thoại Hy Lạp', 'Nhiều tác giả', '180000', '117000', 'Đang Cập Nhật', 'Tóm tắt sách Thần thoại Hy Lạp: là tập hợp những huyền thoại và truyền thuyết của người Hy Lạp cổ đại liên quan đến các vị thần, các anh hùng, bản chất của thế giới, và nguồn gốc cũng như ý nghĩa của các tín ngưỡng, nghi lễ tôn giáo họ. Chúng là một phần của tôn giáo Hy Lạp cổ đại và nay là một phần của một tôn giáo hiện đại lưu hành ở Hy Lạp và trên thế giới gọi là Hellenismos. Các học giả hiện đại tham khảo và nghiên cứu các truyện thần thoại này để rọi sáng vào các thể chế tôn giáo, chính trị Hy Lạp cổ đại, nền văn minh của nó cũng như để tìm hiểu về bản thân sự hình thành huyền thoại. Thần thoại Hy Lạp được thể hiện rõ ràng trong tập hợp đồ sộ những truyện kể, và trong các tác phẩm nghệ thuật tượng trưng Hy Lạp, chẳng hạn các tranh vẽ trên bình gốm và các đồ tế lễ. Thần thoại Hy Lạp cố gắng giải thích nguồn gốc của thế giới, và kể tỉ mỉ về cuộc đời và các cuộc phiêu lưu của một tập hợp đa dạng những vị thần, nữ thần, anh hùng và những sinh vật thần thoại. Những truyện kể này đầu tiên được truyền miệng bằng thơ ca; ngày nay các thần thoại Hy Lạp chủ yếu được biết thông qua văn học Hy Lạp.', 'Uploads/8532.jpg', '2018-04-13 12:15:52', 0, 0),
-- (10, 'Văn học nước ngoài', 'Cái đầu tội lỗi', 'Romain Gary', '110000', '95000', 'Đang Cập Nhật', 'Tóm tắt về sách Cái Đầu Tội Lỗi Romain Gary, nhà văn Pháp, sinh tại Vilnius (Lituanie), 1914, là “một trong những tiểu thuyết gia lớn nhất thế giới” (nhận định của tạp chí St. Louis Post Dispatch). Tác phẩm đầu tiên, Les Racines du Ciel viết năm 1954, gây tiếng vang lớn, được giải Goncourt năm 1956. Cái Đầu Tội Lỗi được tác giả viết bằng tiếng Pháp và tiếng Anh (Pháp: La Tête Coupable; Anh: The Guilty Head) năm 1969. R.Gary và vợ là diễn viên điện ảnh Jean Séberg tự sát tại Paris năm 1980. Bản tiếng Việt dịch từ bản tiếng Anh, New American Library, 1970.', 'Uploads/8142.jpg', '2018-04-13 12:15:53', 0, 0),
-- (11, 'Văn học nước ngoài', 'Ba người lính ngự lâm - Phần 2\r\n', ' Alexandre Dumas', '169000', '117000', 'Đang Cập Nhật', 'Ba chàng lính ngự lâm là tiểu thuyết của nhà văn người Pháp Alexandre Dumas , là cuốn đầu tiên của bộ ba tập truyện gồm Les Trois Mousquetaires, Vingt Ans après (Hai mươi năm sau), và Le Vicomte de Bragelonne (Tử tước de Bragelonne). Bộ tiểu thuyết kể về những cuộc phiêu lưu của chàng lính ngự lâm d\'Artagnan, từ lúc anh còn trẻ cho đến lúc già.\r\n\r\nBa người lính ngự lâm là cuốn nổi tiếng nhất, đã được dựng thành phim truyền hình, phim hoạt hình. Câu chuyện hấp dẫn người đọc bởi các tình tiết ly kỳ, cảm giác hồi hộp và bất ngờ thú vị. Tác phẩm không chỉ tái hiện cả một thời kỳ lịch sử nước Pháp mà còn làm sống dậy cả một thời tuổi trẻ hoạt động sôi nổi, hào hứng với những tình cảm trong sáng.', 'Uploads/7728.jpg	\r\n', '2018-04-13 12:15:54', 0, 0),
-- (12, 'Kinh doanh & Kinh tế', '10 Thói quen triệu phú', 'Dean Graziosi', '119000', '95000', 'NXB Lao Động', '\"Tôi khá bằng lòng với cuộc sống hiện tại nhưng đó không thực sự là những gì tôi mơ ước\". Đây là lời khẳng định, có lẽ là, thật lòng và phổ biến nhất, trên thế giới 7,6 tỉ người này. Chúng ta có ý chí, có ước mơ, có sự siêng năng cần cù - nhưng như vậy vẫn là chưa đủ. Mỗi buổi sáng thức dậy, ta lại rơi vào vòng lặp của chuỗi ngày \"tầm thường\", không có gì mới mẻ, và bạn dường như không hề hạnh phúc. Vậy, nếu như không muốn kẹt cứng trong trạng thái ì trệ, bạn có muốn thử thay đổi không? Cuốn sách \"10 thói quen của triệu phú\" - tác phẩm mới nhất của tác giả bestseller Dean Graziosi sẽ \"kích nổ\" động lực trong bạn, để bạn từng bước hình thành các thói quen mới trong cuộc sống hàng ngày. Đó chính là những thói quen trọng-yếu-nhất, giúp bạn hiện thực hóa các tham vọng cá nhân, trở nên giàu có cả về vật chất lẫn tinh thần. Cuốn sách của Graziosi là sự kết hợp hoàn hảo giữa trải nghiệm cuộc đời của bản thân tác giả với các lý thuyết khoa học rành mạch, và những bài tập thực hành hữu ích - để bất cứ ai, không quan trọng nghề nghiệp hay điểm xuất phát, cũng có thể vươn tới tương lai tốt đẹp đúng như mong ước. Về tác giả: Dean Graziosi không chỉ là tác giả sách bán chạy của New York Times, mà còn là một doanh nhân triệu đô trong lĩnh vực bất động sản, và là một trong những diễn giả nổi tiếng nhất toàn cầu. Những cuốn sách và các chương trình huấn luyện của Graziosi đã tác động tới cuộc sống của hàng triệu người. Nhưng Graziosi vẫn đang tiếp tục tiến bước, bởi theo ông, tất cả mới chỉ là sự khởi đầu.', 'Uploads/18079.jpg', '2018-04-13 12:16:03', 0, 0),
-- 4, 'Kinh doanh & Kinh tế', 'Kĩ năng giải quyết vấn đề trong kinh doanh', 'David Cotton', '129000', '103000', 'NXB Lao Động', '“Tôi không trả lương để anh báo cáo các vấn đề. Tôi trả lương để anh tìm kiếm các giải pháp.” - Bất kỳ ai đi làm cũng sẽ phải đối mặt với tuyên bố đầy thách thức này. Nhưng liệu bao nhiêu người có thể đáp ứng được kỳ vọng của các vị quản lý? Để thực hiện được cả hai nhiệm vụ: Giúp nhân viên đáp ứng kỳ vọng của lãnh đạo, và giúp các sếp lựa chọn được giải pháp tối ưu, David Cotton đã viết cuốn \"Kỹ năng giải quyết vấn đề trong kinh doanh\" - tổng hợp 68 công cụ hữu ích nhất để giải quyết toàn diện các vấn đề. Xuyên suốt tác phẩm, Cotton nói về “các vấn đề trong doanh nghiệp” như một khái niệm nền tảng cho mọi tổ chức. Bất kể bạn làm việc trong lĩnh vực công, tư nhân, từ thiện, doanh nghiệp xã hội hay tổ chức tình nguyện… bạn đều có thể áp dụng linh hoạt các phương pháp được miêu tả trong sách thông qua các hướng dẫn và ví dụ cụ thể. Các công cụ trong sách rất đa dạng, bao gồm cả công cụ cho các cá nhân, nhóm nhỏ đến công cụ cho nhóm lớn. Mỗi khi giới thiệu một công cụ, Cotton đều trình bày theo cấu trúc: Diễn giải (Công cụ này là gì) - Khi nào nên sử dụng - Bạn cần chuẩn bị gì - Sử dụng công cụ như thế nào – và Những điểm cần lưu ý khi sử dụng. Hãy sử dụng \"Kỹ năng giải quyết vấn đề trong kinh doanh\" như một cuốn cẩm nang \"hướng dẫn\" trên bàn làm việc, bởi đây là một trong những cuốn sách dễ hiểu và bao quát nhất về các phương pháp giải quyết vấn đề đã được sử dụng bởi những doanh nhân hàng đầu thế giới.', 'Uploads/18144.jpg', '2018-04-13 12:16:04', 0, 0);

-- Table orders

CREATE TABLE orders (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  full_name varchar(120),
  email varchar(100) ,
  address varchar(255),
  phone varchar(20),
  order_note varchar(255),
  total_amount varchar(100),
  total_qty int(11) ,
  status int(1) DEFAULT '0',
  created timestamp NOT NULL,
  PRIMARY KEY(id), 
  FOREIGN KEY(user_id) REFERENCES user(id)
);

-- Table order_detail

CREATE TABLE order_detail (
  order_id int(11) NOT NULL,
  id int(255) NOT NULL AUTO_INCREMENT,
  product_id int(255) NOT NULL,
  qty int(11) NOT NULL DEFAULT '0',
  amount decimal(15,4) NOT NULL DEFAULT '0.0000',
  status tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id), 
  FOREIGN KEY(order_id) REFERENCES orders(id),
  FOREIGN KEY(product_id) REFERENCES book(id)
);