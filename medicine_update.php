<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Medicine Data</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <h1>CareCompass</h1><br><br><br>
        <div class="container">
            <h1>Update Medicine Data</h1>
            <?php
            include 'connection.php';

            if (isset($_GET['medicine_id'])) {
                $id = $_GET['medicine_id'];

                $sql = "SELECT * FROM medicine WHERE medicine_id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $previous_medicine_name = $row['medicine_name'];
                    $previous_price = $row['price'];
                    $previous_quantity = $row['quantity'];
                } else {
                    echo "Medicine not found.";
                    exit;
                }
            } else {
                echo "Medicine ID not provided.";
                exit;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $medicine_name = $_POST['medicine_name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $admin_id = "01"; // Example admin ID
                $date = date('Y-m-d H:i:s');

                // Update medicine data
                $sql = "UPDATE medicine SET medicine_name='$medicine_name', price='$price', quantity='$quantity' WHERE medicine_id=$id";

                // Log the update in updates_m table
                $sql_update_log = "INSERT INTO updates_m (admin_id, medicine_id, medicine_name, date) VALUES ('$admin_id', $id, '$medicine_name', '$date')";

                if ($conn->query($sql) === TRUE && $conn->query($sql_update_log) === TRUE) {
                    echo "Medicine information updated successfully.";
                    header("Location: medicine_admin.php?success=1");
                    exit();
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?medicine_id=' . $id; ?>" method="post">
                <label for="medicine_name" style="font-size: 24px;">New Medicine Name:</label><br>
                <input type="text" id="medicine_name" name="medicine_name" style="font-size: 24px;" value="<?php echo $previous_medicine_name; ?>" required><br>
                <label for="price" style="font-size: 24px;">New Price:</label><br>
                <input type="text" id="price" name="price" style="font-size: 24px;" value="<?php echo $previous_price; ?>" required><br>
                <label for="quantity" style="font-size: 24px;">New Quantity:</label><br>
                <input type="number" id="quantity" name="quantity" style="font-size: 24px;" value="<?php echo $previous_quantity; ?>" required><br><br>
                <input type="submit" value="Update" style="font-size: 24px;"><br>
                <a href="medicine_admin.php" style="font-size: 24px;">Back</a>
            </form>
        </div>
    </center>
</body>

</html>
