<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $donor_id = $_POST['donor_id'];
    $sql_delete_updates = "DELETE FROM updates_b WHERE donor_id='$donor_id'";
    if ($conn->query($sql_delete_updates) !== TRUE) {
        echo "Error deleting from updates_b: " . $conn->error;
        exit();
    }

    $sql_delete_donor = "DELETE FROM blood_donor WHERE donor_id='$donor_id'";
    if ($conn->query($sql_delete_donor) === TRUE) {
        header("Location: donor_admin.php?success=1");
        exit();
    } else {
        echo "Error deleting donor record: " . $conn->error;
    }
}

$conn->close();

if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];
} else {
    echo "No donor ID provided.";
    exit;
}
?>
