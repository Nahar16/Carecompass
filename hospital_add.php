<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hospital</title>
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>Add Hospital</h1>
            <?php
            include 'connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $hospital_name = $_POST['hospital_name'];
                $city = $_POST['city'];
                $area = $_POST['area'];
                $find_location = $_POST['find_location'];
                $hotline_number = $_POST['hotline_number'];
                $max_id_sql = "SELECT MAX(CAST(hospital_id AS UNSIGNED)) AS max_id FROM hospital";
                $result = $conn->query($max_id_sql);
                $max_id = ($result->num_rows > 0) ? $result->fetch_assoc()['max_id'] : 0;


                $new_hospital_id = $max_id + 1;
                $sql = "INSERT INTO hospital (hospital_id, name, city, area, find_location, hotline_number) VALUES ('$new_hospital_id', '$hospital_name', '$city', '$area', '$find_location', '$hotline_number')";

                if ($conn->query($sql) === TRUE) {
                    echo "Hospital information added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="hospital_name" style="font-size: 24px;">Hospital Name:</label><br>
                <input type="text" id="hospital_name" name="hospital_name" style="font-size: 24px;" required><br>

                <label for="city" style="font-size: 24px;">City:</label><br>
                <input type="text" id="city" name="city" style="font-size: 24px;" required><br>

                <label for="area" style="font-size: 24px;">Area:</label><br>
                <input type="text" id="area" name="area" style="font-size: 24px;" required><br>

                <label for="find_location" style="font-size: 24px;">Find Location:</label><br>
                <input type="text" id="find_location" name="find_location" style="font-size: 24px;" required><br>

                <label for="hotline_number" style="font-size: 24px;">Hotline Number:</label><br>
                <input type="text" id="hotline_number" name="hotline_number" style="font-size: 24px;" required><br><br>

                <input type="submit" value="Submit" style="font-size: 24px;"><br>
                <a href="hospital_admin.php" style="font-size: 24px;">Back</a>
            </form>
        </div>
    </center>
</body>

</html>
