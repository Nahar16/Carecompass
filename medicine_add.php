<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>Add Medicine</h1>
            <?php
            include 'connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $medicine_name = $_POST['medicine_name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $max_id_sql = "SELECT MAX(CAST(medicine_id AS UNSIGNED)) AS max_id FROM medicine";
                $result = $conn->query($max_id_sql);
                $max_id = ($result->num_rows > 0) ? $result->fetch_assoc()['max_id'] : 0;
                $new_medicine_id = $max_id + 1;    
                $sql = "INSERT INTO medicine (medicine_id, medicine_name, price, quantity) VALUES ('$new_medicine_id', '$medicine_name', '$price', '$quantity')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p style='font-size: 24px; color: green;'>Medicine information added successfully</p>";
                } else {
                    echo "<p style='font-size: 24px; color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="medicine_name" style="font-size: 24px;">Medicine Name:</label><br>
                <input type="text" id="medicine_name" name="medicine_name" style="font-size: 24px;" required><br>

                <label for="price" style="font-size: 24px;">Price:</label><br>
                <input type="number" id="price" name="price" style="font-size: 24px;" step="0.01" required><br>

                <label for="quantity" style="font-size: 24px;">Quantity:</label><br>
                <input type="number" id="quantity" name="quantity" style="font-size: 24px;" required><br><br>

                <input type="submit" value="Submit" style="font-size: 24px;"><br>
                <a href="medicine_admin.php" style="font-size: 24px;">Back</a>
            </form>
        </div>
    </center>
</body>

</html>
