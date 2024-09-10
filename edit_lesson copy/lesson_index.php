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
  <?php 
  
    $length = strlen($text);
    $courseId = substr($_GET['course_id'],0,$length-4);
    echo $courseId;
    
    $sql = "SELECT * FROM Courses WHERE  course_id = $courseId  ORDER BY updated_at DESC
            ";
         
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);    
    //$rowCount = $stmt->rowCount();
  ?>
   

    <nav class="p-3 bg-dark text-white">
        <div class="container">
        
            <div class="d-flex flex-wrap align-items-center justify-content-end">
                <div class="text-end">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../page/instructor.php" class="nav-link px-2 text-white">Profile</a></li>
                    <li><a href="../regis/logout.php" class="nav-link px-2 text-white">Log Out</a></li>
                </ul>
                    <!-- <a href="#" class="nav-link">Home</a>
                    <button type="button" class="btn btn-warning">Log-out</button> -->
                </div>
            </div>
        </div>
    </nav>
    


  

<main class = 'container'>
  <h1 class="visually-hidden">Course name</h1>

  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold"><?php echo $row['title']?></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"> <?php echo $row['description']?> </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <?php 
          $editUrl = "./add_lesson_index.php?course_id=" . $courseId . "1234"; 
          
        ?> 
        <a href="<?php echo $editUrl ?>"class="btn btn-primary btn-lg px-4 gap-3" name="edit" >Add Lesson</a>
        <!-- <a href="<?php echo $editUrl_1 ?>"class="btn btn-outline-secondary btn-lg px-4" name="edit" >Edit Lesson</a> -->
       
      </div>
    </div>
  </div>

  <?php 
  
    
    $sql_1 = "SELECT * FROM Lessons WHERE  course_id = $courseId  ORDER BY updated_at 
            ";  
          
    $stmt_1 = $conn->query($sql_1); 
     
    $rowCount = $stmt_1->rowCount();
  ?>
   
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Lesson</h6>
    <?php  if($rowCount > 0): ?>
    <div class="d-flex text-muted pt-3">
    
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <?php while($lesson = $stmt_1->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"><?php echo $lesson['lesson_name'] ?></strong>
          <div>
          <a href="<?php echo $lesson['video_url'] ?>">Video</a>
          <?php $editUrl_1 = "./edit_lesson_index.php?lesson_id=" . $lesson['lesson_id'] . "1234"; ?>
          <p>  </p>
          <a href="<?php echo $editUrl_1 ?>">Edit</a>
          </div>
        </div>
        <p class="d-block"><?php echo $lesson['content'] ?></p>
        <hr>
        <?php endwhile; ?> 
        
      </div>
      
     
    
    </div>
    <?php endif; ?> 
    
  </div>
  

  
</main>
</body>
</html>