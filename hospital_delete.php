<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $hospital_id = $_POST['hospital_id'];
    $sql_delete_updates = "DELETE FROM updates_h WHERE hospital_id='$hospital_id'";
    if ($conn->query($sql_delete_updates) === TRUE) {
        $sql_delete_hospital = "DELETE FROM hospital WHERE hospital_id='$hospital_id'";
        if ($conn->query($sql_delete_hospital) === TRUE) {
            header("Location: hospital_admin.php?success=1");
            exit();
        } else {
            echo "Error deleting hospital record: " . $conn->error;
        }
    } else {
        echo "Error deleting from updates_h: " . $conn->error;
    }
}

$conn->close();
if (isset($_GET['hospital_id'])) {
    $hospital_id = $_GET['hospital_id'];
} else {
    echo "No hospital ID provided.";
    exit;
}
?>
