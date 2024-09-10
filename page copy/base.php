<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>


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
            
                    <a class="nav-link" href="../regis/signin.php">ล็อคอิน</a>
                    <a class="nav-link" href="../regis/index.php">ลงทะเบียน</a>
                    
                    <!-- <a class="nav-link disabled" aria-disabled="true">Disabled</a>  -->
                </div>
                <a class="navbar-brand " href="#">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSN5kyGXRsJTnCvfM371Ycg8u7k9viw1gW-g&s" alt="Bootstrap" width="50" height="50" class="rounded float-end">
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
        <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color : aliceblue;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ประถม</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./S_math.php">คณิตศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_sci.php">วิทยาศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_thai.php">ภาษาไทย</a></li>
                    <li><a class="dropdown-item" href="./S_social.php">สังคมและประวัติศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_english.php">ภาษาอังกฤษ</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="./S_exam.php">สอบเข้า ม.ต้น</a></li>
                </ul>
        </li>
       -->
        <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color : aliceblue;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ม.ต้น</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./S_math.php">คณิตศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_sci.php">วิทยาศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_thai.php">ภาษาไทย</a></li>
                    <li><a class="dropdown-item" href="./S_social.php">สังคมและประวัติศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_english.php">ภาษาอังกฤษ</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="./S_exam.php">สอบเข้า ม.ปลาย</a></li>
                </ul>
        </li>
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color : aliceblue;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ม.ปลาย</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./S_math.php">คณิตศาสตร์หลัก</a></li>
                    <li><a class="dropdown-item" href="./S_math.php">คณิตศาสตร์เพิ่มเติม</a></li>
                    <li><a class="dropdown-item" href="./S_sci.php">ฟิสิกส์</a></li>
                    <li><a class="dropdown-item" href="./S_sci.php">เคมี</a></li>
                    <li><a class="dropdown-item" href="./S_sci.php">ชีวะ</a></li>
                    <li><a class="dropdown-item" href="./S_thai.php">ภาษาไทย</a></li>
                    <li><a class="dropdown-item" href="./S_social.php">สังคมและประวัติศาสตร์</a></li>
                    <li><a class="dropdown-item" href="./S_english.php">ภาษาอังกฤษ</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="./S_exam.php">สอบเข้า มหาวิทยาลัย</a></li>
                </ul>
        </li> -->
        <a class="nav-link" style="color : aliceblue;" href="#">Contract Us</a>
    </nav>
    

</body>


</html>