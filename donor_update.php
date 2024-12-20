<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Donors Data</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <h1>CareCompass</h1><br><br><br>
        <div class="container">
            <h1>Update Donor Data</h1>
            <?php
            include 'connection.php';
            if (isset($_GET['donor_id'])) {
                $id = $_GET['donor_id'];

                $sql = "SELECT * FROM blood_donor WHERE donor_id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $previous_donor_name = $row['name'];
                    $previous_blood_group = $row['blood_group'];
                    $previous_contact_number = $row['phone'];
                    $previous_city = $row['city'];
                    $previous_area = $row['area'];
                    $previous_last_donation = $row['last_donation'];
                } else {
                    echo "Donor not found.";
                    exit;
                }
            } else {
                echo "Donor ID not provided.";
                exit;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Blood_donor_name = $_POST['Blood_donor_name'];
                $Blood_Group = $_POST['Blood_Group'];
                $Contact_Number = $_POST['Contact_Number'];
                $City = $_POST['City'];
                $Area = $_POST['Area'];
                $Last_Donation = $_POST['Last_Donation'];
                $admin_id = "01"; 
                $date = date('Y-m-d H:i:s');


                $sql_update = "UPDATE blood_donor SET name='$Blood_donor_name', blood_group='$Blood_Group', city='$City', area='$Area', last_donation='$Last_Donation', phone='$Contact_Number' WHERE donor_id=$id";
                $sql_insert_update = "INSERT INTO updates_b (admin_id, donor_id, date) VALUES ('$admin_id', '$id', '$date')";
                if ($conn->query($sql_update) === TRUE) {
                    if ($conn->query($sql_insert_update) === TRUE) {
                        echo "Donor's information updated successfully.";
                        header("Location: donor_admin.php?success=1");
                        exit();
                    } else {
                        echo "Error logging update: " . $conn->error;
                    }
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?donor_id=' . $id; ?>" method="post">
                <label for="Blood_donor_name" style="font-size: 24px;">New Donor Name:</label><br>
                <input type="text" id="Blood_donor_name" name="Blood_donor_name" style="font-size: 24px;" value="<?php echo $previous_donor_name; ?>"><br>
                <label for="Blood_Group" style="font-size: 24px;">New Group:</label><br>
                <input type="text" id="Blood_Group" name="Blood_Group" style="font-size: 24px;" value="<?php echo $previous_blood_group; ?>"><br>
                <label for="City" style="font-size: 24px;">New City:</label><br>
                <input type="text" id="City" name="City" style="font-size: 24px;" value="<?php echo $previous_city; ?>"><br>
                <label for="Area" style="font-size: 24px;">New Area:</label><br>
                <input type="text" id="Area" name="Area" style="font-size: 24px;" value="<?php echo $previous_area; ?>"><br>
                <label for="Last_Donation" style="font-size: 24px;">Last Donation Date:</label><br>
                <input type="date" id="Last_Donation" name="Last_Donation" style="font-size: 24px;" value="<?php echo $previous_last_donation; ?>"><br><br>
                <label for="Contact_Number" style="font-size: 24px;">New Contact Number:</label><br>
                <input type="text" id="Contact_Number" name="Contact_Number" style="font-size: 24px;" value="<?php echo $previous_contact_number; ?>"><br><br>
                <input type="submit" value="Update" style="font-size: 24px;"><br>
                <a href="donor_admin.php" style="font-size: 24px;">Back</a>
            </form>
        </div>
    </center>
</body>

</html>
