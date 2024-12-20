<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $medicine_id = $_POST['medicine_id'];
    $conn->begin_transaction();

    try {
        $sql_delete_orders = "DELETE FROM orders WHERE medicine_id='$medicine_id'";
        if ($conn->query($sql_delete_orders) !== TRUE) {
            throw new Exception("Error deleting orders: " . $conn->error);
        }
        $sql_delete_updates = "DELETE FROM updates_m WHERE medicine_id='$medicine_id'";
        if ($conn->query($sql_delete_updates) !== TRUE) {
            throw new Exception("Error deleting from updates_m: " . $conn->error);
        }
        $sql_delete_medicine = "DELETE FROM medicine WHERE medicine_id='$medicine_id'";
        if ($conn->query($sql_delete_medicine) !== TRUE) {
            throw new Exception("Error deleting medicine record: " . $conn->error);
        }
        $conn->commit();
        header("Location: medicine_admin.php?success=1");
        exit();

    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
}

$conn->close();
?>