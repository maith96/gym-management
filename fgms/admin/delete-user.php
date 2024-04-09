<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['uid'])) {
        $userId = intval($_GET['uid']);

        // Perform the delete operation
        $sql = "DELETE FROM tblusers WHERE id=:uid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':uid', $userId, PDO::PARAM_INT);
        $query->execute();

        // Redirect back to the page after deletion
        header('location:manage-users.php');
    }
}
?>
