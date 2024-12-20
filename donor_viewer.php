<?PHP
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor List</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>CareCompass</h1><br><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="Blood_donor_area" placeholder="Donor Area" style="font-size: 24px;">
                <button type="submit" name="search_donor" style="font-size: 24px;">Search Donor By Area</button>
                <br>
                <input type="text" name="Blood_Group" placeholder="Blood Group" style="font-size: 24px;">
                <button type="submit" name="search_donor_blood" style="font-size: 24px;">Search Donor By Blood</button>
            </form>

            <?php
            include 'connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["search_donor"]) || isset($_POST["search_donor_blood"]))) {
                if (isset($_POST["Blood_donor_area"]) && !empty($_POST["Blood_donor_area"])) {
                    $Blood_donor_area = $_POST["Blood_donor_area"];
                    $Blood_donor_area = mysqli_real_escape_string($conn, $Blood_donor_area);
                    $sql = "SELECT * FROM blood_donor WHERE area LIKE '%$Blood_donor_area%'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr>
                                <th style='font-size: 18px;'>Blood Group</th>
                                <th style='font-size: 18px;'>Blood Donor Name</th>
                                <th style='font-size: 18px;'>Address</th>
                                <th style='font-size: 18px;'>Last Donation</th>
                                <th style='font-size: 18px;'>Contact Number</th>
                              </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td style='font-size: 18px;'>" . $row["blood_group"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["name"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["area"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["last_donation"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["phone"] . "</td>
                                  </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No donors found matching the search criteria.";
                    }
                } elseif (isset($_POST["Blood_Group"]) && !empty($_POST["Blood_Group"])) {
                    $Blood_Group = $_POST["Blood_Group"];
                    $Blood_Group = mysqli_real_escape_string($conn, $Blood_Group);
                    $sql = "SELECT * FROM blood_donor WHERE blood_group LIKE '$Blood_Group'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr>
                                <th style='font-size: 18px;'>Blood Group</th>
                                <th style='font-size: 18px;'>Blood Donor Name</th>
                                <th style='font-size: 18px;'>Address</th>
                                <th style='font-size: 18px;'>Last Donation</th>
                                <th style='font-size: 18px;'>Contact Number</th>
                              </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td style='font-size: 18px;'>" . $row["blood_group"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["name"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["area"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["last_donation"] . "</td>
                                    <td style='font-size: 18px;'>" . $row["phone"] . "</td>
                                  </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No donors found matching the search criteria.";
                    }
                } else {
                    echo "Please enter a search term.";
                }
                echo "<br><a href=\"donor_viewer.php\" style=\"font-size: 24px;\">See Full List</a>";
            } else {
                echo "<table border='1'>";
                echo "<tr>
                        <th style='font-size: 18px;'>Blood Group</th>
                        <th style='font-size: 18px;'>Blood Donor Name</th>
                        <th style='font-size: 18px;'>Address</th>
                        <th style='font-size: 18px;'>Last Donation</th>
                        <th style='font-size: 18px;'>Contact Number</th>
                      </tr>";

                $sql = "SELECT * FROM blood_donor";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["blood_group"] . "</td>
                                <td>&nbsp;" . $row["name"] . "&nbsp;</td>
                                <td>&nbsp;" . $row["area"] . "&nbsp;</td>
                                <td>&nbsp;" . $row["last_donation"] . "&nbsp;</td>
                                <td>&nbsp;" . $row["phone"] . "&nbsp;</td>
                              </tr>";
                    }
                } else {
                    echo "No Donors found.";
                }
                echo "</table>";
            }

            $conn->close();
            ?>

            <br><br>
            <a href="index.php" style="font-size: 24px;">Back to Home</a>
        </div>
    </center>
</body>

</html>
