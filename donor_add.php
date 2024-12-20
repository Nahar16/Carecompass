<?php
include 'admin_header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blood Donor</title>
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>Add Blood Donor</h1>
            <?php
            include 'connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $blood_group = $_POST['blood_group'];
                $donor_name = $_POST['donor_name'];
                $last_donation = $_POST['last_donation'];
                $contact_number = $_POST['contact_number'];
                $city = $_POST['city'];
                $area = $_POST['area'];
                $max_id_sql = "SELECT MAX(CAST(donor_id AS UNSIGNED)) AS max_id FROM blood_donor";
                $result = $conn->query($max_id_sql);
                $max_id = ($result->num_rows > 0) ? $result->fetch_assoc()['max_id'] : 0;
                $new_donor_id = $max_id + 1;
                $sql = "INSERT INTO blood_donor (donor_id, name, blood_group, last_donation, phone, city, area) VALUES ('$new_donor_id', '$donor_name', '$blood_group', '$last_donation', '$contact_number', '$city', '$area')";

                if ($conn->query($sql) === TRUE) {
                    echo "Blood donor information added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="blood_group" style="font-size: 24px;">Blood Group:</label><br>
                <input type="text" id="blood_group" name="blood_group" style="font-size: 24px;" required><br>

                <label for="donor_name" style="font-size: 24px;">Donor Name:</label><br>
                <input type="text" id="donor_name" name="donor_name" style="font-size: 24px;" required><br>

                <label for="last_donation" style="font-size: 24px;">Last Donation Date:</label><br>
                <input type="date" id="last_donation" name="last_donation" style="font-size: 24px;" required><br>

                <label for="contact_number" style="font-size: 24px;">Contact Number:</label><br>
                <input type="text" id="contact_number" name="contact_number" style="font-size: 24px;" required><br>

                <label for="city" style="font-size: 24px;">City:</label><br>
                <input type="text" id="city" name="city" style="font-size: 24px;" required><br>

                <label for="area" style="font-size: 24px;">Area:</label><br>
                <input type="text" id="area" name="area" style="font-size: 24px;" required><br><br>

                <input type="submit" value="Submit" style="font-size: 24px;"><br>
                <a href="donor_admin.php" style="font-size: 24px;">Back</a>
            </form>
        </div>
    </center>
</body>

</html>
