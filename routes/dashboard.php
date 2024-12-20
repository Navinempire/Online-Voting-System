<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
}

$userdata = $_SESSION['userdata'] ;
$groupsdata = $_SESSION['groupsdata'] ;

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red">Not Voted</b>';
    
}
else{
    $status = '<b style="color:red">Voted</b>';
}
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
        margin: 10px;
    }
    #logoutbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        float: right;
        margin: 10px;
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
    #votebtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
    }
    #mainSection{
        padding: 10px;
    }

    #voted{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
    }
    

</style>
<body>
<div id="mainSection">
    <center>
    <div id="headerSection">
        <a href="../"><button id="backbtn">Back</button></a>
        <a href="logout.php"><button id="logoutbtn">logout</button>
        <h1>Online Voting System</h1>
    </div>
    </center>
    <hr>
    <div id="mainSection">
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
                    <img style="float: right"src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="=100" width="100">
                    <b>Group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                    <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>
                    <form action="../api/vote.php" method="post">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                        <?php
                        if($_SESSION['userdata']['status']==0){
                            ?>
                            <input type="submit" name="votebtn" value="vote" id="votebtn">
                            <?php
                        }
                        else{
                        ?>
                        <button type="button"name="votebtn" value="vote" id="voted">voted</button>
                        <?php
                        }
                    ?>
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
</div>
    
</body>
</html>