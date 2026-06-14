<?php
include '../components/connect.php';

if( isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
} else {
    $seller_id = '';
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html> 
<html> 
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width-device-width, initial-scale= 1"> 
    <title>Ecoshop - Sellers page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css"> 
    <!-- Boxicons CDN link --> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"> 
    <!-- Font Awesome CDN link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
</head> 
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>

        <section class="user-container">
            <div class="heading">
                <h1>view sellers</h1>
                <img src="../image/separator-img.png">
            </div>
            
            <div class="box-container">
                <?php
                $select_sellers = $conn->prepare("SELECT * FROM `sellers`");
                $select_sellers->execute();
            
                if ($select_sellers->rowCount() > 0) {
                    while ($fetch_sellers = $select_sellers->fetch(PDO::FETCH_ASSOC)) {
                            $user_id = $fetch_sellers['id'];
                            ?>
                        <div class="box">
                            <img src="../uploaded_files/<?= htmlspecialchars($fetch_sellers['image']); ?>" alt="User Image">
                            <p>Sellers ID: <span><?= htmlspecialchars($user_id); ?></span></p>
                            <p>Sellers Name:<span><?= htmlspecialchars($fetch_sellers['name']); ?></span></p>
                            <p>Sellers Email:<span><?= htmlspecialchars($fetch_sellers['email']); ?></span></p>
                        </div>
                    <?php
                    }
                } else {
                    echo '<div class="empty">
                            <p>No sellers registered yet!</p>
                        </div>';
                }
                ?>
            </div>
        </section>
    </div>

<!-- SweetAlert CDN link --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../components/alert.php'; ?> 
    <!-- Custom JS link --> 
    <script src="../js/admin_script.js"></script>

</body> 
</html>