<?php
require "../includes/header.php";
include "../includes/config.php";
?>

<body>
    <div class="container-fluid container-lg">
        <a class="btn btn-primary" href="create.php" role="button">Add Artist</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Album ID</th>
                    <th>Album Name</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Date Released</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT al.album_id AS `album id`, al.title AS `title`, ar.name AS `artist`, al.genre AS `genre`, date_released FROM artists ar INNER JOIN albums al ON ar.artist_id = al.artists_artist_id ";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    // var_dump($row);
                    print "<tr>";
                    echo "<td>" . $row['album id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['artist'] . "</td>";
                    echo "<td>" . $row['genre'] . "</td>";
                    echo "<td>" . $row['date_released'] . "</td>";
                    echo "<td><a href=edit.php?id={$row['album id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['album id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";

                   
                    print "</tr>";
                }

                ?>
            </tbody>
        </table>

    </div>
    <?php
    include "../includes/footer.php";
    ?>