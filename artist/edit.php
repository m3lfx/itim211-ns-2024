<?php
session_start();
include "../includes/header.php";
include "../includes/config.php";
if (!isset($_SESSION['email'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}
$artist_id = $_GET['id'];
// echo $artist_id;
$sql = "SELECT * FROM artists WHERE artist_id = $artist_id LIMIT 1";
echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>

    <div class="container-fluid">
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="artistName">Artist name</label>
                <input type="text" class="form-control" id="artistName" aria-describedby="emailHelp" placeholder="Enter name"
                    name="artistName" value="<?php echo "{$row['name']}"; ?>">

            </div>
            <div class="form-group">
                <label for="country">country</label>
                <input type="text" class="form-control" id="country" placeholder="artist country"
                    name="country" value="<?php echo "{$row['country']}"; ?>">
            </div>
            <div class="form-group">
                <label for="image">upload image</label>
                <input type="file" class="form-control" id="image" placeholder="image"
                    name="image">
            </div>
            <div>
                <img width='50' height='50' src="<?php echo "{$row['img_path']}"; ?>" alt='uploaded image' /></td>

            </div>
            <input type="hidden" name="artistId" value="<?php echo "{$row['artist_id']}"; ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <?php
    include "../includes/footer.php";
    ?>