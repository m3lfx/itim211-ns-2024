<?php
print_r($_FILES);
$name = $_POST['artistName'];
$country = $_POST['country'];
// $img_path = $_POST['image'];
print "<h1>$name</h1>";
if ( isset( $_FILES['image'] ) ) {

    print "name: ".     $_FILES['image']['name']       ."<br />";
    print "size: ".     $_FILES['image']['size'] ." bytes<br />";
    print "temp name: ".$_FILES['image']['tmp_name']   ."<br />";
    print "type: ".     $_FILES['image']['type']       ."<br />";
    print "error: ".    $_FILES['image']['error']      ."<br />";

    if ( $_FILES['image']['type'] == "image/png" ) {

        $source = $_FILES['image']['tmp_name'];
        $target = "upload/".$_FILES['image']['name'];
        move_uploaded_file( $source, $target ) or die ("Couldn't copy");
        $size = getImageSize($target);

        $imgstr = "<p><img width=\"$size[0]\" height=\"$size[1]\" ";
        $imgstr .= "src=\"$target\" alt=\"uploaded image\" /></p>";

        print $imgstr;
    }
}
?>