<?php
session_start();
require 'db.php';

if (isset($_SESSION['tenantID'])) {
    $tenantID = $_SESSION['tenantID'];

    // Assuming 'boardingName' is defined somewhere in your code
    $boardingName = $_POST['boardingName'];

    $updateQuery = $con->prepare("UPDATE tenant SET rented_bh = ? WHERE tenantID = ?");
    $updateQuery->bind_param("si", $boardingName, $tenantID);

    $response = array();

    if ($updateQuery->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = $con->error;
    }

    $updateQuery->close();
} else {
    $response['success'] = false;
    $response['error'] = 'Tenant ID not found.';
}

echo json_encode($response);
?>
