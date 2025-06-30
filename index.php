<?php
session_start();
require "./cauhinh/ketnoi.php";
require "./header.php";

if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop</title>
    <link rel="stylesheet" href="./css/giongcho.css" />
    <!-- Thêm thư viện cần thiết -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .slide {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
    }

    .slide_show {
        position: relative;
        width: 100%;
        max-width: 1000px;
        height: 600px;
        overflow: hidden;
    }

    .list_images {
        display: flex;
        transition: transform 0.5s ease-in-out;
        height: 100%;
    }

    .list_images img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .ABC {
        font-size: 30px;
        color: #999;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        transition: 0.5s;
        cursor: pointer;
        z-index: 1000;
    }

    .ABC.left {
        left: 20px;
    }

    .ABC.right {
        right: 20px;
    }

    .ABC:hover {
        color: #fff;
    }

    h1, h4, .pinput {
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 40px;
        font-weight: 600;
        text-align: center;
        color: #ff6347;
        margin: 50px 0;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    h4 {
        margin-top: 10px;
        font-size: 30px;
        font-weight: 500;
        color: #333;
        text-align: center;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    h4:hover {
        color: #ff6347;
    }

    .pinput {
        font-size: 24px;
        color: #888;
        text-align: center;
        margin-bottom: 20px;
    }

    .Xemthem {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .Xemthem a {
        text-decoration: none;
        color: #ff6347;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .Xemthem i {
        margin-left: 8px;
        font-size: 18px;
    }

    .product-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 20px;
        padding: 0;
    }

    .product-item {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 30px;
        position: relative;
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
        object-fit: cover;
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
        font-weight: bold;
    }

    .add-to-cart:hover {
        background: #ff5252;
        transform: translateY(-3px);
    }

    .product-info {
        padding: 15px;
        text-align: left;
    }

    .product-meta {
        margin-bottom: 5px;
        font-size: 12px;
        color: #777;
    }

    .product-info h4 {
        margin: 0 0 5px 0;
        font-size: 16px;
        font-weight: 600;
        color: #333;
        text-transform: uppercase;
    }

    .product-info p {
        font-weight: bold;
        color: #ff6b6b;
        font-size: 16px;
        margin: 0;
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

    .small-heart {
        position: absolute;
        color: #ff0000;
        font-size: 12px;
        pointer-events: none;
    }

    .liked {
        color: #ff0000 !important;
    }

    @media (max-width: 768px) {
        .slide_show {
            height: 300px;
        }
        .list_images img {
            height: 300px;
        }
        .product-list {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
        h1 {
            font-size: 30px;
        }
        h4 {
            font-size: 24px;
        }
        .pinput {
            font-size: 20px;
        }
    }
</style>
</head>
<!-- slideshow -->
<div class="slide">
    <div class="slide_show">
        <div class="list_images">
            <img src="./images/slideshow/slideshow1.jpg" alt="Slideshow 1" />
            <img src="./images/slideshow/slideshow2.jpg" alt="Slideshow 2" />
            <img src="./images/slideshow/slideshow3.jpg" alt="Slideshow 3" />
            <img src="./images/slideshow/slideshow4.jpg" alt="Slideshow 4" />
            <img src="./images/slideshow/slideshow5.jpg" alt="Slideshow 5" />
        </div>
        <div class="btns">
            <div class="ABC left"><i class="fa-solid fa-angle-left fa-xl"></i></div>
            <div class="ABC right"><i class="fa-solid fa-angle-right fa-xl"></i></div>
        </div>
    </div>
</div>

<!-- sản phẩm chó -->
<div class="Sanphamcho">
    <div class="main-content">
        <div class="sanpham">
            <h1>Sản phẩm mới</h1>
            <div class="product-list">
                <?php
                $sqlDogs = "SELECT * FROM pets WHERE pet_type = 'Chó' ORDER BY RAND() LIMIT 6";
                $resultDogs = mysqli_query($conn, $sqlDogs);

                if (mysqli_num_rows($resultDogs) > 0) {
                    while ($dog = mysqli_fetch_assoc($resultDogs)) {
                ?>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="./quantri/anh/<?php echo htmlspecialchars($dog['image_url']); ?>" alt="<?php echo htmlspecialchars($dog['pet_name']); ?>" />
                                <div class="overlay">
                                    <div class="product-actions">
                                        <i class="fas fa-heart favorite-icon" data-product-id="<?php echo htmlspecialchars($dog['pet_id']); ?>"></i>
                                        <a href="chitietthucung.php?pet_id=<?php echo htmlspecialchars($dog['pet_id']); ?>"><i class="fas fa-search"></i></a>
                                        <a href="#"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                    <button class="add-to-cart" data-product-id="<?php echo htmlspecialchars($dog['pet_id']); ?>">
                                        MUA HÀNG <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-meta">
                                    <span>ID: #<?php echo htmlspecialchars($dog['pet_id']); ?></span>
                                </div>
                                <h4><?php echo htmlspecialchars($dog['pet_name']); ?></h4>
                                <p><?php echo number_format($dog['price'], 0, ',', '.'); ?>đ</p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Không có sản phẩm chó nào.</p>";
                }
                ?>
            </div>
            <div class="Xemthem"><a href="cho.php">Xem thêm<i class="fa-solid fa-angle-right fa-2xl"></i></a></div>
        </div>
    </div>
</div>

<!-- sản phẩm mèo -->
<div class="Sanphammeo">
    <div class="main-content">
        <div class="sanpham">
            <h1>Sản phẩm nổi bật</h1>
            <div class="product-list">
                <?php
                $sqlCats = "SELECT * FROM pets WHERE pet_type = 'Mèo' ORDER BY RAND() LIMIT 6";
                $resultCats = mysqli_query($conn, $sqlCats);

                if (mysqli_num_rows($resultCats) > 0) {
                    while ($cat = mysqli_fetch_assoc($resultCats)) {
                ?>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="./quantri/anh/<?php echo htmlspecialchars($cat['image_url']); ?>" alt="<?php echo htmlspecialchars($cat['pet_name']); ?>" />
                                <div class="overlay">
                                    <div class="product-actions">
                                        <i class="fas fa-heart favorite-icon" data-product-id="<?php echo htmlspecialchars($cat['pet_id']); ?>"></i>
                                        <a href="chitietthucung.php?pet_id=<?php echo htmlspecialchars($cat['pet_id']); ?>"><i class="fas fa-search"></i></a>
                                        <a href="#"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                    <button class="add-to-cart" data-product-id="<?php echo htmlspecialchars($cat['pet_id']); ?>">
                                        MUA HÀNG <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-meta">
                                    <span>ID: #<?php echo htmlspecialchars($cat['pet_id']); ?></span>
                                </div>
                                <h4><?php echo htmlspecialchars($cat['pet_name']); ?></h4>
                                <p><?php echo number_format($cat['price'], 0, ',', '.'); ?>đ</p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Không có sản phẩm mèo nào.</p>";
                }
                ?>
            </div>
            <div class="Xemthem"><a href="meo.php">Xem thêm<i class="fa-solid fa-angle-right fa-2xl"></i></a></div>
        </div>
    </div>
</div>

<!-- quyền lợi -->
<h1 class="title title1">Quyền lợi khi mua hàng tại Petshop</h1>
<div class="ten">
    <div class="item">
        <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-1.gif" width="250" height="250" alt="Biểu tượng miễn phí vận chuyển toàn quốc" />
        <p>Miễn phí vận chuyển toàn quốc</p>
    </div>
    <div class="item">
        <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-3.gif" width="250" height="250" alt="Biểu tượng quà tặng hấp dẫn" />
        <p>Bộ quà tặng trị giá 500k</p>
    </div>
    <div class="item">
        <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-4.gif" width="250" height="250" alt="Biểu tượng cam kết chất lượng" />
        <p>Hợp đồng mua bán - Cam kết rõ ràng</p>
    </div>
    <div class="item">
        <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-2.gif" width="250" height="250" alt="Biểu tượng bảo hành sức khỏe thú cưng" />
        <p>Bảo hành sức khỏe - Hỗ trợ trọn đời</p>
    </div>
</div>

<?php include_once('footer.php'); ?>

<script>
$(document).ready(function() {
    // ========== SLIDESHOW ==========
    const slider = $('.list_images');
    const slides = $('.list_images img');
    const slideCount = slides.length;
    let currentIndex = 0;
    let slideInterval;
    
    // Thiết lập kích thước slider
    function initSlider() {
        slider.css('width', `${slideCount * 100}%`);
        slides.css('width', `${100 / slideCount}%`);
    }
    
    // Chuyển đến slide cụ thể
    function goToSlide(index) {
        if (index < 0) {
            index = slideCount - 1;
        } else if (index >= slideCount) {
            index = 0;
        }
        
        currentIndex = index;
        const translateValue = -currentIndex * (100 / slideCount);
        slider.css('transform', `translateX(${translateValue}%)`);
    }
    
    // Chuyển đến slide tiếp theo
    function nextSlide() {
        goToSlide(currentIndex + 1);
    }
    
    // Chuyển về slide trước
    function prevSlide() {
        goToSlide(currentIndex - 1);
    }
    
    // Tự động chuyển slide
    function startAutoSlide() {
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    // Dừng tự động chuyển
    function stopAutoSlide() {
        clearInterval(slideInterval);
    }
    
    // Khởi tạo slider
    initSlider();
    startAutoSlide();
    
    // Sự kiện khi hover vào slider
    $('.slide_show').hover(
        function() {
            stopAutoSlide();
        },
        function() {
            startAutoSlide();
        }
    );
    
    // Sự kiện click nút điều hướng
    $('.ABC.right').click(function() {
        nextSlide();
        stopAutoSlide();
        startAutoSlide();
    });
    
    $('.ABC.left').click(function() {
        prevSlide();
        stopAutoSlide();
        startAutoSlide();
    });

    // ========== CÁC CHỨC NĂNG KHÁC GIỮ NGUYÊN ==========
    // Add to cart
    $('.add-to-cart').on('click', function() {
        const productId = $(this).data('product-id');
        const csrfToken = '<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>';
        $.ajax({
            url: 'add_to_cart.php',
            method: 'POST',
            data: { product_id: productId, csrf_token: csrfToken },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    $('.cart-count').text(res.cart_count);
                } else {
                    alert(res.message);
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
            }
        });
    });

    // Favorite icon
    $('.favorite-icon').on('click', function(e) {
        e.stopPropagation();
        const $this = $(this);
        const productId = $this.data('product-id');
        const isLiked = $this.hasClass('liked');
        const $container = $this.closest('.product-image');

        if (!isLiked) {
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
                }, 1000, function() {
                    $heart.remove();
                });
            }
        } else {
            $this.removeClass('liked').css('color', '#ffffff');
            $container.find('.favorite-label').remove();
        }
    });

    // Product hover effect
    $('.product-item').hover(
        function() {
            $(this).find('.overlay').css('opacity', '1');
        },
        function() {
            $(this).find('.overlay').css('opacity', '0');
        }
    );

    // Prevent event bubbling
    $('.product-actions a, .product-actions i').on('click', function(e) {
        e.stopPropagation();
    });
});
</script>

<?php include_once('footer.php'); ?>
</body>
</html>