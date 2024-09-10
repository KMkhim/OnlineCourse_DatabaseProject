<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<?php
        if(isset($_SESSION["student_login"])){
            $user_id = $_SESSION["student_login"];
            //echo $user_id;
            $stmt = $conn->query("SELECT * FROM Users WHERE user_id = $user_id");
            $stmt->execute();
            $row_user = $stmt->fetch(PDO::FETCH_ASSOC);  
            
            $stmt_2 = $conn->query("SELECT * FROM STUDENT WHERE user_id = $user_id ");
            //echo $stmt;
            $stmt_2 -> execute();
            $row_student = $stmt_2->fetch(PDO::FETCH_ASSOC); 
            
            if($row_student["user_id"] == null){
                $sql = "INSERT INTO STUDENT (user_id, filename , uploaded_on)
                        VALUES('$user_id','unknow.png',NOW()) ";
                $conn->query($sql);
            }
        }
        
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        
        <div class="container">
            <a class="nav-link" href="#">
                <img src="https://i.natgeofe.com/n/4cebbf38-5df4-4ed0-864a-4ebeb64d33a4/NationalGeographic_1468962_3x4.jpg" alt="Bootstrap" width="50" height="50"   class="rounded float-start">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">คอร์สเรียนของฉัน</a>
                    <a class="nav-link" href= "../regis/logout.php" >ล็อคเอ้าท์</a>
                    <?php
                        $editUrl = "./student/student_pro_index.php?stu_id=" . $row_student["stu_id"] . "1234";
                    ?>
                    <a class="nav-link" href="<?php echo $editUrl?>" >โปรไฟล์ของฉัน</a>
                </div>
                <a class="navbar-brand " href="#">
                        <img src="<?php echo './student/stu_pic/'.$row_student['filename'] ?> " alt="Bootstrap" width="50" height="50" class="rounded float-end">    
                </a>
                
            </div>
        </div>
    </nav>
    
    <nav class="nav navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <a class="nav-link" style="color : aliceblue;" href="./home.php">หน้าแรก</a>
        <a class="nav-link" style="color : aliceblue;" href="./S_math.php">คณิตศาสตร์</a>
        <a class="nav-link" style="color : aliceblue;" href="./S_sci.php">วิทยาศาสตร์</a>
        <a class="nav-link" style="color : aliceblue;" href="./S_english.php">ภาษาอังกฤษ</a>
        <a class="nav-link" style="color : aliceblue;" href="./S_social.php">สังคม</a>
        <a class="nav-link" style="color : aliceblue;" href="./S_thai.php">ภาษาไทย</a>
        <a class="nav-link" style="color : aliceblue;" href="#">Contract Us</a>
    </nav>

</body>

</html>
