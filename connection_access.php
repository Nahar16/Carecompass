<?php
session_start();
include("connection.php");

function handleSignup($conn)
{
    // Retrieve username and password from form submission
    $username = $_POST['username'];
    $password = $_POST['password']; // Retrieve password

    // Prepare SQL statement to insert user into the database
    $sql = "INSERT INTO `user` (`name`, `password`) VALUES ('$username', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // User added successfully
        // Set the username in the session
        $_SESSION['username'] = $username;

        header("Location: admin_menu.php");
        exit(); // Terminate the script to prevent further execution
    } else {
        // Error adding user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function handleSignin($conn)
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE name = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // Set the username in the session
        $_SESSION['username'] = $username;

        header("Location: admin_menu.php");
        exit(); // Terminate the script to prevent further execution
    } else {
        echo '<script>
                window.location.href = "index.php";
                alert("Login failed, Invalid username or password")
              </script>';
        exit();
    }
}

function handleViewerSignup($conn)
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $house_no = $_POST['house_no'];
    $road_no = $_POST['road_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get the maximum customer_id and increment by 1
    $result = $conn->query("SELECT MAX(CAST(customer_id AS UNSIGNED)) AS max_id FROM customer");
    $row = $result->fetch_assoc();
    $new_customer_id = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;

    // Prepare the SQL statement to insert the customer
    $sql = "INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone`, `city`, `area`, `house-no`, `road_no`, `email`, `password`) 
            VALUES ('$new_customer_id', '$first_name', '$last_name', '$phone', '$city', '$area', '$house_no', '$road_no', '$email', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        $_SESSION['customer_name'] = $first_name . ' ' . $last_name;
        $_SESSION['customer_id'] = $new_customer_id; // Store the new customer ID

        header("Location: medicine_list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function handleViewerSignin($conn)
{
    $email = $_POST['customer_email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['customer_name'] = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['customer_id'] = $row['customer_id'];

        header("Location: medicine_list.php");
        exit();
    } else {
        echo '<script>
                window.location.href = "index.php";
                alert("Login failed, Invalid email or password")
              </script>';
        exit();
    }
}

// Determine if the request is for signup or signin
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        handleSignup($conn);
    } elseif (isset($_POST['login'])) { // Ensure this matches your form field
        handleSignin($conn);
    } elseif (isset($_POST['viewer_signup'])) { // Ensure this matches your form field
        handleViewerSignup($conn);
    } elseif (isset($_POST['viewer_login'])) { // Ensure this matches your form field
        handleViewerSignin($conn);
    }
}

// Close connection
$conn->close();
