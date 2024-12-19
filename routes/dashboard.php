<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['userdata'])){
    header("location: ../");
}
$userdata = $_SESSION['userdata'] ;
$groupsdata = $_SESSION['groupsdata'] ;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online voting System Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
    #backbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        float: left;
    }
    #logoutbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        float: right;
    }
    #Profile{
        background-color: white;
        width: 30%;
        padding: 20px;
        float: left;
    }
    #Group{
        background-color: white;
        width: 60%;
        padding: 20px;
        float: left;
    }

</style>
<body>
<div id="mainSection">
    <center>
    <div id="headerSection">
        <button id="backbtn">Back</button>
        <button id="logoutbtn">LogOut</button>
        <h1>Online Voting System</h1>
    </div>
    </center>
    <hr>
    <div id="Profile">
        <center><img src="../uploads/ <?php echo $userdata['photo'] ?>" height="100" width="100"></center><br><br>
        <b>Name</b><?php echo $userdata['name']?><br><br>
        <b>Mobile</b><?php echo $userdata['mobile']?><br><br>
        <b>Address</b><?php echo $userdata['address']?><br><br>
        <b>Status</b><?php echo $userdata['status']?><br><br>
    </div>
    <div id="Group">
        <?php
        if(isset($_SESSION['groupdata'])){
            for($i=0; $i<count($groupsdata);$i++){
                ?>
                <div>
                    <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="=100" width="100">
                    <b>Group Name:<?php echo $groupsdata[$i]['name']?></b><br>
                    <b>Votes:<?php echo $groupsdata[$i]['votes']?></b><br>
                    <form action="#">
                        <input type="hidden" name="gvotes" value="">
                        <input type="submit" name="votebtn" value="vote" id="votebtn">
                    </form>
                </div>
                <?php
            }
        }
        else{
        }
        ?>
    </div>
</div>
    
</body>
</html>