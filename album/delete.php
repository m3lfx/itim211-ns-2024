<?php
include "../includes/config.php";
 ;
$sql = "DELETE FROM albums WHERE album_id = {$_GET['id']}";
echo $sql;
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0) {
        header("Location: index.php");
        // echo "artist saved";
        
    }
?>