<?php
include '../components/connect.php';

if( isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
} else {
    $seller_id = '';
    header("Location: login.php");
    exit();
}

// Update order from database
if (isset($_POST["update_order"])) {
    $order_id = $_POST["order_id"];
    $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);
    $update_status = $_POST["update_status"];
    $update_status = filter_var($update_status, FILTER_SANITIZE_STRING);

    $update_order_status = $conn->prepare("UPDATE `orders` SET status = ? WHERE id = ?");
    $update_order_status->execute([$update_status, $order_id]);

    $success_msg[] = 'Order status updated successfully';
}

//delete order
if (isset($_POST['delete_order'])) {

    $delete_id = $_POST['order_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if ($verify_delete->rowCount() > 0) {

        $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
        $delete_order->execute([$delete_id]);
        $success_msg[] = 'Order deleted';
    } else {
        $warning_msg[] = 'Order already deleted';
    }
}
?>

<!DOCTYPE html> 
<html> 
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width-device-width, initial-scale= 1"> 
    <title>Ecoshop - Manage orders</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <!-- Boxicons CDN link --> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"> 
    <!-- Font Awesome CDN link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
</head> 
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>

        <section class="order-container">
            <div class="heading">
                <h1>total orders placed</h1>
                <img src="../image/separator-img.png">
            </div>

            <div class="box-container">
                <?php
                $select_order = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
                $select_order->execute([$seller_id]);

                if ($select_order->rowCount() > 0) {
                        while ($fetch_order = $select_order->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="box">
                    <div class="status" style="color: 
                        <?php
                        if ($fetch_order['status'] == 'in progress') {
                            echo 'blue';
                        } elseif ($fetch_order['status'] == 'confirmed') {
                            echo 'lightblue';
                        } elseif ($fetch_order['status'] == 'delivered') {
                            echo 'limegreen';
                        } elseif ($fetch_order['status'] == 'cancelled') {
                            echo 'red';
                        } else {
                            echo 'black';
                        }
                        ?>;">
                        <?= $fetch_order['status']; ?>
                    </div>
                    <div class="details">
                        <p>User name: <span><?= $fetch_order['name']; ?></span></p>
                        <p>User ID: <span><?= $fetch_order['user_id']; ?></span></p>
                        <p>Placed on: <span><?= $fetch_order['date']; ?></span></p>
                        <p>User number: <span><?= $fetch_order['number']; ?></span></p>
                        <p>User email: <span><?= $fetch_order['email']; ?></span></p>
                        <p>Total price: <span><?= $fetch_order['price']; ?></span></p>
                        <p>Payment method: <span><?= $fetch_order['method']; ?></span></p>
                        <p>User address: <span><?= $fetch_order['address']; ?></span></p>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= $fetch_order['id']; ?>">
                        <select name="update_status" class="box" style="width: 90%;">
                            <option disabled selected><?= $fetch_order['status']; ?></option>
                            <option value="in progress">In Progress</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" name="update_order" value="Update Status" class="btn">
                            <input type="submit" name="delete_order" value="Delete Order" class="btn"
                            onclick="return confirm('Delete this order?');">
                        </div>
                    </form>
                </div>
                <?php
                    }
                } else {
                    echo '<div class="empty">
                            <p>No orders placed yet!</p>
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