<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hospital Data</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <h1>CareCompass</h1><br><br><br>
        <div class="container">
            <h1>Update Hospital Data</h1>
            <?php
            include 'connection.php';

            if (isset($_GET['hospital_id'])) {
                $id = $_GET['hospital_id'];

                $sql = "SELECT * FROM hospital WHERE hospital_id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $previous_hospital_name = $row['name'];
                    $previous_city = $row['city'];
                    $previous_area = $row['area'];
                    $previous_find_location = $row['find_location'];
                    $previous_hotline_number = $row['hotline_number'];
                } else {
                    echo "Hospital not found.";
                    exit;
                }
            } else {
                echo "Hospital ID not provided.";
                exit;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $hospital_name = $_POST['hospital_name'];
                $city = $_POST['city'];
                $area = $_POST['area'];
                $find_location = $_POST['find_location'];
                $hotline_number = $_POST['hotline_number'];
                $admin_id = "01";
                $date = date('Y-m-d H:i:s');

                // Update hospital data
                $sql = "UPDATE hospital SET name='$hospital_name', city='$city', area='$area', find_location='$find_location', hotline_number='$hotline_number' WHERE hospital_id=$id";

                // Log the update in update_h table
                $sql_update_log = "INSERT INTO updates_h (admin_id, hospital_id, date) VALUES ('$admin_id', $id, '$date')";

                if ($conn->query($sql) === TRUE && $conn->query($sql_update_log) === TRUE) {
                    echo "Hospital information updated successfully.";
                    header("Location: hospital_admin.php?success=1");
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?hospital_id=' . $id; ?>" method="post">
                <label for="hospital_name" style="font-size: 24px;">New Hospital Name:</label><br>
                <input type="text" id="hospital_name" name="hospital_name" style="font-size: 24px;" value="<?php echo $previous_hospital_name; ?>"><br>
                <label for="city" style="font-size: 24px;">New City:</label><br>
                <input type="text" id="city" name="city" style="font-size: 24px;" value="<?php echo $previous_city; ?>"><br>
                <label for="area" style="font-size: 24px;">New Area:</label><br>
                <input type="text" id="area" name="area" style="font-size: 24px;" value="<?php echo $previous_area; ?>"><br>
                <label for="find_location" style="font-size: 24px;">Find Location:</label><br>
                <input type="text" id="find_location" name="find_location" style="font-size: 24px;" value="<?php echo $previous_find_location; ?>"><br>
                <label for="hotline_number" style="font-size: 24px;">New Hotline Number:</label><br>
                <input type="text" id="hotline_number" name="hotline_number" style="font-size: 24px;" value="<?php echo $previous_hotline_number; ?>"><br><br>
                <input type="submit" value="Update" style="font-size: 24px;"><br>
                <a href="hospital_admin.php" style="font-size: 24px;">Back</a>
            </form>
        </div>
    </center>
</body>

</html>
