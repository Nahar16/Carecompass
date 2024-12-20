<?php
session_start();
include 'header.php';
include 'connection.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $customer_id = $_SESSION['customer_id'];
    $medicine_ids = $_POST['medicine_id'];
    $medicine_names = $_POST['medicine_name'];
    $prices = $_POST['price'];
    $quantities = $_POST['quantity'];

    // Prepare to display orders
    $orders = [];
    $total_amount = 0;

    foreach ($medicine_ids as $index => $medicine_id) {
        $quantity = isset($quantities[$medicine_id]) ? $quantities[$medicine_id] : 0;
        
        if ($quantity > 0) {
            $orders[] = [
                'medicine_id' => $medicine_id,
                'medicine_name' => $medicine_names[$index],
                'price' => $prices[$index],
                'quantity' => $quantity,
            ];
            $total_amount += $quantity * $prices[$index];
        }
    }

    // If no valid orders, redirect back
    if (empty($orders)) {
        $_SESSION['cart_message'] = "Please select at least one medicine to order.";
        header("Location: medicine_list.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            background-image: url('https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px 0;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        <table>
            <tr>
                <th>Medicine's Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo ($order['medicine_name']); ?></td>
                    <td><?php echo ($order['price']); ?></td>
                    <td><?php echo ($order['quantity']); ?></td>
                    <td><?php echo ($order['quantity'] * $order['price']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3>Total Amount: BDT <?php echo ($total_amount); ?></h3>
        <form action="confirm_order.php" method="POST">
            <input type="hidden" name="orders" value='<?php echo (json_encode($orders)); ?>'>
            <input type="hidden" name="total_amount" value="<?php echo ($total_amount); ?>">
            <button type="submit" name="confirm_order">Confirm Order</button>
        </form>
    </div>
</body>
</html>
