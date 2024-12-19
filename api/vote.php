<?php
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid =$_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect,"UPDATE user SET votes='$total_votes'WHERE id='$gid' ");
$update_votes_status = mysqli_query($connect,"UPDATE user SET status=1 WHERE id='$uid' ");

if($update_votes and $update_votes_status){
    $groups = mysqli_query($connect,"SELECT * FROM user WHERE role=2");
    $_SESSION['userdata']['status']=1;
    $_SESSION['groupsdata']=$groupsdata;
    echo'
    <scropt>
    alert("voting successfull");
    window.location = "../routes/deshboard.php";
    </script>
    ';
}
else{
    echo'
    <scropt>
    alert("Some error occured");
    window.location = "../routes/deshboard.php";
    </script>
    ';
}
?>