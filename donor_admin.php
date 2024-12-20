<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donar Admin</title>

</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>CareCompass</h1><br><br><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="Blood_donor_area" placeholder="Donor Area" style="font-size: 24px;">

                <button type="submit" name="search_donor" style="font-size: 24px;">Search Donor By Area</button>
                <br>
                <input type="text" name="Blood_Group" placeholder="Blood Group" style="font-size: 24px;">

                <button type="submit" name="search_donor_blood" style="font-size: 24px;">Search Donor By Blood</button>
            </form>

            <button><a href="donor_add.php" style="font-size: 24px" >Add New Donor</a></button>



            <?php
            include 'connection.php';

            // Check if the search form was submitted and at least one search criteria is provided
            if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["search_donor"]) || isset($_POST["search_donor_blood"]))) {
                // Check if the search term for donor name is provided
                if (isset($_POST["Blood_donor_area"]) && !empty($_POST["Blood_donor_area"])) {
                    $Blood_donor_area = $_POST["Blood_donor_area"];
                    $Blood_donor_area = mysqli_real_escape_string($conn, $Blood_donor_area);
                    // Process search by donor name
                    $sql = "SELECT * FROM blood_donor WHERE area LIKE '%$Blood_donor_area%'";

                    if (isset($sql)) {
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // Display the search results in a table
                            echo "<table border='1'>";
                            echo "<tr>";
                            echo "<th style='font-size: 18px;'>Blood Group</th>";
                            echo "<th style='font-size: 18px;'>Blood Donor Name</th>";
                            echo "<th style='font-size: 18px;'>Area</th>";
                            echo "<th style='font-size: 18px;'>Address</th>";
                            echo "<th style='font-size: 18px;'>Last Donation</th>";
                            echo "<th style='font-size: 18px;'>Contact Number</th>";
                            echo "<th style='font-size: 18px;'>Action</th>";
                            echo "</tr>";

                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>&nbsp;" . $row["blood_group"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["city"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["area"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["last_donation"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["phone"] . "&nbsp;</td>";
                                echo "<td>";
                                echo "<form action='donor_update.php' method='get'>";
                                echo "<input type='hidden' name='donor_id' value='" . $row["donor_id"] . "'>";
                                echo "<button type='submit' name='update_button'>Update</button>";
                                echo "</form>";
                                echo "<form action='donor_delete.php' method='post'>";
                                echo "<input type='hidden' name='donor_id' value='" . $row["donor_id"] . "'>";
                                echo "<button type='submit' name='delete_button'>Delete</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            // If no donors found matching the search criteria, display a message
                            echo "No donors found matching the search criteria.";
                        }
                    }
                }
                // Check if the search term for blood group is provided
                elseif (isset($_POST["Blood_Group"]) && !empty($_POST["Blood_Group"])) {
                    $Blood_Group = $_POST["Blood_Group"];
                    $Blood_Group = mysqli_real_escape_string($conn, $Blood_Group);
                    // Process search by blood group
                    $sql = "SELECT * FROM blood_donor WHERE blood_group LIKE '$Blood_Group'";

                    if (isset($sql)) {
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // Display the search results in a table
                            echo "<table border='1'>";
                            echo "<tr>";
                            echo "<th style='font-size: 18px;'>Blood Group</th>";
                            echo "<th style='font-size: 18px;'>Blood Donor Name</th>";
                            echo "<th style='font-size: 18px;'>Address</th>";
                            echo "<th style='font-size: 18px;'>Area</th>";
                            echo "<th style='font-size: 18px;'>last Donation</th>";
                            echo "<th style='font-size: 18px;'>Contact Number</th>";
                            echo "<th style='font-size: 18px;'>Action</th>";
                            echo "</tr>";

                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>&nbsp;" . $row["blood_group"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["city"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["area"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["last_donation"] . "&nbsp;</td>";
                                echo "<td>&nbsp;" . $row["phone"] . "&nbsp;</td>";
                                echo "<td>";
                                echo "<form action='donor_update.php' method='get'>";
                                echo "<input type='hidden' name='donor_id' value='" . $row["donor_id"] . "'>";
                                echo "<button type='submit' name='update_button'>Update</button>";
                                echo "</form>";
                                echo "<form action='donor_delete.php' method='post'>";
                                echo "<input type='hidden' name='donor_id' value='" . $row["donor_id"] . "'>";
                                echo "<button type='submit' name='delete_button'>Delete</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            // If no donors found matching the search criteria, display a message
                            echo "No donors found matching the search criteria.";
                        }
                    }
                }
                // If neither search term is provided, display a message
                else {
                    echo "Please enter a search term.";
                }
                echo "<br><a href=\"donor_admin\" style=\"font-size: 24px;\">See Full List</a>";
            } else {
                // Display the complete list of donors
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th style='font-size: 18px;'>Blood Group</th>";
                echo "<th style='font-size: 18px;'>Blood Donor Name</th>";
                echo "<th style='font-size: 18px;'>Address</th>";
                echo "<th style='font-size: 18px;'>Area</th>";
                echo "<th style='font-size: 18px;'>Last Donation</th>";
                echo "<th style='font-size: 18px;'>Contact Number</th>";
                echo "</tr>";

                $sql = "SELECT * FROM blood_donor";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>&nbsp;" . $row["blood_group"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["city"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["area"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["last_donation"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["phone"] . "&nbsp;</td>";
                        echo "<td>";
                        echo "<form action='donor_update.php' method='get'>";
                        echo "<input type='hidden' name='donor_id' value='" . $row["donor_id"] . "'>";
                        echo "<button type='submit' name='update_button'>Update</button>";
                        echo "</form>";
                        echo "<form action='donor_delete.php' method='post'>";
                        echo "<input type='hidden' name='donor_id' value='" . $row["donor_id"] . "'>";
                        echo "<button type='submit' name='delete_button'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No Donors found.";
                }
            }

            $conn->close();
            ?>

            </table>
            <br><br>
            <a href="admin_menu.php" style="font-size: 24px;">Back to Home</a>
        </div>
    </center>
</body>

</html>