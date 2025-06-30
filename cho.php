<?php
$page_title = "Giống Chó - Petshop";

session_start();
require "./cauhinh/ketnoi.php";
$sql = "";
$rowsPerPage = 12;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $rowsPerPage;
$tyle = "Chó";

$start_gia = 0;
$end_gia = PHP_INT_MAX;
$giongthucung = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_gia = isset($_POST['start_gia']) ? (int) $_POST['start_gia'] : 0;
    $end_gia = isset($_POST['end_gia']) ? (int) $_POST['end_gia'] : PHP_INT_MAX;
    $giongthucung = isset($_POST['giong']) && !empty($_POST['giong']) ? $_POST['giong'] : null;

    if ($giongthucung) {
        $_SESSION["giong"] = $giongthucung;
    } else {
        unset($_SESSION["giong"]);
    }
} elseif (isset($_GET['page']) && isset($_SESSION["giong"])) {
    $giongthucung = $_SESSION["giong"];
}

if ($giongthucung) {
    $sql = "SELECT * FROM pets WHERE pet_type = ? AND breed = ? AND price BETWEEN ? AND ? LIMIT ?, ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssiiii", $tyle, $giongthucung, $start_gia, $end_gia, $offset, $rowsPerPage);
} else {
    $sql = "SELECT * FROM pets WHERE pet_type = ? AND price BETWEEN ? AND ? LIMIT ?, ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "siiii", $tyle, $start_gia, $end_gia, $offset, $rowsPerPage);
}
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

