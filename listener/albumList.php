<?php

include("../includes/header.php");
include("../includes/config.php");
// print_r($_SESSION);
$sql = "SELECT l.listener_id FROM users u INNER JOIN listeners l ON (u.user_id = l.users_user_id) WHERE u.user_id = {$_SESSION['user_id']} LIMIT 1";
echo $sql;
$query = mysqli_query($conn, $sql);

$listener = mysqli_fetch_assoc($query);

$_SESSION['listener_id'] = $listener['listener_id'];

$sql1 = "SELECT * FROM albums";

$albums = mysqli_query($conn, $sql1);
// echo mysqli_num_rows($albums);

$sql2 = "SELECT * FROM albums a INNER JOIN albums_listeners al ON a.album_id = al.albums_album_id WHERE al.listeners_listener_id = {$_SESSION['listener_id']}";
$myAlbums = mysqli_query($conn, $sql2);
echo $sql2;
if(mysqli_num_rows($myAlbums) > 0) {
    while ($row = mysqli_fetch_assoc($myAlbums)) {
        $album_ids[] = $row['albums_album_id'];
        // var_dump(($album_ids)); 
    
    }
} else {
    $album_ids = [];
}
var_dump($album_ids);

?>
<div class="container-fluid container-lg">
    <!-- <table class="table table-striped">
        <thead>
            <tr>
                <th>Album Name</th>
                
            </tr>
        </thead>
        <tbody>
            <?php


            // while ($row = mysqli_fetch_assoc($albums)) {
            //     // var_dump($row);
            //     $album_ids[] = $row['album_id'];
            //     print "<tr>";
            //     echo "<td> <a href='review.php?album_id={$row['albums_album_id']}' >{$row['title']}</a></td>";
            //     echo "<td>" . $row['name'] . "</td>";
            //     echo "</tr>";
            // }


            // ?>
        </tbody>
    </table> -->

</div>
<div class="container-fluid container-lg">

    <form action="createAlbums.php" method="POST">

        <?php
        if (mysqli_num_rows($albums) > 0) {
            echo  mysqli_num_rows($albums);
            
            while ($row = mysqli_fetch_assoc($albums)) {
                if(in_array($row['album_id'], $album_ids) ) { 
                    echo "<div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]' checked>
                    <label class='form-check-label' for='flexCheckDefault'>
                        {$row['title']}
                    </label>
                    </div>";
                }
                else {
                    echo "<div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]' >
                    <label class='form-check-label' for='flexCheckDefault'>
                        {$row['title']}
                    </label>
                    </div>";
                }
               
            }
        }

        ?>
        <button type="submit" class="btn btn-primary">update list</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>