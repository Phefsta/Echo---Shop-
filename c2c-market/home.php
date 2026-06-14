<?php
include "components/connect.php";

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Ecoshop - Home page</title>    
    <!-- Boxicons CDN link -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">    
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">    
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>

    <!-- slider section start -->
    <div class="slider-container">
        <div class="slider">    
            <div class="slideBox active"> 
                <div class="textBox">    
                    <span class="discount-badge">Opening Sale Discount 30%</span>    
                    <h1>Nature's Choice for<br> healthy living</h1>    
                    <p>Crafted with the highest quality organic, hi-oleic peanuts and <br> sea salt, this crunchy delight.</p>    
                    <a href="menu.php" class="btn">Purchase Now</a>    
                </div>   
                <div class="imgBox">    
                    <img src="image/slider.jpg" alt="slider image">    
                </div>    
            </div>
            <div class="slideBox">
                <div class="textBox">
                    <span class="discount-badge">Opening Sale Discount 30%</span>
                    <h1>Nature's Choice for<br> healthy living</h1>
                    <p>
                        Crafted with the highest quality organic, hi-oleic peanuts and<br>
                        sea salt, this crunchy delight.
                    </p>
                    <a href="menu.php" class="btn">Purchase Now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider0.jpg" alt="slider image">
                </div>
            </div>
        </div>
        <ul class="controls">
            <li onclick="nextSlide();" class="next"><i class="bx bx-right-arrow-alt"></i></li>
            <li onclick="prevSlide();" class="prev"><i class="bx bx-left-arrow-alt"></i></li>
        </ul>
    </div>    

    <!-- Slider section ends -->

    <!-- Service section starts -->
    <div class="service">
        <div class="heading">
            <h1>Wholesome Dairy Delights<br><span>Delivered Fresh</span> to You</h1>
        </div>
        <div class="box-container">
            <!-- Service item box -->
            <div class="box">
                <div class="icon">
                    <i class="bx bxs-truck"></i>
                </div>
                <div class="detail">
                    <h4>Quick, No-Cost Delivery &<br>Setup Included</h4>
                </div>
            </div>
            <!-- Service item box -->
            <div class="box box-yellow">
                <div class="icon">
                    <i class="bx bxs-dollar-circle"></i>
                </div>
                <div class="detail">
                    <h4>30-Day, No-Risk Money-<br>Bank Assurance</h4>
                </div>
            </div>
            <!-- Service item box -->
            <div class="box box-pink">
                <div class="icon">
                    <i class="bx bx-support"></i>
                </div>
                <div class="detail">
                    <h4>24/7 Expert Help, Always<br>Just a Click Away</h4>
                </div>
            </div>
            <!-- Service item box -->
            <div class="box box-blue">
                <div class="icon">
                    <i class="bx bxs-credit-card"></i>
                </div>
                <div class="detail">
                    <h4>Flexible Payments with<br>Various Credit card Options</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- service section end-->
    <div class="categories">
        <div class="heading">
            <h1>Featured Categories</h1>
            <img src="image/separator-img.png" alt="separator">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/categories.jpg" alt="Fruits">
                <a href="menu.php" class="btn">Fruits</a>
            </div>
            <div class="box">
                <img src="image/categories0.jpg" alt="Meats">
                <a href="menu.php" class="btn">Meats</a>
            </div>
            <div class="box">
                <img src="image/categories2.jpg" alt="Grain Foods">
                <a href="menu.php" class="btn">Grain Foods</a>
            </div>
            <div class="box">
                <img src="image/categories1.jpg" alt="Vegetables">
                <a href="menu.php" class="btn">Vegetables</a>
            </div>
        </div>
    </div>
    <!-- categories section end -->
    <img src="image/menu-banner.jpg" class="menu-banner" alt="Menu Banner">
    <section class="taste">
        <div class="heading">
            <span>Fresh Picks</span>
            <h1>Buy any grocery item & get 10% off</h1>
            <img src="image/separator-img.png" alt="separator">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/menu1.png" alt="Fruits">
                <div class="detail">
                    <h2>Fruits</h2>
                    <h1>Healthy Fruits</h1>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="image/menu3.png" alt="Fruits">
                <div class="detail">
                    <h2>Juices</h2>
                    <h1>Fruit Juices</h1>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="image/menu2.png" alt="Fruits">
                <div class="detail">
                    <h2>Vegetables</h2>
                    <h1>Fresh Vegetables</h1>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="offer-container">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Fresh food is the best choice<br>for a healthy lifestyle</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore.</p>
            <a href="menu.php" class="btn">Shop now</a>
        </div>
    </div>
    <!-- offer section end -->
    <div class="taste2">
        <div class="t-banner">
            <div class="overlay"></div>
            <div class="detail">
                <h1>Find your everyday essentials</h1>
                <p>Discover fresh vegetables, fruits, grains and more at affordable prices.</p>
                <a href="menu.php" class="btn">Explore More</a>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type.webp" alt="strawberry">
                <div class="box-details fadeIn-bottom">
                    <h1>$6.99</h1>
                    <p>Fresh red tomatoes</p>
                    <a href="menu.php" class="btn">Explore More</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type0.webp" alt="strawberry">
                <div class="box-details fadeIn-bottom">
                    <h1>$6.99</h1>
                    <p>Fresh red tomatoes</p>
                    <a href="menu.php" class="btn">Explore More</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type1.webp" alt="strawberry">
                <div class="box-details fadeIn-bottom">
                    <h1>$6.99</h1>
                    <p>Fresh red tomatoes</p>
                    <a href="menu.php" class="btn">Explore More</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type2.webp" alt="strawberry">
                <div class="box-details fadeIn-bottom">
                    <h1>$6.99</h1>
                    <p>Fresh red tomatoes</p>
                    <a href="menu.php" class="btn">Explore More</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type3.webp" alt="strawberry">
                <div class="box-details fadeIn-bottom">
                    <h1>$6.99</h1>
                    <p>Fresh red tomatoes</p>
                    <a href="menu.php" class="btn">Explore More</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type4.webp" alt="strawberry">
                <div class="box-details fadeIn-bottom">
                    <h1>$6.99</h1>
                    <p>Fresh red tomatoes</p>
                    <a href="menu.php" class="btn">Explore More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- sale banner -->
    <div class="sale-banner">    
        <div class="box-container">
            <img src="image/left-banner2.jpg" alt="Promotional Banner">
            <div class="detail">
                <h1>Hot Deal! Sale Up To <span>20% Off</span></h1>
                <p>Expired</p>
                <a href="menu.php" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- sale banner section end -->
    <div class="usage">
        <div class="heading">
            <img src="image/separator-img.png" alt="separator image">
            <h1>How It Works</h1>
        </div>
        <div class="row">
            <div class="box-container">
                <div class="box">
                    <i class="bx bxs-basket"></i>
                    <div class="detail">
                        <h3>Choose Your Groceries</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolor nihil dicta eveniet quam nam explicabo, natus labore quia cupiditate.</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-card-add"></i>
                    <div class="detail">
                        <h3>Place your order</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolor nihil dicta eveniet quam nam explicabo, natus labore quia cupiditate.</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-package"></i>
                    <div class="detail">
                        <h3>We prepare your items</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolor nihil dicta eveniet quam nam explicabo, natus labore quia cupiditate.</p>
                    </div>
                </div>
            </div>
            <img src="image/sub-banner.png" class="divider">
            <div class="box-container">
                <div class="box">
                    <i class="bx bxs-truck"></i>
                    <div class="detail">
                        <h3>Fast Delivery</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolor nihil dicta eveniet quam nam explicabo, natus labore quia cupiditate.</p>
                    </div>
                </div>
                <div class="box-container">
                <div class="box">
                    <i class="bx bxs-happy"></i>
                    <div class="detail">
                        <h3>Enjoy fresh groceries</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolor nihil dicta eveniet quam nam explicabo, natus labore quia cupiditate.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- usage section end -->
    <div class="pride">
        <div class="detail">
            <h1>We Pride Ourselves On <br> Fresh Quality Groceries.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="menu.php" class="btn">Shop Now</a>
        </div>
    </div>
    <!-- pride section end -->

    <?php include 'components/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include 'components/alert.php'; ?>
    <!-- Custom JS link -->
    <script src="js/user_script.js"></script>
</body>
</html>