if ($giongthucung) {
    $totalRowsQuery = "SELECT COUNT(*) as total FROM pets WHERE pet_type = ? AND breed = ? AND price BETWEEN ? AND ?";
    $stmt = mysqli_prepare($conn, $totalRowsQuery);
    mysqli_stmt_bind_param($stmt, "ssii", $tyle, $giongthucung, $start_gia, $end_gia);
} else {
    $totalRowsQuery = "SELECT COUNT(*) as total FROM pets WHERE pet_type = ? AND price BETWEEN ? AND ?";
    $stmt = mysqli_prepare($conn, $totalRowsQuery);
    mysqli_stmt_bind_param($stmt, "sii", $tyle, $start_gia, $end_gia);
}
mysqli_stmt_execute($stmt);
$totalRowsResult = mysqli_stmt_get_result($stmt);
$totalRows = mysqli_fetch_assoc($totalRowsResult)['total'];
$totalPage = ceil($totalRows / $rowsPerPage);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./css/giongcho.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        #pagination {
            margin-top: 20px;
            text-align: center;
        }

        #pagination a,
        #pagination span {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 4px;
            margin: 0 4px;
        }

        #pagination a:hover {
            background-color: #ddd;
        }

        #pagination span {
            background-color: #4CAF50;
            color: white;
        }

        .cart {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -20px;
            background-color: #ff0000;
            color: #ffffff;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }

        .filter-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 0.1px solid #ddd;
        }

        .filter-section h3 {
            margin-top: 0;
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 20px;
        }

        .filter-section .price-range {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .filter-section .price-range input {
            width: 100%;
            margin: 0 10px;
        }

        .filter-section .categories-section {
            margin-top: 20px;
        }

        .filter-section .categories-section ul {
            list-style: none;
            padding: 0;
        }

        .filter-section .categories-section ul li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .filter-section .categories-section ul li a {
            text-decoration: none;
            color: #333;
        }

        .filter-section .categories-section ul li a:hover {
            color: #ff5722;
        }

        .filter-section .categories-section .monn li {
            white-space: nowrap;
        }

        .filter-section .filter-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .filter-section .filter-button button {
            padding: 10px 20px;
            background-color: #ff5722;
            border: none;
            border-radius: 40px;
            color: #fff;
            cursor: pointer;
        }

        .filter-section .categories-section select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
            padding: 0;
        }

        .product-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin: 0;
        }

        .product-item:hover {
            transform: translateY(-5px);
        }

        .product-image {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
        }

        .product-image img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .product-item:hover .product-image img {
            transform: translate(-50%, -50%) scale(1.05);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-item:hover .overlay {
            opacity: 1;
        }

        .product-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .product-actions a, 
        .product-actions .favorite-icon {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .product-actions a:hover, 
        .product-actions .favorite-icon:hover {
            background: #ff6b6b;
            transform: translateY(-3px);
        }

        .add-to-cart {
            padding: 10px 20px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .add-to-cart:hover {
            background: #ff5252;
            transform: translateY(-3px);
        }

        .product-info {
            padding: 8px 15px;
            text-align: left;
        }

        .product-meta {
            margin-bottom: 2px;
            font-size: 12px;
            color: #777;
        }

        .product-meta span {
            display: block;
        }

        .product-info h4 {
            margin: 0 0 2px 0;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            text-transform: uppercase;
            line-height: 1.2;
        }

        .product-info p {
            font-weight: bold;
            color: #ff6b6b;
            font-size: 14px;
            margin: 0;
            line-height: 1.2;
        }

        .small-heart {
            position: absolute;
            color: #ff0000;
            font-size: 12px;
            pointer-events: none;
        }

        .favorite-label {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 107, 107, 0.8);
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            z-index: 2;
        }

        .overlay-text {
            padding: 60px 0;
            text-align: center;
            color: white;
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
    </style>
    <script>
    function updatePrice(currentValue) {
        const formattedValue = new Intl.NumberFormat('vi-VN').format(currentValue) + " VNĐ";
        document.getElementById("current-price").innerText = formattedValue;
    }

    function applyFilter() {
        document.getElementById("filter-form").submit();
    }

    $(document).ready(function () {
        $('.add-to-cart').on('click', function () {
            const productId = $(this).data('product-id');
            $.ajax({
                url: 'add_to_cart.php',
                method: 'POST',
                data: { 
                    product_id: productId,
                    csrf_token: '<?php echo $_SESSION['csrf_token']; ?>'
                },
                success: function (response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('.cart-count').text(res.cart_count);
                    } else {
                        alert(res.message);
                    }
                },
                error: function () {
                    alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
                }
            });
        });

        $('.favorite-icon').on('click', function (e) {
            e.stopPropagation();
            const $this = $(this);
            const productId = $this.data('product-id');
            const isLiked = $this.hasClass('liked');
            const $container = $this.closest('.product-image');
            
            $.ajax({
                url: 'add_to_favorites.php',
                method: 'POST',
                data: { 
                    product_id: productId,
                    csrf_token: '<?php echo $_SESSION['csrf_token']; ?>'
                },
                success: function (response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('.favorite-count').text(res.favorite_count);
                        
                        if (res.action === 'added') {
                            $this.addClass('liked').css('color', '#ff0000');
                            if (!$container.find('.favorite-label').length) {
                                $container.append('<span class="favorite-label">Yêu thích</span>');
                            }
                            for (let i = 0; i < 3; i++) {
                                const $heart = $('<i class="fas fa-heart small-heart"></i>');
                                $container.append($heart);
                                $heart.css({
                                    left: $this.position().left + 15,
                                    top: $this.position().top - 10
                                });
                                $heart.animate({
                                    top: '-=50px',
                                    opacity: 0
                                }, 1000, function () {
                                    $heart.remove();
                                });
                            }
                        } else {
                            $this.removeClass('liked').css('color', '#ffffff');
                            $container.find('.favorite-label').remove();
                        }
                    } else {
                        alert(res.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('Có lỗi xảy ra khi thêm vào yêu thích.');
                }
            });
        });

        $('.magnify-icon').on('click', function (e) {
            e.stopPropagation();
        });

        $('.add-to-cart').on('click', function (e) {
            e.stopPropagation();
        });

        $('.product-item').hover(
            function() {
                $(this).find('.overlay').css('opacity', '1');
            },
            function() {
                $(this).find('.overlay').css('opacity', '0');
            }
        );

        $('.product-image').on('click', function(e) {
            e.preventDefault();
            $(this).siblings('.overlay').toggleClass('active');
        });

        $('.product-actions a, .product-actions i').on('click', function(e) {
            e.stopPropagation();
        });
    });
    </script>
</head>

<body>
    <?php require "./header.php"; ?>
    <article style="
          background-image: url(https://petnow.com.vn/wp-content/uploads/2023/08/bg-featured-title.jpg);
        ">
        <div class="overlay-text">
            <h1><b>Giống Chó</b></h1>
            <p><a href="#!">HOME</a> / Giống Chó</p>
        </div>
    </article>
    <main>
        <div class="main">
            <div class="main_main1">
                <div class="main_main2">
                    <input placeholder="Search here" type="text" />
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="filter-section">
                    <h3>Bộ lọc</h3>
                    <form id="filter-form" method="post" action="">
                        <div class="price-range">
                            <h4>Mức Giá</h4>
                            <span id="min-price">500.000 ₫</span>
                            <input id="price-range" name="end_gia" max="20000000" min="500000" step="500000"
                                oninput="updatePrice(this.value)" type="range" value="<?php echo isset($end_gia) && $end_gia != PHP_INT_MAX ? $end_gia : 20000000; ?>" />
                            <span id="current-price"><?php echo number_format(isset($end_gia) && $end_gia != PHP_INT_MAX ? $end_gia : 20000000, 0, ',', '.') . ' ₫'; ?></span>
                            <input type="hidden" name="start_gia" value="<?php echo $start_gia; ?>" />
                        </div>
                        <div class="categories-section">
                            <h4>Loại chó</h4>
                            <select name="giong">
                                <option value="">Tất cả</option>
                                <option value="Chó Alaska" <?php echo ($giongthucung === 'Chó Alaska') ? 'selected' : ''; ?>>Chó Alaska</option>
                                <option value="Chó Poodle" <?php echo ($giongthucung === 'Chó Poodle') ? 'selected' : ''; ?>>Chó Poodle</option>
                                <option value="Chó Phốc sóc" <?php echo ($giongthucung === 'Chó Phốc sóc') ? 'selected' : ''; ?>>Chó Phốc sóc</option>
                                <option value="Chó Corgi" <?php echo ($giongthucung === 'Chó Corgi') ? 'selected' : ''; ?>>Chó Corgi</option>
                                <option value="Chó Chihuahua" <?php echo ($giongthucung === 'Chó Chihuahua') ? 'selected' : ''; ?>>Chó Chihuahua</option>
                                <option value="Chó Labrador" <?php echo ($giongthucung === 'Chó Labrador') ? 'selected' : ''; ?>>Chó Labrador</option>
                                <option value="Chó Bull Pháp" <?php echo ($giongthucung === 'Chó Bull Pháp') ? 'selected' : ''; ?>>Chó Bull Pháp</option>
                                <option value="Chó Bichon" <?php echo ($giongthucung === 'Chó Bichon') ? 'selected' : ''; ?>>Chó Bichon</option>
                                <option value="Chó Husky" <?php echo ($giongthucung === 'Chó Husky') ? 'selected' : ''; ?>>Chó Husky</option>
                                <option value="Chó Golden" <?php echo ($giongthucung === 'Chó Golden') ? 'selected' : ''; ?>>Chó Golden</option>
                                <option value="Chó Pug" <?php echo ($giongthucung === 'Chó Pug') ? 'selected' : ''; ?>>Chó Pug</option>
                            </select>
                        </div>
                        <div class="filter-button">
                            <button type="submit">LỌC</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main1">
                <div class="pagination">
                    <div class="results">Hiển thị <?php echo $page; ?>/<?php echo $totalPage; ?> của
                        <?php echo $totalRows; ?> kết quả
                    </div>
                    <div class="sort">
                        <select>
                            <option>Mới nhất</option>
                            <option>Thứ tự theo mức độ phổ biến</option>
                            <option>Thứ tự theo điểm đánh giá</option>
                            <option>Thứ tự theo giá: thấp đến cao</option>
                            <option>Thứ tự theo giá: cao xuống thấp</option>
                        </select>
                    </div>
                </div>
                <div class="product-list">
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="./quantri/anh/<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['pet_name']); ?>" />
                                <div class="overlay">
                                    <div class="product-actions">
                                        <i class="fas fa-heart favorite-icon <?php echo in_array($row['pet_id'], $_SESSION['favorites'] ?? []) ? 'liked' : ''; ?>" 
                                           data-product-id="<?php echo htmlspecialchars($row['pet_id']); ?>"
                                           style="color: <?php echo in_array($row['pet_id'], $_SESSION['favorites'] ?? []) ? '#ff0000' : '#ffffff'; ?>"></i>
                                        <a href="chitietthucung.php?pet_id=<?php echo htmlspecialchars($row['pet_id']); ?>"><i class="fas fa-search"></i></a>
                                        <a href="#"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                    <button class="add-to-cart" data-product-id="<?php echo htmlspecialchars($row['pet_id']); ?>">
                                        MUA HÀNG <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <?php if (in_array($row['pet_id'], $_SESSION['favorites'] ?? [])) { ?>
                                    <span class="favorite-label">Yêu thích</span>
                                <?php } ?>
                            </div>
                            <div class="product-info">
                                <div class="product-meta">
                                    <span>ID: #<?php echo htmlspecialchars($row['pet_id']); ?></span>
                                </div>
                                <h4><?php echo htmlspecialchars($row['pet_name']); ?></h4>
                                <p><?php echo number_format($row['price'], 0, ',', '.'); ?>đ</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="paginati">
                    <p id="pagination">
                        <?php
                        if ($page > 1) {
                            echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page - 1) . '">Trước</a>';
                        }

                        for ($i = 1; $i <= $totalPage; $i++) {
                            if ($i == $page) {
                                echo " <span>" . $i . "</span> ";
                            } else {
                                echo ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a> ';
                            }
                        }

                        if ($page < $totalPage) {
                            echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page + 1) . '">Sau</a>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="icons">
            <a href="#">
                <img src="./images/image_trangchu/icon-zalo.svg" width="60" height="60" alt="Zalo icon" />
            </a>
            <a href="#">
                <img src="./images/image_trangchu/icon-messenger.svg" height="60" width="60" alt="Messenger icon" />
            </a>
            <a class="mon" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
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
    <?php include_once('footer.php'); ?>
</body>
</html>