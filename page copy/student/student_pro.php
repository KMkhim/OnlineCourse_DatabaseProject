<?php 

session_start();
include_once '../../config/db.php';
if(!isset($_SESSION["student_login"])){
    $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
    header("location: ../regis/signin.php");
}



if (isset($_POST['submit_fname'])){
    $fname = $_POST['fname'];
    echo $fname;
    $stu_id = $_POST['submit_fname'];


    $sql = "UPDATE Users
            SET fname = '$fname'
            WHERE user_id IN (SELECT user_id FROM STUDENT WHERE stu_id =  $stu_id)
            ";
    $insert = $conn->query($sql);
    echo "khim";
    if ($insert) {
        $_SESSION['statusMsg'] = "The fname <b>" . $fname .  "</b> has been updated successfully.";
        header("location: ../../page/student.php");
    } else {
        $_SESSION['statusMsg'] = "Cannot updated, please try again.";
        header("location: ./student_pro_index.php");
    }
}

if (isset($_POST['submit_lname'])){
    $lname = $_POST['lname'];
    echo $lname;
    $stu_id = $_POST['submit_lname'];


    $sql = "UPDATE Users
            SET lname = '$lname'
            WHERE user_id IN (SELECT user_id FROM STUDENT WHERE stu_id =  $stu_id)
            ";
    $insert = $conn->query($sql);
    echo "khim";
    if ($insert) {
        $_SESSION['statusMsg'] = "The lname <b>" . $lname .  "</b> has been updated successfully.";
        header("location: ../../page/student.php");
    } else {
        $_SESSION['statusMsg'] = "Cannot updated, please try again.";
        header("location: ./student_pro_index.php");
    }
}

$targetDir = 'stu_pic/';

if (isset($_POST['submit_profile'])) {

    $stu_id = $_POST['submit_profile'];
    echo "khim" . $stu_id;

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        echo $targetFilePath;


        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (in_array($fileType, $allowTypes)) {
            if ((move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) ) {
                
                $sql = "UPDATE STUDENT
                        SET filename = '$fileName' 
                        WHERE stu_id = $stu_id
                        ";
                
                $insert = $conn->query($sql);
                
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName .  "</b> has been uploaded successfully.";
                    header("location: ../../page/student.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: ./student_pro_index.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: ./student_pro_index.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: ./student_pro_index.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: ./student_pro_index.php");
    }
}
