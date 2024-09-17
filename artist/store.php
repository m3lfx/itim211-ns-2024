<?php
include "../includes/config.php";
// print_r($_FILES);
$name = trim($_POST['artistName']);
$country = trim($_POST['country']);

// $img_path = $_POST['image'];
print "<h1>$name</h1>";
if ( isset( $_FILES['image'] ) ) {

    print "name: ".     $_FILES['image']['name']       ."<br />";
    print "size: ".     $_FILES['image']['size'] ." bytes<br />";
    print "temp name: ".$_FILES['image']['tmp_name']   ."<br />";
    print "type: ".     $_FILES['image']['type']       ."<br />";
    print "error: ".    $_FILES['image']['error']      ."<br />";

    if ( $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpg"  ) {

        $source = $_FILES['image']['tmp_name'];
        $target = "upload/".$_FILES['image']['name'];
        move_uploaded_file( $source, $target ) or die ("Couldn't copy");
        $size = getImageSize($target);

        $imgstr = "<p><img width=\"$size[0]\" height=\"$size[1]\" ";
        $imgstr .= "src=\"$target\" alt=\"uploaded image\" /></p>";

        print $imgstr;
    }

    $sql = "INSERT INTO artists (name,country,img_path) VALUES('$name', '$country','$target')";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0) {
        header("Location: index.php");
        // echo "artist saved";
        
    }
}
?>