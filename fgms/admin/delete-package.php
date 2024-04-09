<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['pid'])) {
        $packageId = intval($_GET['pid']);

        // Perform the delete operation
        $sql = "DELETE FROM tblgympackages WHERE PackageId=:pid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pid', $packageId, PDO::PARAM_INT);
        $query->execute();

        // Redirect back to the page after deletion
        header('location:manage-packages.php');
    }
}
?>
