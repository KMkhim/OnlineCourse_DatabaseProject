<?php 

    session_start();
    include_once '../../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Upload Course </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<?php
    if(isset($_SESSION["student_login"])){
        $stu_id = $_SESSION["student_login"];
        $stmt = $conn->query("SELECT * FROM Users WHERE user_id = $stu_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);    
        }
        $user_id = $row['user_id'];
            
        ?>

<div class="container">
        
        <div class="row mt-5">
            <div class="col-12">
                <form action="payment.php" method="post" enctype="multipart/form-data">
                     <!-- <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div> -->
                
                
                    <div class="mb-3">
                        <label for="title" class="form-label">Payment</label>
                        
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Date</label>
                        <input type="date" class="form-control"  data-date-format="YYYY-MM-DD" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Time</label>
                        <input type="time" class="form-control"  name="time">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Select <strong>Tranaction</strong>  Image</label>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                    </div> 
                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="submit" class="btn btn-sm btn-primary mb-3">
                    </div>
                </form>
            </div>
        </div>
        
                    
        
        
        
        
        
        
        <div class="row">
            <?php  if (!empty($_SESSION['statusMsg'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                       
                    ?>
                </div>
            <?php } ?>
        </div>
           
        
    
</body>
</html>