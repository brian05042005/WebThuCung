<?php
session_start();
require "./cauhinh/ketnoi.php";


if (isset($_GET['pet_id'])) {
    $pet_id = $_GET['pet_id'];
} else {
    die("Pet ID not provided!");
}


$sql = "SELECT * FROM pets WHERE pet_id = $pet_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$rowsPerPage = 4;
$offset = 2;

$sql1 = "SELECT * FROM pets WHERE breed = '{$row['breed']}' LIMIT $offset, $rowsPerPage ";
$result1 = mysqli_query($conn, $sql1);
?>




<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- enbed fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/giongcho.css" />
    <link rel="stylesheet" href="./css/giongmeo.css" />
    <script src="./js/Giongmeo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang chủ</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.add-to-cartt').on('click', function () {
                const productId = $(this).data('product-id');
                $.ajax({
                    url: 'add_to_cart.php', // File PHP xử lý
                    method: 'POST',
                    data: { product_id: productId },
                    success: function (response) {
                        const res = JSON.parse(response); // Parse dữ liệu JSON từ server
                        if (res.status === 'success') {
                            // Cập nhật số lượng giỏ hàng
                            $('#cart-count').text(res.cart_count);
                        } else {
                            alert(res.message); // Hiển thị lỗi nếu có
                        }
                    },
                    error: function () {
                        alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
                    }
                });
            });
        });
    </script>
    <style>
    /* Định dạng chung */
    article {
        position: relative;
        background-size: cover;
        background-position: center;
        text-align: center;
        color: white;
        padding: 60px 0;
    }

    .overlay-text h1 {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .overlay-text p {
        font-size: 16px;
    }

    .overlay-text a {
        color: white;
        text-decoration: none;
    }

    .overlay-text a:hover {
        text-decoration: underline;
    }

    /* Container chi tiết sản phẩm */
    .container_detail {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    .product-image {
        flex: 1;
        min-width: 300px;
    }

    .product-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product-info {
        flex: 1;
        min-width: 300px;
    }

    .product-info .title_product {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .product-info .price {
        font-size: 24px;
        font-weight: bold;
        color: #ff6b6b;
        margin-bottom: 20px;
    }

    .product-info .details p {
        font-size: 16px;
        line-height: 1.6;
        color: #666;
    }

    .product-info .details strong {
        color: #333;
    }

    .product-info .available {
        font-size: 14px;
        color: #777;
        margin-bottom: 20px;
    }

    .product-info .available a {
        color: #ff6b6b;
        text-decoration: none;
    }

    .product-info .available a:hover {
        text-decoration: underline;
    }

    /* Quantity controls */
    .quantity-container {
        margin-bottom: 20px;
    }

    .quantity-container label {
        font-size: 16px;
        color: #333;
        margin-right: 10px;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-controls input {
        width: 60px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: center;
        font-size: 16px;
    }

    .quantity-controls button {
        width: 40px;
        height: 40px;
        background: #ff6b6b;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .quantity-controls button:hover {
        background: #ff5252;
    }

    /* Nút thêm vào giỏ hàng */
    .add-to-cartt {
        padding: 12px 30px;
        background: #ff6b6b;
        color: white;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .add-to-cartt:hover {
        background: #ff5252;
        transform: translateY(-3px);
    }

    .category_by {
        margin-top: 20px;
    }

    .category_by p {
        font-size: 16px;
        color: #333;
    }

    .category_by a {
        color: #ff6b6b;
        text-decoration: none;
    }

    .category_by a:hover {
        text-decoration: underline;
    }

    /* Tab mô tả và đánh giá */
    #wrapper {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .tabs {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-tabs {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        border-bottom: 1px solid #ddd;
    }

    .nav-tabs li {
        flex: 1;
        text-align: center;
    }

    .nav-tabs li a {
        display: block;
        padding: 15px;
        text-decoration: none;
        color: #333;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-tabs li.active a {
        color: #ff6b6b;
        border-bottom: 2px solid #ff6b6b;
    }

    .nav-tabs li a:hover {
        color: #ff6b6b;
    }

    .tabs-content {
        padding: 20px;
    }

    .tabs-content-item {
        display: none;
    }

    .tabs-content-item.active {
        display: block;
    }

    #tabs-describe p {
        font-size: 16px;
        line-height: 1.6;
        color: #666;
    }

    #tabs-review .box-review {
        max-width: 600px;
        margin: 0 auto;
    }

    .box-review .no-review {
        font-size: 16px;
        color: #777;
        text-align: center;
        margin-bottom: 20px;
    }

    .box-review .review-title {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .box-review .checkbox-label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .box-review .form-group {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .box-review .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    .box-review .rating-section {
        margin-bottom: 20px;
    }

    .box-review .rating-section label {
        font-size: 16px;
        color: #333;
        margin-right: 10px;
    }

    .box-review .stars {
        display: inline-block;
    }

    .box-review .stars input {
        display: none;
    }

    .box-review .stars label {
        font-size: 20px;
        color: #ddd;
        cursor: pointer;
    }

    .box-review .stars label:before {
        content: '\f005';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
    }

    .box-review .stars input:checked ~ label,
    .box-review .stars label:hover,
    .box-review .stars label:hover ~ label {
        color: #ff6b6b;
    }

    .box-review .review-textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        resize: none;
        margin-bottom: 20px;
    }

    .box-review .submit-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background: #ff6b6b;
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .box-review .submit-btn:hover {
        background: #ff5252;
        transform: translateY(-3px);
    }

    /* Sản phẩm tương tự */
    .container-product-same {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .product-same {
        text-align: center;
    }

    .product-same h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 30px;
    }

    .product-same-c4 {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .product-same-content {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        width: 200px;
    }

    .product-same-content:hover {
        transform: translateY(-5px);
    }

    .product-same-c4-thumbnail {
        position: relative;
    }

    .product-same-c4-thumbnail img {
        width: 100%;
        height: auto;
    }

    .product-same-c4-thumbnail .add-cart-product-same-c4-button {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        padding: 8px 20px;
        background: #ff6b6b;
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        opacity: 0;
    }

    .product-same-content:hover .add-cart-product-same-c4-button {
        opacity: 1;
    }

    .product-same-c4-thumbnail .add-cart-product-same-c4-button:hover {
        background: #ff5252;
        transform: translateX(-50%) translateY(-3px);
    }

    .product-same-c4-infor {
        padding: 10px;
        text-align: center;
    }

    .product-same-c4-infor h4 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .product-same-c4-infor p {
        font-size: 14px;
        font-weight: bold;
        color: #ff6b6b;
    }

    .product-same-c4-infor a {
        text-decoration: none;
    }

    /* Icons và quyền lợi */
    .icons {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin: 30px 20px;
    }

    .title1 {
        text-align: center;
        font-size: 28px;
        color: #333;
        margin: 40px 0 20px;
    }

    .ten {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 50px;
    }

    .ten .item {
        text-align: center;
        max-width: 250px;
    }

    .ten .item p {
        margin-top: 15px;
        font-weight: 500;
        color: #333;
    }
</style>
</head>

<body>
<?php include_once('header.php')?>
    <article style="
          background-image: url(https://petnow.com.vn/wp-content/uploads/2023/08/bg-featured-title.jpg);
        ">
        <div class="overlay-text">
            <h1><b>Dịch vụ Spa thú cưng</b></h1>
            <p><a href="#!">HOME</a> / DỊCH VỤ SPA THÚ CƯNG</p>
        </div>
    </article>
    <main>

        <!-- Product detail content -->
        <div class="container_detail">
            <div class="product-image">
                <img src="./quantri/anh/<?php echo $row['image_url']; ?>" alt=" ">
            </div>
            <div class="product-info">
                <h1 class="title_product"><?php echo $row['pet_name']; ?></h1>
                <p class="price"><?php echo number_format($row['price'], 0, ',', '.'); ?> VND</p></br>
                <hr color="#ece7e2" width="100%" size="0px" noshade="noshade" />
                <div class="details">
                    <p><strong>Tên:</strong> <?php echo $row['pet_name']; ?><br>
                        <strong>Chó/mèo:</strong> <?php echo $row['pet_type']; ?><br>
                        <strong>Chủng loại:</strong> <?php echo $row['breed']; ?><br>
                        <strong>Tuổi:&nbsp;</strong><?php echo $row['age']; ?><br>
                        <strong>Giới tính:</strong>&nbsp;<?php echo $row['gender']; ?><br>
                        <strong>Đặc điểm:&nbsp;</strong><?php echo $row['description']; ?><br>
                        <strong>Số lượng:&nbsp;</strong><?php echo $row['quantity']; ?><br>
                        <strong>Tình trạng:&nbsp;</strong><?php echo $row['status']; ?><br>
                        <strong>Ngày bán:</strong><?php echo $row['created_at']; ?>
                    </p>
                    <br>
                    <p class="available"><small><?php
                    if ($row['quantity'] > 0) {
                        echo "Có sẵn tại cửa hàng";
                    } else {
                        echo "<a href=\" \">Liên hệ với chúng tôi</a>";
                    }
                    ?></small></p>
                    <a href=""></a>
                </div>
                <div class="quantity-container">
                    <label for="quantity">Chọn số lượng</label>
                    <div class="quantity-controls">
                        <button type="button" class="decrease">-</button>
                        <input type="number" id="quantity" value="1" min="1" />
                        <button type="button" class="increase">+</button>
                    </div>
                </div>
                <button class="add-to-cartt" data-product-id="<?php echo $row['pet_id']; ?>">Thêm vào giỏ hàng</button>

                <div class="category_by">
                    <p><strong>Category:</strong><?php if ($row['pet_type'] == "Chó") { ?>
                            <a href="cho.php?giong=<?php echo $row['breed']; ?>"><?php echo $row['breed']; ?></a>
                            <?php
                    } else { ?>
                            <a href="meo.php?giong=<?php echo $row['breed']; ?>"><?php echo $row['breed']; ?></a>
                            <?php
                    } ?>
                </div>
            </div>
        </div>
        <div id="wrapper">
            <div class="tabs">
                <ul class="nav-tabs">
                    <li class="active"><a href="#tabs-describe">Mô tả</a></li>
                    <li><a href="#tabs-review">Đánh giá</a></li>
                </ul>
                <div class="tabs-content">
                    <div id="tabs-describe" class="tabs-content-item">
                        <p class="p">
                            Mèo Anh lông ngắn màu xám xanh mã AN30842.
                            Bé có bộ lông ngắn và đặc trưng màu xám xanh
                            đẹp mắt, trở thành biểu tượng của sự sang
                            trọng và đẳng cấp. Với vẻ ngoài đẹp mắt,
                            bé còn được biết đến với tính cách đáng yêu
                            và thân thiện, đặc biệt là với trẻ em,
                            đôi mắt tròn xoe, thân hình chắc chắn, cân đối.
                            Lớp lông dày, mượt màu xám xanh đẹp mắt, sang trọng.
                            Tính cách thân thiện, gần gũi, đáng yêu, thông minh
                            chắc chắn sẽ khiến bạn hài lòng, yêu mến khi đưa bé
                            về chung nhà
                        </p>
                    </div>
                    <div id="tabs-review" class="tabs-content-item">
                        <div class="box-review">
                            <p class="no-review">There are no reviews yet.</p>
                            <h2 class="review-title">Review “Mèo Anh lông ngắn màu xám xanh mã AN30842”</h2>
                            <label class="checkbox-label">
                                <input type="checkbox"> Lưu tên của tôi, email, và trang web trong trình duyệt này cho
                                lần
                                bình
                                luận kế tiếp của tôi.
                            </label>
                            <div class="form-group">
                                <input type="text" placeholder="Name" class="form-input">
                                <input type="email" placeholder="Email" class="form-input">
                            </div>
                            <div class="rating-section">
                                <label>Your rating:</label>
                                <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="star-5" type="radio" name="star" />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star" />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star" />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star" />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star" />
                                        <label class="star star-1" for="star-1"></label>
                                    </form>
                                </div>
                            </div>
                            <textarea placeholder="Your review..." class="review-textarea"></textarea>
                            <button class="submit-btn">Submit Review</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-product-same">
            <section class="product-same">
                <h2>Sản phẩm tương tự</h2>
                <ul class="product-same-c4">
                    <?php
                    while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                        <li class="product-same-content">
                            <div class="inner" href="chitietthucung.php?pet_id=<?php echo $row1['pet_id']; ?>">
                                <div class="product-same-c4-thumbnail">
                                    <a class="pic-product-same-c4"
                                        href="chitietthucung.php?pet_id=<?php echo $row1['pet_id']; ?>">
                                        <img src="./quantri/anh/<?php echo $row1['image_url']; ?>"
                                            style="width:200px;height:200px;">
                                        <button class="add-cart-product-same-c4-button"
                                            data-product-id="<?php echo $row['pet_id']; ?>">Xem thêm</button>
                                    </a>
                                </div>
                                <div class="product-same-c4-infor">
                                    <a href="#">
                                        <h4 class="title_product"><?php
                                        echo $row1['pet_name']; ?></h4>
                                        <p class="price"><?php echo number_format($row['price'], 0, ',', '.'); ?> vnđ</p>
                                        </br>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </section>
        </div>


        <!-- end product detail content -->
        <div class="icons">
            <a href="#">
                <img src="./images/image_trangchu/icon-zalo.svg" width="60" height="60" alt="Zalo icon" />
            </a>
            <a href="#">
                <img src="./images/image_trangchu/icon-messenger.svg" height="60" width="60" alt="Messenger icon" />
            </a>
        </div>
        <!-- các thẻ -->
        <h1 class="title title1">Quyền lợi khi mua hàng tại Petshop</h1>
        <div class="ten">
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-1.gif" width="250" height="250"
                    alt="FREE VẬN CHUYỂN" />
                <p>Miễn phí vận chuyển toàn quốc</p>
            </div>
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-3.gif" width="250" height="250"
                    alt="QUÀ TẶNG HẤP DẪN" />
                <p>Bộ quà tặng trị giá 500k</p>
            </div>
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-4.gif" width="250" height="250"
                    alt="CAM KẾT CHẤT LƯỢNG" />
                <p>Hợp đồng mua bán - Cam kết rõ ràng</p>
            </div>
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-2.gif" width="250" height="250"
                    alt="BẢO HÀNH SỨC KHỎE THÚ CƯNG" />
                <p>Bảo hành sức khỏe - Hỗ trợ trọn đời</p>
            </div>
        </div>

    </main>



    <?php include_once('footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/Giongmeo.js"></script>
    <script>
        $(document).ready(function () {
            $('.tabs-content-item').hide();
            $('.tabs-content-item:first-child').fadeIn();
            $('.nav-tabs li').click(function () {
                //active nav-tabs
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');

                //show tab-content item
                let id_tab_content = $(this).children('a').attr('href');
                $('.tabs-content-item').hide();
                $(id_tab_content).fadeIn();
                return false;
            });
        })
    </script>
</body>
</html>