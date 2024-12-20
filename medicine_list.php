<?php
session_start();
include 'header.php';
include 'connection.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_medicine"])) {
    // Handle search functionality
    $medicine_name = mysqli_real_escape_string($conn, $_POST["medicine_name"]);
    $sql = "SELECT * FROM medicine WHERE medicine_name LIKE '%$medicine_name%'";
    $result = $conn->query($sql);
} else {
    // Display all medicines by default
    $sql = "SELECT * FROM medicine";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Medicines</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }
        .modal-button {
            margin: 10px;
        }
    </style>
</head>
<body class="bg-light" style="background-image: url('https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg');">
<center>
    <div class="container">
        <h1>CareCompass</h1><br><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="medicine_name" placeholder="Medicine's Name" style="font-size: 24px;">
            <button type="submit" name="search_medicine" style="font-size: 24px;">Search Medicine</button>
        </form>

        <?php if ($result && $result->num_rows > 0): ?>
            <form action="checkout.php" method="POST">
                <table border='1'>
                    <tr>
                        <th style='font-size: 18px;'>Medicine's Name</th>
                        <th style='font-size: 18px;'>Price</th>
                        <th style='font-size: 18px;'>Available Quantity</th>
                        <th style='font-size: 18px;'>Quantity to Order</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td style='font-size: 18px;'><?php echo htmlspecialchars($row["medicine_name"]); ?></td>
                            <td style='font-size: 18px;'><?php echo htmlspecialchars($row["price"]); ?></td>
                            <td style='font-size: 18px;'><?php echo htmlspecialchars($row["quantity"]); ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo $row["medicine_id"]; ?>]" min="0" max="<?php echo $row["quantity"]; ?>">
                                <input type="hidden" name="medicine_id[]" value="<?php echo $row["medicine_id"]; ?>">
                                <input type="hidden" name="medicine_name[]" value="<?php echo htmlspecialchars($row["medicine_name"]); ?>">
                                <input type="hidden" name="price[]" value="<?php echo htmlspecialchars($row["price"]); ?>">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
                <button type="submit" style="font-size: 24px;">Proceed to Checkout</button>
            </form>
        <?php else: ?>
            <p>No medicines found.</p>
        <?php endif; ?>

        <br>
        <a href="medicine_list.php" style="font-size: 24px;">See Full List</a>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p id="modalMessage"></p>
            <button class="modal-button" onclick="window.location.href='medicine_list.php'">Back to List</button>
            <button class="modal-button" onclick="window.location.href='medicine_cart.php'">View Cart</button>
        </div>
    </div>

    <script>
        // Check if there's a cart message in the session and show the modal if there is
        <?php if (isset($_SESSION['cart_message'])) : ?>
            document.getElementById('modalMessage').innerText = "<?php echo $_SESSION['cart_message']; unset($_SESSION['cart_message']); ?>";
            document.getElementById('myModal').style.display = "block";
        <?php endif; ?>
    </script>
</center>
</body>
</html>
