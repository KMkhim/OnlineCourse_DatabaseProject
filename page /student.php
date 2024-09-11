<?php
    session_start();
    require_once '../config/db.php';
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
    <title>Student Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<?php
        include_once './check_choose_nav.php';
?>
<br>
    <br>
<div class="container marketing">
    <hr class="#">

    <div class="row ">
        <!-- วิชาคณิตศาสตร์  -->
        <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'MA%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
        <h2 class="featurette-heading fw-normal lh-1">วิชาคณิตศาสตร์ <span class="text-body-secondary"> แนะนำ</span></h2>
        <br>
            <div class="container">
           
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php $count = 0; ?>
                <?php while(($course = $stmt->fetch(PDO::FETCH_ASSOC)) && ($count < 5)) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="<?php echo '../edit_course/course_pro/'.$course['file_name'] ?>"></img>
                            <div class="card-body">
                                <h4 class="card-text"><?php echo $course['title'] ?></h4>
                                <h6 class="card-text"><?php echo $course['category'] ?></h4>
                                <p class="card-text"><?php echo $course['description'] ?></p>
                                <p class="card-text"><?php echo "ราคาคอร์ส" . $course['price'] . "฿" ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    
                                    <?php  
                                        $courseId = $course['course_id']; 
                                        
                                    ?>
                                    <form action="./enroll/enroll.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="submit_enroll" value="<?php echo $courseId?>">
                                         <button type="submit" class="btn btn-sm btn-outline-secondary">Enroll ee</button>
        
                                    </form>
                                    </div>
                                    <small class="text-body-secondary"><?php echo $course['updated_at'] ?></small>
                                </div>
                            </div>
                        </div>
                     </div>
                     <?php $count++; ?>
                <?php endwhile; ?>  
                </div> 
               
            </di> 
            
        </div>
        <?php endif; ?> 
        <!-- END วิชาคณิตศาสตร์  -->
        <hr class="#">

        <!--วิชาSCIENCE -->                                     
        <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'SC%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
        <h2 class="featurette-heading fw-normal lh-1">วิชาวิทยาศาสตร์ <span class="text-body-secondary"> แนะนำ</span></h2>
        <br>
            <div class="container">
           
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php $count = 0; ?>
                <?php while(($course = $stmt->fetch(PDO::FETCH_ASSOC)) && ($count < 5)) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="<?php echo '../edit_course/course_pro/'.$course['file_name'] ?>"></img>
                            <div class="card-body">
                                <h4 class="card-text"><?php echo $course['title'] ?></h4>
                                <h6 class="card-text"><?php echo $course['category'] ?></h4>
                                <p class="card-text"><?php echo $course['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <form action="../edit_course/edit_course_index.php" method="post" enctype="multipart/form-data">
                                    <?php
                                        $courseId = $course['course_id']; 
                                        $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                        $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                    ?>
                                        <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                        <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        
                                        
                                    </form>
                                    </div>
                                    <small class="text-body-secondary"><?php echo $course['updated_at'] ?></small>
                                </div>
                            </div>
                        </div>
                     </div>
                     <?php $count++; ?>
                <?php endwhile; ?>  
                </div> 
               
            </div>  
        </div>
   
        <?php endif; ?> 
         <!--วิชาSCIENCE --> 

         <!--วิชาENGLISH -->                                     
         <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'EN%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
        <h2 class="featurette-heading fw-normal lh-1">วิชาภาษาอังกฤษ <span class="text-body-secondary"> แนะนำ</span></h2>
        <br>
            <div class="container">
           
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php $count = 0; ?>
                <?php while(($course = $stmt->fetch(PDO::FETCH_ASSOC)) && ($count < 5)) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="<?php echo '../edit_course/course_pro/'.$course['file_name'] ?>"></img>
                            <div class="card-body">
                                <h4 class="card-text"><?php echo $course['title'] ?></h4>
                                <h6 class="card-text"><?php echo $course['category'] ?></h4>
                                <p class="card-text"><?php echo $course['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <form action="../edit_course/edit_course_index.php" method="post" enctype="multipart/form-data">
                                        <?php 
                                            $courseId = $course['course_id']; 
                                            $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                            $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                        ?>
                                        <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                        <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        
                                        
                                    </form>
                                    </div>
                                    <small class="text-body-secondary"><?php echo $course['updated_at'] ?></small>
                                </div>
                            </div>
                        </div>
                     </div>
                     <?php $count++; ?>
                <?php endwhile; ?>  
                </div> 
               
            </div>  
        </div>
   
        <?php endif; ?> 
         <!--END วิชา ENGLISH --> 



         
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
<footer><?php  include_once './footer.php'?></footer>
</html>