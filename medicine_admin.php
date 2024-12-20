<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Admin</title>
</head>

<body class="bg-light" background="https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg">
    <center>
        <div class="container">
            <h1>CareCompass - Medicine Management</h1><br><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="medicine_name" placeholder="Medicine's Name" style="font-size: 24px;">
                <button type="submit" name="search_medicine" style="font-size: 24px;">Search Medicine</button>
            </form>
            <button><a href="medicine_add.php" style="font-size: 24px;">Add New Medicine</a></button>

            <?php
            include 'connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_medicine"])) {
                if (isset($_POST["medicine_name"]) && !empty($_POST["medicine_name"])) {
                    $medicine_name = mysqli_real_escape_string($conn, $_POST["medicine_name"]);
                    $sql = "SELECT * FROM medicine WHERE medicine_name LIKE '%$medicine_name%'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th style='font-size: 18px;'>Medicine's Name</th>";
                        echo "<th style='font-size: 18px;'>Price</th>";
                        echo "<th style='font-size: 18px;'>Quantity</th>";
                        echo "<th style='font-size: 18px;'>Action</th>";
                        echo "</tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='font-size: 18px;'>" . $row["medicine_name"] . "</td>";
                            echo "<td style='font-size: 18px;'>" . $row["price"] . "</td>";
                            echo "<td style='font-size: 18px;'>" . $row["quantity"] . "</td>";
                            echo "<td>";
                            echo "<form action='medicine_update.php' method='get'>";
                            echo "<input type='hidden' name='medicine_id' value='" . $row["medicine_id"] . "'>";
                            echo "<button type='submit' name='update_button'>Update</button>";
                            echo "</form>";
                            echo "<form action='medicine_delete.php' method='post'>";
                            echo "<input type='hidden' name='medicine_id' value='" . $row["medicine_id"] . "'>";
                            echo "<button type='submit' name='delete_button'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No medicines found matching the search criteria.";
                    }
                } else {
                    echo "Please enter a search term.";
                }
            } else {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th style='font-size: 18px;'>Medicine's Name</th>";
                echo "<th style='font-size: 18px;'>Price</th>";
                echo "<th style='font-size: 18px;'>Quantity</th>";
                echo "<th style='font-size: 18px;'>Action</th>";
                echo "</tr>";

                $sql = "SELECT * FROM medicine";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='font-size: 18px;'>" . $row["medicine_name"] . "</td>";
                        echo "<td style='font-size: 18px;'>" . $row["price"] . "</td>";
                        echo "<td style='font-size: 18px;'>" . $row["quantity"] . "</td>";
                        echo "<td>";
                        echo "<form action='medicine_update.php' method='get'>";
                        echo "<input type='hidden' name='medicine_id' value='" . $row["medicine_id"] . "'>";
                        echo "<button type='submit' name='update_button'>Update</button>";
                        echo "</form>";
                        echo "<form action='medicine_delete.php' method='post'>";
                        echo "<input type='hidden' name='medicine_id' value='" . $row["medicine_id"] . "'>";
                        echo "<button type='submit' name='delete_button'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No medicines found.";
                }
                echo "</table>";
            }

            $conn->close();
            ?>
            <br><br>
            <a href="admin_menu.php" style="font-size: 24px;">Back to Home</a>
        </div>
    </center>
</body>

</html>
