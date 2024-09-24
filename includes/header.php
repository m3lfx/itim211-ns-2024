<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="m-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">music</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Profile</a>
                        <a href="/itim211-ns/artist" class="nav-item nav-link">Artists</a>
                        <a href="/itim211-ns/album" class="nav-item nav-link " tabindex="-1">Albums</a>
                        <a href="/itim211-ns/listener/albumlist.php" class="nav-item nav-link " tabindex="-1">my Albums</a>
                    </div>
                    <?php
                    if (!isset($_SESSION['email'])) {
                        echo "<div class='navbar-nav ms-auto'>
                        <a href='http://{$_SERVER['SERVER_NAME']}/itim211-ns/user/login.php'  class='nav-item nav-link'>Login</a></div>";
                    } else {
                        echo "<div class='navbar-nav ms-auto'>
                        <a href='http://{$_SERVER['SERVER_NAME']}/itim211-ns/user/logout.php'  class='nav-item nav-link'>Logout</a></div>";
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>

