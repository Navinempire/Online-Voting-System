<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$role = $_POST['role'];
$image = $_FILES['name']['photo'];
$tmp_name = $_FILES['tmp_name']['photo'];


if($password==$cpassword){
    move_uploaded_file($tmp_name,"../uploads/$image");
    $insert = mysqli_query($connect,"INSERT INTO user(name,mobile,address,password,photo,role,status,votes) VALUES ('$name','$mobile','$address','$password','$photo','$role',0,0)") ;
    if($insert){
        echo '
        <script>
        alert("Registration Successfully");
        Window.location = "../";
        </script>';
    }
    else{
        echo '
        <script>
        alert("Some Error Occured!");
        Window.location = "../routes/register.html";
        </script>
        ';
    }
}
else{
    echo '
    <script>
        alert("Password and Confirm Password does not match");
        Window.location = "../routes/register.html";
    </script>
    ';
}

?>