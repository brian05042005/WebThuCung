<footer class="custom-footer">
    <div class="footer-container">
        <div class="contact-column">
            <div class="section-header">
                <h1 class="accent-text">Liên Lạc</h1>
                <div class="accent-line"></div>
            </div>
            <ul class="contact-list">
                <li><i class="fas fa-map-marker-alt accent-icon"></i> <strong>Địa chỉ cs1 :</strong> 56/168 Thượng Đình - Thanh Xuân - Hà Nội</li>
                <li><i class="fas fa-map-marker-alt accent-icon"></i> <strong>Địa chỉ cs2 :</strong> 42 Cách Mạng Tháng 8 - Quận 3 - Hồ Chí Minh </li>
                <li><i class="fas fa-map-marker-alt accent-icon"></i> <strong>Địa chỉ cs3 :</strong> 116 Nguyễn Văn Thủ - Quận 1 - Hồ Chí Minh</li>
                <li><i class="fas fa-phone accent-icon"></i> <strong>Điện thoại:</strong> <a href="tel:0918720115" class="accent-link">0918720115</a></li>
                <li><i class="fas fa-envelope accent-icon"></i> <strong>Email:</strong> <a href="mailto:petshop2025@gmail.com" class="accent-link">petshop2025@gmail.com</a></li>
            </ul>
        </div>

        <div class="social-column">
            <div class="section-header">
                <h2>FOLLOW</h2>
                <div class="secondary-line"></div>
            </div>
            
            <a href="https://instagram.com" target="_blank" class="social-card instagram">
                <i class="fab fa-instagram"></i>
                <span>INSTAGRAM</span>
            </a>
            
            <a href="https://facebook.com" target="_blank" class="social-card facebook">
                <i class="fab fa-facebook-f"></i>
                <span>FACEBOOK</span>
                <p class="page-name">Pet Shop</p>
            </a>
            
            <a href="https://youtube.com" target="_blank" class="social-card youtube">
                <i class="fab fa-youtube"></i>
                <span>YOUTUBE</span>
                <p class="channel-list">Pet Shop</p> 
            </a>
        </div>

        <div class="quick-column">
            <a href="./index.php" class="quick-card home">
                <i class="fas fa-home"></i>
                <span>HOME</span>
            </a>
            
            <a href="https://m.me/cqu.018h" target="_blank" class="quick-card messenger">
                <i class="fab fa-facebook-messenger"></i>
                <span>MESSENGER</span>
                <p class="messenger-id"></p>
            </a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2025 Pet Shop.All rights reserved</p>
    </div>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

<style>
  
    :root {
        --primary-color: #2C3E50;    
        --secondary-color: #34495E;   
        --accent-color: #1ABC9C;     
        --text-color: #ECF0F1;       
        --text-light: #BDC3C7;       
        
        --font-main: 'Montserrat', sans-serif;
        --font-secondary: 'Open Sans', sans-serif;
        --card-radius: 10px;         
        --hover-effect: translateY(-5px); 
    }

    .custom-footer {
        background: var(--primary-color);
        color: var(--text-color);
        padding: 60px 0 30px;
        font-family: var(--font-main);
        position: relative;
        z-index: 1;
    }

    .footer-container {
        display: grid;
        grid-template-columns: 1.5fr 1fr 0.8fr;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
        gap: 60px;
    }

    .section-header {
        margin-bottom: 30px;
    }
    
    .accent-text {
        color: var(--accent-color);
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .accent-line {
        width: 50px;
        height: 3px;
        background: var(--accent-color);
        margin-top: 10px;
    }
    
    .secondary-line {
        width: 50px;
        height: 2px;
        background: var(--text-color);
        margin-top: 10px;
    }

    .contact-list {
        list-style: none;
    }
    
    .contact-list li {
        margin-bottom: 18px;
        font-size: 15px;
        display: flex;
        align-items: flex-start;
        line-height: 1.6;
        font-family: var(--font-secondary);
    }
    
    .accent-icon {
        color: var(--accent-color);
        margin-right: 12px;
        font-size: 16px;
        min-width: 20px;
        text-align: center;
    }
    
    .accent-link {
        color: var(--accent-color);
        text-decoration: none;
        transition: opacity 0.3s;
    }
    
    .accent-link:hover {
        opacity: 0.8;
        text-decoration: underline;
    }

    .social-card, .quick-card {
        display: block;
        background: var(--secondary-color);
        padding: 20px;
        border-radius: var(--card-radius);
        margin-bottom: 20px;
        color: var(--text-color);
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    
    .social-card:hover, .quick-card:hover {
        transform: var(--hover-effect);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    
    .social-card i, .quick-card i {
        font-size: 20px;
        margin-right: 15px;
        width: 24px;
        text-align: center;
    }
    .instagram { border-left-color: #E1306C; }
    .instagram i { color: #E1306C; }
    
    .facebook { border-left-color: #3B5998; }
    .facebook i { color: #3B5998; }
    
    .youtube { border-left-color: #FF0000; }
    .youtube i { color: #FF0000; }
    
    .home { border-left-color: #4CAF50; }
    .home i { color: #4CAF50; }
    
    .messenger { border-left-color: #0084FF; }
    .messenger i { color: #0084FF; }

    .page-name, .messenger-id {
        margin: 10px 0 0 39px;
        color: var(--accent-color);
        font-weight: 500;
        font-size: 14px;
    }
    
    .channel-list {
        list-style: none;
        margin: 10px 0 0 39px;
    }
    
    .channel-list li {
        position: relative;
        padding-left: 15px;
        margin-bottom: 8px;
        font-size: 14px;
        font-family: var(--font-secondary);
    }
    
    .channel-list li::before {
        content: "•";
        color: var(--accent-color);
        position: absolute;
        left: 0;
        font-size: 18px;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 60px;
        padding-top: 25px;
        border-top: 1px solid rgba(255,255,255,0.1);
        color: var(--text-light);
        font-size: 14px;
        font-family: var(--font-secondary);
    }

    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }
</style>