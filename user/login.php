<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
print_r($_SESSION);
if (isset($_SESSION['email'])) {
   
    header("Location: ../index.php" );
}

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
   
    $pass = hash('sha256', trim($_POST['password']));
    $sql = "SELECT email FROM users WHERE email='$email' AND password='$pass' LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        header("Location: ../index.php");
    }
}
if (isset($_SESSION['message'])) {
    // var_dump($_SESSION);
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>{$_SESSION['message']}</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    unset($_SESSION['message']);
    
}
?>
<div class="row col-md-8 mx-auto ">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">

                
            </div>

           
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="register.php">Register</a></p>
           
            
        </div>
    </form>
</div>