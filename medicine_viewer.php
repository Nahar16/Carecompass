<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine List</title>
</head>

<body class="bg-light" style="background-image: url('https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg');">
    <center>
        <div class="container">
            <h1>CareCompass</h1><br><br>


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="medicine_name" placeholder="Medicine's Name" style="font-size: 24px;">
                <button type="submit" name="search_medicine" style="font-size: 24px;">Search Medicine</button>
            </form>


            
            <p style="font-size: 18px;
            padding: 40px;
            ">To order you must sign up/sign in. <a href="viewer_signup.php" style="font-size: 18px;" class="btn">Click here to sign up</a>, or <a href="viewer_login.php" style="font-size: 18px;" class="btn">click here to sign in</a>.</p>

            


            <?php
            include 'connection.php';

            $searchPerformed = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_medicine"])) {
                $searchPerformed = true;
                if (isset($_POST["medicine_name"]) && !empty($_POST["medicine_name"])) {
                    $medicine_name = mysqli_real_escape_string($conn, $_POST["medicine_name"]);
                    $sql = "SELECT * FROM medicine WHERE medicine_name LIKE '%$medicine_name%'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th style='font-size: 18px;'>Medicine's Name</th>";
                        echo "<th style='font-size: 18px;'>Price</th>";
                        echo "<th style='font-size: 18px;'>Available Quantity</th>";
                        echo "</tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='font-size: 18px;'>" . $row["medicine_name"] . "</td>";
                            echo "<td style='font-size: 18px;'>" . $row["price"] . "</td>";
                            echo "<td style='font-size: 18px;'>" . $row["quantity"] . "</td>";
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
                echo "<th style='font-size: 18px;'>Available Quantity</th>";
                echo "</tr>";

                $sql = "SELECT * FROM medicine";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='font-size: 18px;'>" . $row["medicine_name"] . "</td>";
                        echo "<td style='font-size: 18px;'>" . $row["price"] . "</td>";
                        echo "<td style='font-size: 18px;'>" . $row["quantity"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No medicines found.";
                }
                echo "</table>";
            }
            $conn->close();
            ?>


            <?php if ($searchPerformed): ?>
                <a href="medicine_viewer.php" style="font-size: 24px;">See Full List</a>
            <?php else: ?>
                <a href="index.php" style="font-size: 24px;">Back</a>
            <?php endif; ?>
        </div>
    </center>
</body>

</html>
