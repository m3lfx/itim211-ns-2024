<?php
include "../includes/config.php";
$title = trim($_POST['title']);
$genre = trim($_POST['genre']);
$date_released = $_POST['date_released'];
$artist_id = $_POST['artist_id'];
$album_id = $_POST['albumId'];

$sql = "UPDATE albums SET title = '$title', genre = '$genre', date_released = '$date_released', artists_artist_id = $artist_id  WHERE album_id = $album_id";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0) {
        header("Location: index.php");
        // echo "artist saved";
        
    }
?>