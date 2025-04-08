<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moai Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="header">
        <!-- Top bar -->
        <div class="top-bar">
            <div class="slogan">
                <span>Moai - Reputation creates brand</span>
            </div>
            <div class="header-contact">
                <span><i class="fa-regular fa-envelope"></i> moai445@gmail.com</span>
                <span><i class="fa-solid fa-phone"></i> Hotline: 0987654321</span>
            </div>
        </div>
        <!-- Logo, Search bar, Cart, Account -->
        <div class="main-header">
            <div class="logo">
                <a href="main.html">Moai Shop</a>
            </div>
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Search...">
                <button type="submit" onclick="searchProduct()">
                    <i class="fas fa-search"></i>
            </div>
            <div class="left-button">
                <button onclick="toCart()"><i class="fa-solid fa-cart-shopping"></i> Cart</button>
                <button onclick="toAccount()"><i class="fa-solid fa-user"></i> Account</button>
            </div>
        </div>
        <!-- Navigation -->
        <div class="navigation">
            <div class="dropdown-menu">
                <a href="" class="categories"><i class="fa-solid fa-list"></i> Categories
                    <div class="sub-menu">
                        <a href="#tivi-list">Television</a>
                        <a href="#ac-list">Air Conditioner</a>
                        <a href="#refrigerator-list">Refrigerator</a>
                        <a href="#microwave-list">Microwave</a>
                        <a href="#cooker-list">Rice cooker</a>
                    </div>
                </a>
            </div>
            <div class="admin-nav">
                <a href="../UserManagement/userManagement.php" style="<?php echo ($_SESSION['role'] === 'admin') ? '' : 'display: none;'; ?>">
                    UM </a>
                <a href="../ProductManagement/productManagement.php" style="<?php echo ($_SESSION['role'] === 'admin') ? '' : 'display: none;'; ?>">
                    PM </a>
                <script>
                if (userRole === 'admin') {
                    document.getElementById('manageUsersBtn').style.display = 'block';
                    document.getElementById('manageProductsBtn').style.display = 'block';
                } else {
                    document.getElementById('manageUsersBtn').style.display = 'none';
                    document.getElementById('manageProductsBtn').style.display = 'none';
                }
                </script>
            </div>
            <div class="other-nav">
                <a href="index.html">Home Page</a>
                <a href="intro.html">About Us</a>
                <a href="blog.html">Blog</a>
                <a href="contact.html">Contact Us</a>
            </div>
        </div>
        <div class="slideshow-container">
            <div class="slide fade"><img
                    src="https://img.pikbest.com/backgrounds/20190504/color-tv-promotion-orange-geometric-banner_1821660.jpg!w700wp"
                    alt="Slide 1">
            </div>
            <div class="slide fade"><img
                    src="https://png.pngtree.com/background/20210711/original/pngtree-fresh-cool-cool-taobao-refrigerator-poster-banner-picture-image_1106982.jpg"
                    alt="Slide 2">
            </div>
            <div class="slide fade"><img
                    src="https://www.tiger-corporation.com/contents/product/rice-cooker/jpf-g/images/JPF-G055_MV2.jpg"
                    alt="Slide 3">
            </div>  
        </div>
    </div>

    <div class="content">
        <!-- Best Seller Bar -->
        <div class="best-seller">
            <div class="title">
                <i class="fa-solid fa-fire"></i>
                <h2>Best Seller</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/tivi/75qned80tsa-atv-eavh-vn-c/gallery/2010-1.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 1">
                    <h3>TV LG QNED </h3>
                    <p>$1,207.40</p>
                    <p>$1,715.36</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/img24/tu-lanh-2024/lfd61blga/gallery1/dz1.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 2">
                    <h3>LG French Door Refrigerator</h3>
                    <p>$2,148.70</p>
                    <p>$1,207.40</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/dieu-hoa/iec18m1/DZ_1.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 3">
                    <h3>LG DUALCOOL™Inverter</h3>
                    <p>$824.08</p>
                    <p>$742.02</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/tu-lanh/ms2032gas_bbkplvn_eavh_vn_c/gallery/DZ-1.jpg"
                        alt="Product 3">
                    <h3>LG NeoChef™</h3>
                    <p>$109.02</p>
                    <p>$77.76</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- New Product Bar -->
        <div class="new-product">
            <div class="title">
                <h2>New Products</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <div class="new-label">New</div>
                    <img class="img"
                        src="https://www.lg.com/content/dam/channel/wcms/vn/images/tivi/oled83m4psa_atv_eavh_vn_c/gallery/oled-m4-83-a-gallery-01-webos.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 1" class="responsive">
                    <h3 id="name">LG OLED evo AI 144HZ </h3>
                    <p id="1st-price">$7,761.96</p>
                    <p class="second-price">$6,591.81</p>.
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <div class="new-label">New</div>
                    <img class="img" src="https://sunhouse.com.vn/pic/thumb/large/product/1(843).jpg" alt="Product 2" class="responsive">
                    <h3 id="name">Sunhouse 1.8L Electronic</h3>
                    <p id="1st-price">$85.42</p>
                    <p class="second-price">$40.96</p>
                    <button ><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <div class="new-label">New</div>
                    <img class="img"
                        src="https://www.panasonic.com/content/dam/pim/vn/vi/NR/NR-WY7/NR-WY720ZHHV/ast-2025286.png.pub.png?resize=272%3A204"
                        alt="Product 3" class="responsive">
                    <h3 id="name">High-end 6-door Refrigerator</h3>
                    <p id="1st-price">$6,240.77</p>
                    <p class="second-price">$5,608.50</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <div class="new-label">New</div>
                    <img class="img"
                        src="https://www.panasonic.com/content/dam/pim/vn/vi/RA/RAC-CS/RAC-CS-XU-BKH-VN-SPP/ast-2632099.png.pub.png?resize=272%3A204"
                        alt="Product 4" class="responsive">
                    <h3 id="name">Premium AERO Inverter DC</h3>
                    <p id="1st-price">$776.20</p>
                    <p class="second-price">$667.76</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Brand Bar -->
        <div class="brand-bar">
            <div class="title">
                <h2>Prestigious brands</h2>
            </div>
            <div class="brands">
                <img src="https://www.lg.com/content/dam/lge/common/logo/logo-lg-100-44.svg" alt="Lg Logo">
                <img src="https://www.panasonic.com/content/dam/Panasonic/plogo.svg" alt="Panasonic Logo">
                <img src="https://sunhouse.com.vn/pic/banner/logo.png" alt="Sunhouse Logo">
                <img src="https://vn.sharp/sites/default/files/styles/large/public/logo_sharp.png?itok=EhVcmlhj"
                    alt="Sharp Logo">
            </div>
        </div>
        <!-- Tivi Bar -->
        <div class="tivi-list" id="tivi-list">
            <div class="title">
                <h2>Television</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/TH/TH-65M/TH-65MX650V/ast-2035243.png.pub.png?resize=272%3A204"
                        alt="Product 1">
                    <h3>MX650 4K Google TV™</h3>
                    <p>$975.12</p>
                    <p>$897.11</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/TH/TH-55L/TH-55LX800V/ast-1623533.png.pub.png?resize=272%3A204"
                        alt="Product 2">
                    <h3>Android TV™ LX800 Series 4K</h3>
                    <p>$932.21</p>
                    <p>$850.30</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/tivi/oled55g4psa_atv_eavh_vn_c/gallery/oled-g4-55-a-gallery-01-warranty-global.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 3">
                    <h3>TV LG 55 Inch OLED</h3>
                    <p>$2,141.36</p>
                    <p>$1,946.34</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/tivi/98qned89tsa_atvq_eavh_vn_c/gallery/large01.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 4">
                    <h3>LG QNED 4K 98 inch</h3>
                    <p>$5,456.77</p>
                    <p>$4,286.63</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- AC Bar -->
        <div class="ac-list" id="ac-list">
            <div class="title">
                <h2>Air Conditioner</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/RA/RAC-CS/RAC-CS-VU-VN-SPP/ast-2089698.png.pub.png?resize=272%3A204"
                        alt="Product 1">
                    <h3>VU Series - Luxury Inverter</h3>
                    <p>$971.22</p>
                    <p>$824.95</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/RA/RAC-CS/RAC-CS-XPU-VN-SPP/ast-2119125.png.pub.png?resize=272%3A204"
                        alt="Product 2">
                    <h3>XPU Series - Standard Inverter</h3>
                    <p>$581.17</p>
                    <p>$497.31</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/dieu-hoa/v13win_atwgevh_eavh_vn_c/gallery/large01.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 3">
                    <h3>LG DUALCOOL™1-way Inverter</h3>
                    <p>$565.18</p>
                    <p>$497.31</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/images/dieu-hoa/md05810812/gallery/large01.jpg"
                        alt="Product 4">
                    <h3>LG DUALCOOL™ 2-way Inverter</h3>
                    <p>$1,478.28</p>
                    <p>$1,309.78</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Refrigerator Bar -->
        <div class="refrigerator-list" id="refrigerator-list">
            <div class="title">
                <h2>Refrigerator</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/NR/NR-YW5/NR-YW590YMMV/ast-1971748.png.pub.thumb.172.229.png"
                        alt="Product 1">
                    <h3>PRIME+ Edition Refrigerator</h3>
                    <p>$5,031.62</p>
                    <p>$4,260.10</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/NR/NR-F50/NR-F503GT-X2/ast-1237170.png.pub.png?resize=272%3A204"
                        alt="Product 2">
                    <h3>Refrigerator NR-F503GT-X2</h3>
                    <p>$3,861.48</p>
                    <p>$3,588.05</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/rf/lsi63blma/gallery/2010-1.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 3">
                    <h3>LG Side by Side Refrigerator</h3>
                    <p>$1,325.77</p>
                    <p>$1,091.74</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.lg.com/content/dam/channel/wcms/vn/rf/ltb33blma/2010-1.jpg/_jcr_content/renditions/thum-1600x1062.jpeg"
                        alt="Product 4">
                    <h3>LG Refrigerator 335L</h3>
                    <p>$623.69</p>
                    <p>$444.26</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Microwave Bar -->
        <div class="microwave-list" id="microwave-list">
            <div class="title">
                <h2>Microwave</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/NN/NN-GM2/NN-GM22QB/ast-2470467.png.pub.png?resize=272%3A204"
                        alt="Product 1">
                    <h3>Microwave Oven 20L</h3>
                    <p>$194.63</p>
                    <p>$130.28</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/NN/NN-GT6/NN-GT65JBYUE/ast-2310976.png?resize=272%3A204"
                        alt="Product 2">
                    <h3>Inverter Microwave Oven 31L </h3>
                    <p>$464.16</p>
                    <p>$331.15</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://vn.sharp/sites/default/files/styles/resize_320x320/public/2023-09/R-G251TV-SL_0.png?itok=VvBhtlNY"
                        alt="Product 3">
                    <h3>Sharp Microwave Oven 20L</h3>
                    <p>$73.72</p>
                    <p>$58.12</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://thegioidodung.vn/wp-content/uploads/2024/11/lo-vi-song-sunhouse-shd4823-25-lit-vietmart3.jpg"
                        alt="Product 4">
                    <h3>Sunhouse Microwave Oven 25L</h3>
                    <p>$104.92</p>
                    <p>$87.76</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Rice Cooker -->
        <div class="cooker-list" id="cooker-list">
            <div class="title">
                <h2>Rice Cooker</h2>
            </div>
            <div class="product-list">
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/SR/SR-DM1/SR-DM184KRA/ast-2581175.png.pub.png?resize=272%3A204"
                        alt="Product 1">
                    <h3>Rice cooker SR-DM184</h3>
                    <p>$214.14</p>
                    <p>$170.06</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/SR/SR-DL1/SR-DL184WRA/ast-2580553.png.pub.png?resize=272%3A204"
                        alt="Product 2">
                    <h3>Rice Cooker SR-DK184 1.8L </h3>
                    <p>$179.03</p>
                    <p>$116.62</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/SR/SR-CX1/SR-CX188SRAM/ast-1618228.png.pub.png?resize=272%3A204"
                        alt="Product 3">
                    <h3>Rice Cooker SR-CX188SRAM 1.8L</h3>
                    <p>$194.63</p>
                    <p>$134.57</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
                <div class="product">
                    <img src="https://www.panasonic.com/content/dam/pim/vn/vi/SR/SR-DB0/SR-DB071/ast-1717527.png.pub.png?resize=272%3A204"
                        alt="Product 4">
                    <h3>Rice Cooker SR-DB071KRA 0.7 L </h3>
                    <p>$155.63</p>
                    <p>$105.70</p>
                    <button><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Blog -->
        <div class="blog-list">
            <div class="title">
                <h2>Latest Blog</h2>
            </div>
            <div class="blog-container">
                <div class="blog-card">
                    <img src="https://tongkhodogiadung.vn/wp-content/uploads/2024/01/cac-loai-do-gia-dung-hien-dai-cho-can-bep-nha-ban-them-tien-avt-1200x676-1.jpg"
                        alt="Blog 1">
                    <div class="blog-content">
                        <span class="blog-date">March 25, 2025 / Product</span>
                        <h3>Collection of household items for the family</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Aut sapiente dolorum.</p>
                    </div>
                </div>
                <div class="blog-card">
                    <img src="https://tongkhodogiadung.vn/wp-content/uploads/2024/01/1.jpg" alt="Blog 2">
                    <div class="blog-content">
                        <span class="blog-date">March 28, 2025 / Product</span>
                        <h3>Collection of household items for the family</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Cupiditate corrupti vero.</p>
                    </div>
                </div>
                <div class="blog-card">
                    <img src="https://tongkhodogiadung.vn/wp-content/uploads/2024/01/3.png" alt="Blog 3">
                    <div class="blog-content">
                        <span class="blog-date">April 4, 2025 / Product</span>
                        <h3>Collection of household items for the family</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Illo excepturi esse.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service-Bar -->
        <div class="service-bar" id="service-bar">
            <div class="service-item">
                <i class="fas fa-tools"></i>
                <p>Genuine warranty</p>
            </div>
            <div class="service-item">
                <i class="fas fa-hand-holding-usd"></i>
                <p>Support installment payment</p>
            </div>
            <div class="service-item">
                <i class="fas fa-shipping-fast"></i>
                <p>Free Shipping</p>
            </div>
            <div class="service-item">
                <i class="fas fa-headset"></i>
                <p>Online consultation 24/7</p>
            </div>
            <div class="service-item">
                <i class="fas fa-sync-alt"></i>
                <p>Return at home</p>
            </div>
            <div class="service-item">
                <i class="fas fa-star"></i>
                <p>National Brand</p>
            </div>
        </div>
    </div>

    <div class="footer">

        <!-- Synthetic-Bar -->
        <div class="synthetic">
            <div class="footer-column">
                <h2 class="logo">Moai Shop</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eveniet repellendus esse qui
                    dolores id adipisci nesciunt tempora totam ad maiores fugiat a, reprehenderit nisi, corrupti
                    voluptatum, tempore magnam consequatur!</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/truongson.le.5473"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.youtube.com/channel/UCx49sCdIFhQmUntZYQ1V5CA"><i
                            class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com/_lvts.445_/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>QUICK LINKS</h3>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="intro.html">ABOUT US</a></li>
                    <li><a href="#service-bar">SERVICES</a></li>
                    <li><a href="blog.html">BLOGS</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>HELP & INFO</h3>
                <ul>
                    <li><a href="#">TRACK YOUR ORDER</a></li>
                    <li><a href="#">RETURNS + EXCHANGES</a></li>
                    <li><a href="#">SHIPPING + DELIVERY</a></li>

                    <li><a href="#">FIND US EASY</a></li>
                    <li><a href="#">FAQS</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>CONTACT US</h3>
                <p>Do you have any questions or suggestions?</p>
                <p><strong>support@moaishop.com</strong></p>
                <p>Do you need support? Give us a call.</p>
                <p><strong>1900 8386</strong></p>
            </div>
        </div>

        <!-- CopyRight -->
        <div class="copyright">
            <h2>MoaiShop Limited Liability Company</h2>
            <p>Business registration was approved by Hanoi Department of Planning and Investment on April 30, 2005.</p>
            <p>Copyright 2025 © letruongson.com | MoaiShop - 1 product of the group <strong>Moai GROUP</strong> All
                rights reserved</p>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>