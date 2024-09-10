<?php 
    session_start();
    include_once '../../config/db.php';
    if(!isset($_SESSION["student_login"])){
        $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
        header("location: ../register/signin.php");
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
</head>
<body>
<?php

    if(isset($_SESSION["student_login"])){
        $user_id = $_SESSION["student_login"];
        
        $stmt = $conn->query("SELECT * FROM STUDENT WHERE $user_id = user_id ");
        //echo $user_id;
        $row_student = $stmt->fetch(PDO::FETCH_ASSOC); 
        $stu_id = $row_student['stu_id'];


        
        $stmt_2 = $conn->query("SELECT * FROM Courses 
                                WHERE course_id IN (SELECT course_id FROM Enrollment WHERE $stu_id = stu_id )");
                                                                           
        echo $stu_id;
        $stmt_2 -> execute();
        
        $rowCount = $stmt_2->rowCount();
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
                    <a class="nav-link" href= "../../regis/logout.php" >ล็อคเอ้าท์</a>
                    <?php
                        $editUrl = "../student/student_pro_index.php?stu_id=" . $row_student["stu_id"] . "1234";
                    ?>
                    <a class="nav-link" href="<?php echo $editUrl?>" >โปรไฟล์ของฉัน</a>
                </div>
                <a class="navbar-brand " href="#">
                        <img src="<?php echo '../student/stu_pic/'.$row_student['filename'] ?> " alt="Bootstrap" width="50" height="50" class="rounded float-end">    
                </a>
                
            </div>
        </div>
    </nav>
    
    <nav class="nav navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <a class="nav-link" style="color : aliceblue;" href="../../page/home.php">หน้าแรก</a>
        <a class="nav-link" style="color : aliceblue;" href="../../page/S_math.php">คณิตศาสตร์</a>
        <a class="nav-link" style="color : aliceblue;" href="../../page/S_sci.php">วิทยาศาสตร์</a>
        <a class="nav-link" style="color : aliceblue;" href="../../page/S_english.php">ภาษาอังกฤษ</a>
        <a class="nav-link" style="color : aliceblue;" href="../../page/S_social.php">สังคม</a>
        <a class="nav-link" style="color : aliceblue;" href="../../page/S_thai.php">ภาษาไทย</a>
        <a class="nav-link" style="color : aliceblue;" href="#">Contract Us</a>
    </nav> 

    <!-- end nav bar -->
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


<!--heros-->
<div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://img-c.udemycdn.com/course/750x422/461812_32c7.jpg" alt="" width="100" height="100">
        <h1 class="display-5 fw-bold text-body-emphasis">Enrollment</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">คอร์สในตระกร้า</p>

        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รหัสคอร์ส</th>
                    <th scope="col">ชื่อคอร์ส</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>

            <?php if($rowCount > 0 ): ?>
                <?php $count = 1; $price = 0; ?>
                <?php while($course = $stmt_2->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php $price = $price + $course['price'];  ?>
            
                    <tbody>
                        <tr class="table-primary">
                            <td><?php echo $count; $count++; ?></td>
                            <td><?php echo  $course['category'] . $course['course_id']; ?></td>
                            <td><?php echo $course['title']; ?></td>
                            <td>
                                <?php 
                                    $course_id = $course['course_id'];
                                    $sql = "SELECT * FROM Enrollment
                                             WHERE stu_id = $stu_id 
                                             AND course_id = $course_id
                                             ";
                                    $stmt = $conn->query($sql);
                                    $row_en = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                
                                ?>
                                
                                
                                <?php if($row_en['payment_status'] == 2) { 
                                        echo $_SESSION['enroll'] ?>
                                <?php }else if($row_en['payment_status'] == 0) {?>  
                                    <div class="modal-footer">
                                    <form action="enroll.php" method="post" enctype="multipart/form-data">
                                   
                                
                                        <input type="hidden" name="submit_delete" value="<?php echo $course['course_id']?>">
                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                    </form>
                                
                                    </div>
                                <?php }else if($row_en['payment_status'] == 1) { echo "ลงทะเบียนสำเร็จ";}?> 
                                    

                                    
                                
                            </td>
                             
                        </tr>
                        
                <?php endwhile; ?>   
            <?php endif; ?>  
                    </tbody>
        </table>
        </div>

        <form action="enroll.php" method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ยืนยันการลงทะเบียน
                </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" name="submit_ee" value="<?php echo $course['course_id']?>">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        ราคาคอร์ส : <?php echo $price; ?>
                        <br>
                        <div class="text-center">
                            <img src="../pic/qr.png" class="rounded" alt="..."  style="width: 200px; height: 150px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <a href="../payment/payment_index.php" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">ยืนยัน</a>
                    
                    </div>
                    </div>
                </div>
            </div> 
            
        </form> 

        
        
        
        </form>





    </div>
    <!--end heroes-->


</body>
</html>