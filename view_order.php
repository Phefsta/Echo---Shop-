<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   header('location:login.php');
   exit();
}

if (isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    header("Location: orders.php");
}

if (isset($_POST['cancel'])) {
    $update_order = $conn->prepare("UPDATE `orders` SET status = ? WHERE id = ?");
    $update_order->execute(['cancelled', $get_id]);
    header("Location: orders.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Echoshop - view my orders</title>
    <!-- Boxicons CDN link -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">    
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">    
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
</head>
<body>

    <?php include 'components/user_header.php'; ?>

    <div class="banner">
        <div class="detail">
            <h1>order detail</h1>
            <p>Echo your style, shop with ease.<br>Where every click echoes savings.</p>
            <span>
                <a href="home.php">home</a>
                <i class="bx bx-right-arrow-alt"></i>order detail
            </span>
        </div>
    </div>

    <div class="order-detail">
        <div class="heading">
            <h1>My Order Detail</h1>
            <p>Echo your style, shop with ease.<br>Where every click echoes savings.</p>
            <img src="image/separator-img.png" alt="separator image">
        </div>
        <div class="box-container">
            <?php
                $grand_total = 0;
                $select_order = $conn->prepare("SELECT * FROM `orders` WHERE id = ? LIMIT 1");
                $select_order->execute([$get_id]);
                
                if ($select_order->rowCount() > 0) {               
                    while ($fetch_order = $select_order->fetch(PDO::FETCH_ASSOC)) {            
                        $select_product = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
                        $select_product->execute([$fetch_order['product_id']]);
                  
                        if ($select_product->rowCount() > 0) {                 
                            while ($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)) {
                                $sub_total =  $fetch_order['price'] * $fetch_order['qty'];
                                $grand_total = $sub_total;
                ?>
                
                <div class="box">
                    <div class="col">
                        <p class="title">
                            <i class="bx bxs-calendar-alt"></i><?= $fetch_order['date']; ?>
                        </p>
                        <img src="uploaded_files/<?= $fetch_product['image']; ?>" class="image" alt="<?= $fetch_product['name']; ?>">
                        <p class="price">$<?= $fetch_product['price']; ?>/-</p>
                        <h3 class="name"><?= $fetch_product['name']; ?></h3>
                        <p class="grand-total">
                            Total amount payable: <span>$<?= $grand_total; ?>/-</span>
                        </p>
                    </div>
                    <div class="col">
                        <p class="title">Billing Address</p>
                        <p class="user">
                            <i class="bi bi-person-bounding-box"></i><?= $fetch_order['name']; ?>
                        </p>
                        <p class="user">
                            <i class="bi bi-envelope"></i><?= $fetch_order['email']; ?>
                        </p>
                        <p class="user">
                            <i class="bi bi-pin-map-fill"></i><?= $fetch_order['address']; ?>
                        </p>
                        <p class="status" style="color:
                            <?php
                            if ($fetch_order['status'] == 'in progress') {
                               echo 'blue';
                            } elseif ($fetch_order['status'] =- 'confirmed') {
                               echo 'lightblue';
                            } elseif ($fetch_order['status'] == 'delivered') {
                               echo 'limegreen';
                            } elseif ($fetch_order['status'] == 'cancelled') {
                               echo 'red';
                            } else {
                               echo 'black';
                            }
                            ?>">
                        <?= $fetch_order['status']; ?></p>

                        <?php if ($fetch_order['status'] == 'cancelled') { ?>
                            <p>Order Cancelled - You can reorder this product</p>
                            <a href="checkout.php?get_id= <?= $fetch_product['id']; ?>" class="btn" style="line-height: 3;">Order Again</a>
                        <?php } else { ?>
                            <form action="" method="post">
                                <button type="submit" name="cancel" class="btn" onclick="return confirm('Do you want to cancel this order?');">
                                    Cancel
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div> 
            <?php
                            }
                        }
                    }
                } else {
                    echo '<p class="empty">No orders have been placed yet!</p>';
                }
            ?>
        </div> 
    </div>

    <?php include 'components/footer.php'; ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <?php include 'components/alert.php'; ?>
   <!-- Custom js link -->
   <script src="js/user_script.js"></script>

</body>
</html>