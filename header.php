<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tạo CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<header class="header">
    <div class="main-content">
        <div class="body-header">
            <a href="index.php" class="logo-link">
                <img src="./images/image_trangchu/logo.png" alt="Logo Petshop" class="logo" />
            </a>
            <nav>
                <ul class="navbar">
                    <li class="navbar_item active">
                        <a href="index.php" class="navbar_item_label">Trang chủ</a>
                    </li>
                    <li class="navbar_item">
                        <a href="thucung.php" class="navbar_item_label">Thú cưng <i class="fas fa-caret-down"></i></a>
                        <ul class="navbar_item_dropdown">
                            <li class="dropdown_item"><a href="cho.php">Giống chó</a></li>
                            <li class="dropdown_item"><a href="meo.php">Giống mèo</a></li>
                        </ul>
                    </li>
                    <li class="navbar_item">
                        <a href="dichvu.php" class="navbar_item_label">Dịch vụ <i class="fas fa-caret-down"></i></a>
                        <ul class="navbar_item_dropdown">
                            <li class="dropdown_item"><a href="dichvu_spa.php">Spa-Tạo kiểu</a></li>
                            <li class="dropdown_item"><a href="dichvu_khachsan.php">Khách sạn-Lưu trữ</a></li>
                        </ul>
                    </li>
                    <li class="navbar_item">
                        <a href="gioithieu.php" class="navbar_item_label">Giới thiệu</a>
                    </li>
                    <li class="navbar_item">
                        <a href="lienhe.php" class="navbar_item_label">Liên hệ</a>
                    </li>
                    <li class="navbar_item">
                        <a href="./cart.php" class="cart-shopping">
                            <i class="fas fa-cart-plus"></i>
                            <span class="cart-count">
                                <?php echo isset($_SESSION['cart']) ? htmlspecialchars(count($_SESSION['cart'])) : '0'; ?>
                            </span>
                        </a>
                    </li>
                    <li class="navbar_item">
                        <a href="yeuthich.php" class="favorite-link">
                            <i class="fas fa-heart"></i>
                            <span class="favorite-count">
                                <?php echo isset($_SESSION['favorites']) ? htmlspecialchars(count($_SESSION['favorites'])) : '0'; ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="search-bar">
                    <form action="search.php" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                        <input type="text" name="timkiem" placeholder="Tìm kiếm thú cưng..." class="search-input" />
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</header>

<style>
    /* Reset và base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header {
        background: linear-gradient(135deg, #353A5F, #9EBAF3);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        z-index: 1000;
        min-height: 80px;
        display: flex;
        align-items: center;
        position: static;
    }

    .main-content {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .body-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 10px 0;
    }

    .logo {
        height: 75px;
        width: auto;
        padding: 5px 0;
        transition: transform 0.3s ease;
    }

    .logo:hover {
        transform: scale(1.05);
    }

    /* Navbar styles */
    .navbar {
        display: flex;
        list-style: none;
        margin: 0;
    }

    .navbar_item {
        position: relative;
        margin: 0 10px;
    }

    .navbar_item_label {
        display: flex;
        align-items: center;
        padding: 8px 15px;
        color: #2c3e50;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .navbar_item_label i {
        margin-left: 6px;
        transition: transform 0.3s ease;
    }

    .navbar_item:hover .navbar_item_label,
    .navbar_item.active .navbar_item_label {
        color: #77e23a;
    }

    .navbar_item:hover .navbar_item_label i {
        transform: rotate(180deg);
    }

    .navbar_item_dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        list-style: none;
        width: 220px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 100;
    }

    .navbar_item:hover .navbar_item_dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown_item a {
        display: block;
        padding: 10px 15px;
        color: #2c3e50;
        text-decoration: none;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .dropdown_item a:hover {
        background: #f8f9fa;
        color: #77e23a;
        padding-left: 20px;
    }

    /* Search bar */
    .search-bar {
        position: relative;
        display: flex;
        align-items: center;
        margin: 0 20px;
    }

    .search-input {
        padding: 8px 22px 8px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 25px;
        outline: none;
        width: 200px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #77e23a;
        box-shadow: 0 0 8px rgba(119, 226, 58, 0.3);
    }

    .search-button {
        background: none;
        border: none;
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #2c3e50;
        font-size: 14px;
        margin-left: 10px;
    }

    .search-button:hover {
        color: #77e23a;
    }

    .cart-shopping {
        color: #2c3e50;
        text-decoration: none;
        font-size: 25px;
        display: flex;
        align-items: center;
        margin-top: 10px;
        gap: 6px;
        transition: all 0.3s ease;
    }

    .cart-shopping:hover {
        color: #77e23a;
    }

    .cart-count {
        background: #ff0000;
        color: #fff;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 10px;
        font-weight: 600;
    }

    .favorite-link {
        color: #2c3e50;
        text-decoration: none;
        font-size: 25px;
        display: flex;
        align-items: center;
        margin-top: 10px;
        gap: 6px;
        transition: all 0.3s ease;
        position: relative;
    }

    .favorite-link:hover {
        color: #ff6b6b;
    }

    .favorite-count {
        background: #ff6b6b;
        color: #fff;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 10px;
        font-weight: 600;
        display: inline-block;
    }

    /* Animation for dropdown arrow */
    .navbar_item:hover .fa-caret-down {
        transform: rotate(180deg);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cập nhật số lượng yêu thích ban đầu
        const favoriteCount = <?php echo isset($_SESSION['favorites']) ? count($_SESSION['favorites']) : 0; ?>;
        document.querySelector('.favorite-count').textContent = favoriteCount;

        // Xử lý tìm kiếm
        const searchForm = document.querySelector('.search-bar form');
        const searchButton = document.querySelector('.search-button');
        searchForm.addEventListener('submit', function() {
            searchButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        });
    });
</script>