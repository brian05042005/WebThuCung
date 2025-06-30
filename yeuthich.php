<?php
session_start();
require "./cauhinh/ketnoi.php";
require "./header.php";

$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

if (empty($favorites)) {
    $message = "Bạn chưa có sản phẩm yêu thích nào.";
    $products = [];
} else {
    $placeholders = implode(',', array_fill(0, count($favorites), '?'));
    $sql = "SELECT * FROM pets WHERE pet_id IN ($placeholders)";
    $stmt = mysqli_prepare($conn, $sql);
    
    $types = str_repeat('i', count($favorites));
    mysqli_stmt_bind_param($stmt, $types, ...$favorites);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm yêu thích</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .favorites-container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .favorites-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }
        
        .favorites-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .empty-message {
            text-align: center;
            font-size: 18px;
            color: #666;
            margin-top: 50px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
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
    </style>
</head>
<body>
    <div class="favorites-container">
        <h1 class="favorites-title">Sản phẩm yêu thích của bạn</h1>
        
        <?php if (!empty($message)): ?>
            <p class="empty-message"><?php echo htmlspecialchars($message); ?></p>
        <?php else: ?>
            <div class="product-list">
                <?php foreach ($products as $row): ?>
                    <div class="product-item">
                        <div class="product-image">
                            <img src="./quantri/anh/<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['pet_name']); ?>" />
                            <div class="overlay">
                                <div class="product-actions">
                                    <i class="fas fa-heart favorite-icon liked" data-product-id="<?php echo htmlspecialchars($row['pet_id']); ?>" style="color: #ff0000;"></i>
                                    <a href="chitietthucung.php?pet_id=<?php echo htmlspecialchars($row['pet_id']); ?>"><i class="fas fa-search"></i></a>
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                </div>
                                <button class="add-to-cart" data-product-id="<?php echo htmlspecialchars($row['pet_id']); ?>">
                                    MUA HÀNG <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <span class="favorite-label">Yêu thích</span>
                        </div>
                        <div class="product-info">
                            <div class="product-meta">
                                <span>ID: #<?php echo htmlspecialchars($row['pet_id']); ?></span>
                            </div>
                            <h4><?php echo htmlspecialchars($row['pet_name']); ?></h4>
                            <p><?php echo number_format($row['price'], 0, ',', '.'); ?>đ</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <?php include_once('footer.php'); ?>
    
    <script>
        $(document).ready(function() {
            // Xử lý xóa sản phẩm khỏi danh sách yêu thích
            $('.favorite-icon').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Ngăn sự kiện click lan ra các phần tử cha
                const $this = $(this);
                const productId = $this.data('product-id');
                const $productItem = $this.closest('.product-item');
                
                $.ajax({
                    url: 'add_to_favorites.php',
                    method: 'POST',
                    data: { 
                        product_id: productId,
                        csrf_token: '<?php echo $_SESSION['csrf_token']; ?>'
                    },
                    success: function(response) {
                        try {
                            const res = JSON.parse(response);
                            if (res.status === 'success') {
                                // Cập nhật số lượng yêu thích trên navbar
                                const favoriteCountElement = $('.favorite-count');
                                if (favoriteCountElement.length) {
                                    favoriteCountElement.text(res.favorite_count);
                                } else {
                                    console.error('Không tìm thấy phần tử .favorite-count');
                                }

                                // Xóa sản phẩm khỏi danh sách
                                $productItem.fadeOut(300, function() {
                                    $(this).remove();
                                    if ($('.product-item').length === 0) {
                                        $('.product-list').html('<p class="empty-message">Bạn chưa có sản phẩm yêu thích nào.</p>');
                                    }
                                });
                            } else {
                                alert(res.message);
                            }
                        } catch (error) {
                            console.error('Lỗi khi parse JSON:', error, response);
                            alert('Đã có lỗi xảy ra khi xử lý yêu thích.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error, xhr.responseText);
                        alert('Có lỗi xảy ra khi xóa khỏi yêu thích.');
                    }
                });
            });

            // Xử lý thêm sản phẩm vào giỏ hàng
            $('.add-to-cart').on('click', function(e) {
                e.stopPropagation(); // Ngăn sự kiện click lan ra các phần tử cha
                const productId = $(this).data('product-id');
                $.ajax({
                    url: 'add_to_cart.php',
                    method: 'POST',
                    data: { 
                        product_id: productId,
                        csrf_token: '<?php echo $_SESSION['csrf_token']; ?>'
                    },
                    success: function(response) {
                        try {
                            const res = JSON.parse(response);
                            if (res.status === 'success') {
                                // Cập nhật số lượng giỏ hàng trên navbar
                                const cartCountElement = $('.cart-count');
                                if (cartCountElement.length) {
                                    cartCountElement.text(res.cart_count);
                                } else {
                                    console.error('Không tìm thấy phần tử .cart-count');
                                }
                            } else {
                                alert(res.message);
                            }
                        } catch (error) {
                            console.error('Lỗi khi parse JSON:', error, response);
                            alert('Đã có lỗi xảy ra khi thêm vào giỏ hàng.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error, xhr.responseText);
                        alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
                    }
                });
            });

            // Ngăn sự kiện click trên các nút hành động lan ra ngoài
            $('.product-actions a, .product-actions i').on('click', function(e) {
                e.stopPropagation();
            });

            // Xử lý hover để hiển thị overlay
            $('.product-item').hover(
                function() {
                    $(this).find('.overlay').css('opacity', '1');
                },
                function() {
                    $(this).find('.overlay').css('opacity', '0');
                }
            );

            // Xử lý click trên ảnh sản phẩm để toggle overlay
            $('.product-image').on('click', function(e) {
                e.preventDefault();
                $(this).siblings('.overlay').toggleClass('active');
            });
        });
    </script>
</body>
</html>