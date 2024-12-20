<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admin</title>
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>CareCompass - Hospital Management</h1><br><br><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="hospital_area" placeholder="Hospital Area" style="font-size: 24px;">
                <button type="submit" name="search_hospital" style="font-size: 24px;">Search Hospital By Area</button>
                <br>
                <input type="text" name="hospital_name" placeholder="Hospital Name" style="font-size: 24px;">
                <button type="submit" name="search_hospital_name" style="font-size: 24px;">Search Hospital By Name</button>
            </form>
            <button><a href="hospital_add.php" style="font-size: 24px" >Add New Hospital Details</a></button>

            <?php
            include 'connection.php';

            // Check if the search form was submitted and at least one search criteria is provided
            if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["search_hospital"]) || isset($_POST["search_hospital_name"]))) {
                // Search by area
                if (isset($_POST["hospital_area"]) && !empty($_POST["hospital_area"])) {
                    $hospital_area = mysqli_real_escape_string($conn, $_POST["hospital_area"]);
                    $sql = "SELECT * FROM hospital WHERE area LIKE '%$hospital_area%'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Display results
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th style='font-size: 18px;'>Hospital ID</th>";
                        echo "<th style='font-size: 18px;'>Hospital Name</th>";
                        echo "<th style='font-size: 18px;'>City</th>";
                        echo "<th style='font-size: 18px;'>Area</th>";
                        echo "<th style='font-size: 18px;'>Find Location</th>";
                        echo "<th style='font-size: 18px;'>Hotline Number</th>";
                        echo "<th style='font-size: 18px;'>Action</th>";
                        echo "</tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["hospital_id"] . "</td>";
                            echo "<td>&nbsp;" . $row["name"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["city"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["area"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["find_location"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["hotline_number"] . "&nbsp;</td>";
                            echo "<td>";
                            echo "<form action='hospital_update.php' method='get'>";
                            echo "<input type='hidden' name='hospital_id' value='" . $row["hospital_id"] . "'>";
                            echo "<button type='submit' name='update_button'>Update</button>";
                            echo "</form>";
                            echo "<form action='hospital_delete.php' method='post'>";
                            echo "<input type='hidden' name='hospital_id' value='" . $row["hospital_id"] . "'>";
                            echo "<button type='submit' name='delete_button'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No hospitals found matching the search criteria.";
                    }
                }
                // Search by hospital name
                elseif (isset($_POST["hospital_name"]) && !empty($_POST["hospital_name"])) {
                    $hospital_name = mysqli_real_escape_string($conn, $_POST["hospital_name"]);
                    $sql = "SELECT * FROM hospital WHERE name LIKE '%$hospital_name%'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th style='font-size: 18px;'>Hospital ID</th>";
                        echo "<th style='font-size: 18px;'>Hospital Name</th>";
                        echo "<th style='font-size: 18px;'>City</th>";
                        echo "<th style='font-size: 18px;'>Area</th>";
                        echo "<th style='font-size: 18px;'>Find Location</th>";
                        echo "<th style='font-size: 18px;'>Hotline Number</th>";
                        echo "<th style='font-size: 18px;'>Action</th>";
                        echo "</tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["hospital_id"] . "</td>";
                            echo "<td>&nbsp;" . $row["name"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["city"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["area"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["find_location"] . "&nbsp;</td>";
                            echo "<td>&nbsp;" . $row["hotline_number"] . "&nbsp;</td>";
                            echo "<td>";
                            echo "<form action='hospital_update.php' method='get'>";
                            echo "<input type='hidden' name='hospital_id' value='" . $row["hospital_id"] . "'>";
                            echo "<button type='submit' name='update_button'>Update</button>";
                            echo "</form>";
                            echo "<form action='hospital_delete.php' method='post'>";
                            echo "<input type='hidden' name='hospital_id' value='" . $row["hospital_id"] . "'>";
                            echo "<button type='submit' name='delete_button'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No hospitals found matching the search criteria.";
                    }
                } else {
                    echo "Please enter a search term.";
                }
            } else {
                // Display the complete list of hospitals
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th style='font-size: 18px;'>Hospital ID</th>";
                echo "<th style='font-size: 18px;'>Hospital Name</th>";
                echo "<th style='font-size: 18px;'>City</th>";
                echo "<th style='font-size: 18px;'>Area</th>";
                echo "<th style='font-size: 18px;'>Find Location</th>";
                echo "<th style='font-size: 18px;'>Hotline Number</th>";
                echo "<th style='font-size: 18px;'>Action</th>";
                echo "</tr>";

                $sql = "SELECT * FROM hospital";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["hospital_id"] . "</td>";
                        echo "<td>&nbsp;" . $row["name"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["city"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["area"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["find_location"] . "&nbsp;</td>";
                        echo "<td>&nbsp;" . $row["hotline_number"] . "&nbsp;</td>";
                        echo "<td>";
                        echo "<form action='hospital_update.php' method='get'>";
                        echo "<input type='hidden' name='hospital_id' value='" . $row["hospital_id"] . "'>";
                        echo "<button type='submit' name='update_button'>Update</button>";
                        echo "</form>";
                        echo "<form action='hospital_delete.php' method='post'>";
                        echo "<input type='hidden' name='hospital_id' value='" . $row["hospital_id"] . "'>";
                        echo "<button type='submit' name='delete_button'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No hospitals found.";
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
