<?php
include "../includes/header.php";
include "../includes/config.php";
$sql = "SELECT * FROM artists";
$result = mysqli_query($conn, $sql);


?>

<body>
    <div class="container-fluid">
        <form action="store.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="albumName">Album name</label>
                <input type="text" class="form-control" id="artistName" aria-describedby="emailHelp" placeholder="Enter name"
                    name="title">

            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="country" placeholder="artist country"
                    name="genre">
            </div>
            <div class="form-group">
                <label for="dateRelease">Genre</label>
                <input type="date" class="form-control" id="dateRelease" placeholder="artist country"
                    name="date_released">
            </div>
            <div class="form-group">
                <select name="artist_id" class="form-control">
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value={$row['artist_id']}>{$row['name']}</option>";
                    }
                    
                   ?>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<?php
include "../includes/footer.php";
?>