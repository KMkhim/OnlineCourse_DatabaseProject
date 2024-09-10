<?php
    session_start();
    require_once '../config/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration System PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <br>
        <h3> สมัครสมาชิก </h3>
        <hr>
        <form action="signup_db.php" method = "post">
            
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" name="username" >
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">First name</label>
                <input type="text" class="form-control" name="fname" >
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lname" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" >
            </div>
            <div class="mb-3">
                <label for="confirm password" class="form-label">Confirm password</label>
                <input type="password" class="form-control" name="c_password" >
            </div>
            <button type="submit"  name="signup" class="btn btn-primary">Sign Up</button>
        </form>
        <hr>
        <p>เป็นสมาชิกแล้วใช่ไหม คลิกที่นี่<a href="signin.php" > เข้าสู่ระบบ </a></p>
        <p>กลับหน้าแรก<a href="../page/home.php" > Home Page </a></p>
        <br>
    
    </div>
    
</body>
</html>