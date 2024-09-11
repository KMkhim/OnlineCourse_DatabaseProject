<?php 

    session_start();
    include_once '../config/db.php';
?>

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

<div class="container marketing">
    <?php 
        
        $length = strlen($text);
        
        $inst_id = substr($_GET['inst_id'],0,$length-4); 
        $sql = "SELECT * FROM INSTRUCTOR I  WHERE $inst_id = inst_id ";
        //echo $inst_id;
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);    
        //$rowCount = $stmt->rowCount();
    ?>
 

    <div class="px-4 py-5 my-5 text-center">
        <img src="<?php echo '../edit_pro/uploads/'.$row['file_name'] ?>"  class="rounded-circle" alt="Cinque Terre" width="200" height="200">
        <br>
        <br>
        <h2 class="fw-normal">Tutor : <?php echo $row['tutorname'] ?></h2>
        <p> <?php echo $row['description'] ?></p>

    </div>

</div>
<?php 
    
    $stmt = $conn->prepare("SELECT * FROM Courses WHERE $inst_id = inst_id ORDER BY updated_at DESC ");
    $stmt->execute();
            //$row_2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rowCount = $stmt->rowCount();
            
?>

<?php if($rowCount > 0): ?>
   
        <div class="album py-5 bg-body-tertiary">
            
            <div class="container">
            <h2 class="fw-normal">วิชาที่เปิดสอน</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php while($course = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
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
                                        $editUrl = "../edit_course/edit_course_index.php?course_id=" . $courseId . "1234";
                                        $gotoViewPage = "../edit_lesson/lesson_index.php?course_id=" . $courseId . "1234";
                                        ?>
                                        <a href="<?php echo $editUrl ?>" class="btn btn-sm btn-outline-secondary" name="edit" >edit</a>
                                        <a href="<?php echo $gotoViewPage ?>" class="btn btn-sm btn-outline-secondary" name="edit" >add lesson</a>
                                        
                                    </form>
                                    </div>
                                    <small class="text-body-secondary"><?php echo $course['updated_at'] ?></small>
                                </div>
                            </div>
                        </div>
                     </div>
                <?php endwhile; ?>  
                </div> 
               
            </div> 
            
        </div>
   
<?php endif; ?>         

<footer><?php  include_once './footer.php'?></footer>
</body>
</html>