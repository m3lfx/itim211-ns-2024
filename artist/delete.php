<?php
session_start();
include "../includes/config.php";
if (!isset($_SESSION['email'] )) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}
$artist_id = (int) $_GET['id'];
$sql = "DELETE FROM artists WHERE artist_id = $artist_id";
echo $sql;
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0) {
        header("Location: index.php");
        // echo "artist saved";
        
    }
?>