<?php 

session_start();
include_once '../../config/db.php';
if(!isset($_SESSION["student_login"])){
    $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
    header("location: ../../regis/signin.php");
}


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
    $stu_id = $row_student['stu_id'];
   
}



if (isset($_POST['submit_enroll'])){
    
    $course_id = $_POST['submit_enroll'];
    
    echo $stu_id;

    
    $stmt_4 = $conn->prepare("SELECT * FROM Enrollment WHERE stu_id = $stu_id ");
    $stmt_4 ->execute();
    $rowCount = $stmt_4->rowCount();
    $row = $stmt_4->fetch(PDO::FETCH_ASSOC);
    echo $rowCount;

    
        
   

    if($rowCount > 0 && $row["payment_status"] == 0){
        $_SESSION['statusMsg'] = "Sorry ลงทะเบียนมากสุด 1 คอร์ส.";
        header("location: ./enrollment_index.php");
    }else{
        $sql = "INSERT INTO Enrollment(stu_id,course_id)
                    VALUES($stu_id , $course_id)";
            
        $insert =$conn->query($sql);
        

        if ($insert) {
            $_SESSION['statusMsg'] = "The enroll <b>" . "</b> has been updated successfully.";
            header("location: ./enrollment_index.php");
        } else {
            $_SESSION['statusMsg'] = "Cannot updated, please try again.";
            header("location: ./enrollment_index.php");
        }
    
    
    
    }

   
   
}

if (isset($_POST['submit_delete'])){
    $course_id = $_POST['submit_delete'];
    echo "khim";
    $sql_2  = "DELETE FROM `Enrollment`
                     WHERE `course_id` = $course_id";
                                       
    
    
    $insert =$conn->query($sql_2);

    
   

    if ($insert) {
        $_SESSION['statusMsg'] = "Course <b> has been delete .";
        header("location: ./enrollment_index.php");
    } else {
        $_SESSION['statusMsg'] = "Cannot delete, please try again.";
        header("location: ./enrollment_index.php");
    }
    
}