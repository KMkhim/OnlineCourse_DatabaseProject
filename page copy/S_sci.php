<?php
    session_start();
    require_once '../config/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<?php
        include_once './check_choose_nav.php';
    ?>
    <!--heros-->
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://img-c.udemycdn.com/course/750x422/461812_32c7.jpg" alt="" width="100" height="100">
        <h1 class="display-5 fw-bold text-body-emphasis">Science Site</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">วิทยาศาสตร์สุดสนุก</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" ><a href="#SC1">ประถม</a></button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" ><a href="#SC2">ม.ต้น</a></button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" ><a href="#SC3">ฟิสิกส์</a></button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" ><a href="#SC4">เคมี</a></button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" ><a href="#SC5">ชีวะ</a></button>
            </div>
        </div>

    </div>
    <!--end heroes-->

<div class="container marketing">
    <hr class="#">

    <div class="row ">
        <!-- วิชาวิทยาศาสตร์ ประถม-->
        <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'SC1%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
            <h2 class="featurette-heading fw-normal lh-1" id="SC1">วิชาวิทยาศาสตร์ระดับประถม <span class="text-body-secondary"> .... </span></h2>
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
                                    <?php if($_SESSION['student_login']): ?>
                                        <?php  
                                            $courseId = $course['course_id']; 
                                            
                                        ?>
                                        <form action="./enroll/enroll.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="submit_enroll" value="<?php echo $courseId?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Enroll ee</button>
            
                                        </form>
                                    <?php else : ?>
                                        <form action="./view_index.php" method="post" enctype="multipart/form-data">
                                            <?php 
                                                $courseId = $course['course_id']; 
                                                $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                                $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                            ?>
                                            <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                            <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        </form>
                                    <?php endif; ?>
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
        <!-- END วิชาวิทยาศาสตร์  -->
        <hr class="#">
         <!-- วิชาวิทยาศาสตร์ มัธยมต้น -->
         <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'SC2%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
            <h2 class="featurette-heading fw-normal lh-1" id="SC2">วิชาวิทยาศาสตร์ระดับมัธยมต้น<span class="text-body-secondary"> .... </span></h2>
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
                                    <?php if($_SESSION['student_login']): ?>
                                        <?php  
                                            $courseId = $course['course_id']; 
                                            
                                        ?>
                                        <form action="./enroll/enroll.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="submit_enroll" value="<?php echo $courseId?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Enroll ee</button>
            
                                        </form>
                                    <?php else : ?>
                                        <form action="./view_index.php" method="post" enctype="multipart/form-data">
                                            <?php 
                                                $courseId = $course['course_id']; 
                                                $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                                $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                            ?>
                                            <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                            <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        </form>
                                    <?php endif; ?>
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
        <!-- END วิชาวิทยาศาสตร์  -->
        <hr class="#">
         <!-- วิชาฟิสิกส์ -->
         <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'SC31%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
            <h2 class="featurette-heading fw-normal lh-1" id="SC3">วิชาฟิสิกส์<span class="text-body-secondary"> .... </span></h2>
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
                                    <?php if($_SESSION['student_login']): ?>
                                        <?php  
                                            $courseId = $course['course_id']; 
                                            
                                        ?>
                                        <form action="./enroll/enroll.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="submit_enroll" value="<?php echo $courseId?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Enroll ee</button>
            
                                        </form>
                                    <?php else : ?>
                                        <form action="./view_index.php" method="post" enctype="multipart/form-data">
                                            <?php 
                                                $courseId = $course['course_id']; 
                                                $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                                $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                            ?>
                                            <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                            <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        </form>
                                    <?php endif; ?>
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
        <!-- END วิชาPhysic  -->
        <hr class="#">
        <!-- วิชาเคมี-->
        <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'SC32%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
            <h2 class="featurette-heading fw-normal lh-1" id="SC4">วิชาเคมี<span class="text-body-secondary"> .... </span></h2>
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
                                    <?php if($_SESSION['student_login']): ?>
                                        <?php  
                                            $courseId = $course['course_id']; 
                                            
                                        ?>
                                        <form action="./enroll/enroll.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="submit_enroll" value="<?php echo $courseId?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Enroll ee</button>
            
                                        </form>
                                    <?php else : ?>
                                        <form action="./view_index.php" method="post" enctype="multipart/form-data">
                                            <?php 
                                                $courseId = $course['course_id']; 
                                                $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                                $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                            ?>
                                            <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                            <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        </form>
                                    <?php endif; ?>
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
        <!-- END วิชาเคมี  -->
         <!-- วิชาชีวะ -->
         <?php  
            $stmt = $conn->prepare("SELECT * FROM Courses WHERE category LIKE 'SC33%' ORDER BY updated_at DESC ");
            $stmt->execute();
            $rowCount = $stmt->rowCount();
        ?>
        <?php if($rowCount > 0 ): ?>
   
        <div class="album py-5 bg-body-tertiary">
            <h2 class="featurette-heading fw-normal lh-1" id="SC5">วิชาชีวะ<span class="text-body-secondary"> .... </span></h2>
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
                                    <?php if($_SESSION['student_login']): ?>
                                        <?php  
                                            $courseId = $course['course_id']; 
                                            
                                        ?>
                                        <form action="./enroll/enroll.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="submit_enroll" value="<?php echo $courseId?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Enroll ee</button>
            
                                        </form>
                                    <?php else : ?>
                                        <form action="./view_index.php" method="post" enctype="multipart/form-data">
                                            <?php 
                                                $courseId = $course['course_id']; 
                                                $editUrl = "./lesson.php?course_id=" . $courseId . "1234";
                                                $editUrl2 = "./view_index.php?inst_id=" . $course['inst_id'] . "1234";
                                            ?>
                                            <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >course</a>
                                            <a href="<?php echo $editUrl2 ?>" class="btn btn-sm btn-outline-secondary" name="edit" >tutor</a>
                                        </form>
                                    <?php endif; ?>
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
        <!-- END วิชาbio  -->



    </div>
</div>
    
        
        
        
    
    <div class="my-4"></div>  
    <?php  include_once './footer.php'?>
</body>
</html>