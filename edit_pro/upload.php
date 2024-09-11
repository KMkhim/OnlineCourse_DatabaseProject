<?php 

session_start();
include_once '../config/db.php';

if(isset($_SESSION["instructor_login"])){
    $instructure_id = $_SESSION["instructor_login"];
    $stmt = $conn->query("SELECT * FROM Users WHERE user_id = $instructure_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);    
}

$user_id = $row['user_id'];
//echo $user_id;

// echo '<pre>';
// $_FILES["file"]["name"];

// echo '</pre>';


$targetDir = 'uploads/';
// $fileImage = $targetDir . basename($_FILES["file"]["name"]);

if (isset($_POST['submit'])) {

    $tutorname = $_POST['tutorname'];
    $description = $_POST['description'];

    //echo $description;
    

    if (!empty($_FILES["file"]["name"]) &&  !empty($_FILES["file2"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $fileName2 = basename($_FILES["file2"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $targetFilePath2 = $targetDir . $fileName2;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);


        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes) && in_array($fileType2, $allowTypes)) {
            if ((move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) && (move_uploaded_file($_FILES['file2']['tmp_name'], $targetFilePath2))) {
                //echo $user_id;
                $sql = "INSERT INTO INSTRUCTOR(user_id,tutorname,description,file_name , file_name2 , uploaded_on)
                        VALUES ('$user_id','$tutorname','$description','".$fileName."', '".$fileName2."' , NOW())";
                
                //echo "khim ...... ";

                $conn->query($sql);

                echo "Insert data successfully";

                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName .  "</b> has been uploaded successfully.";
                    header("location: ./pic_index.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: ./pic_index.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: ./pic_index.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: ./pic_index.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: ./pic_index.php");
    }
}


// if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileImage)){
//     echo "success" . basename($_FILES["file"]["name"]) ."was uploaded";
// }else{
//     echo "sth wrong";
// }



    
// }

?>

