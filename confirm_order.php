<?php
session_start();
include 'header.php';
include 'connection.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: signin.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['orders'])) {
    $customer_id = $_SESSION['customer_id'];
    $orders = json_decode($_POST['orders'], true);
    $total_amount = $_POST['total_amount'];
    $date = date('Y-m-d H:i:s');

    // Insert each order into the database
    foreach ($orders as $order) {
        $medicine_id = $order['medicine_id'];
        $medicine_name = $order['medicine_name'];
        $quantity = $order['quantity'];

        // Simple insert query (assuming $conn is your database connection)
        $query = "INSERT INTO orders (customer_id, medicine_id, medicine_name, date, quantity) VALUES ('$customer_id', '$medicine_id', '$medicine_name', '$date', '$quantity')";
        $conn->query($query);
    }

    $_SESSION['order_message'] = "Your order has been confirmed!";
} else {
    // Redirect to medicine list if accessed directly
    header("Location: medicine_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            background-image: url('https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #28a745;
        }
        p {
            font-size: 18px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Your order has been confirmed successfully!</p>
        <p>You will be redirected to your dashboard in <span id="countdown">5</span> seconds.</p>
        <p>If you are not redirected, <a href="user_dashboard.php">click here</a>.</p>
    </div>

    <script>
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        const interval = setInterval(() => {
            countdown--;
            countdownElement.innerText = countdown;
            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = 'user_dashboard.php';
            }
        }, 1000);
    </script>
</body>
</html>
