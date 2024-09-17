<?php
include "../includes/header.php";
include "../includes/config.php";
$album_id = $_GET['id'];
// echo $artist_id;
// $sql = "SELECT * FROM albums WHERE album_id = $album_id LIMIT 1";
$sql = "SELECT al.album_id AS `album id`, al.title AS `title`, ar.name AS `artist`, al.genre AS `genre`, date_released, ar.artist_id as `artist id` FROM artists ar INNER JOIN albums al ON ar.artist_id = al.artists_artist_id WHERE al.album_id = $album_id";
// echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql = "SELECT ar.name AS `artist`, ar.artist_id as `artist id` FROM artists ar INNER JOIN albums al ON ar.artist_id = al.artists_artist_id WHERE al.album_id <> $album_id";
$artists = mysqli_query($conn, $sql);
?>

<body>

<div class="container-fluid">
        <form action="store.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="albumName">Album name</label>
                <input type="text" class="form-control" id="artistName" aria-describedby="emailHelp" placeholder="Enter name"
                    name="title" value="<?php echo "{$row['title']}"; ?>">

            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="country" placeholder="artist country"
                    name="genre" value="<?php echo "{$row['genre']}"; ?>">
            </div>
            <div class="form-group">
                <label for="dateRelease">Genre</label>
                <input type="date" class="form-control" id="dateRelease" placeholder="artist country"
                    name="date_released" value="<?php echo "{$row['date_released']}"; ?>">
            </div>
            <div class="form-group">
                <select name="artist_id" class="form-control">
                    <?php
                    echo "<option value={$row['artist id']} selected >{$row['artist']}</option>";
                    while($row = mysqli_fetch_assoc($artists)){
                        echo "<option value={$row['artist id']} >{$row['artist']}</option>";
                    }
                    
                   ?>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    include "../includes/footer.php";
    ?>