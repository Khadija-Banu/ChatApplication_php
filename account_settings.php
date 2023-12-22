<!DOCTYPE html>
<html lang="en">
    <head>
<?php
session_start();

include("include/connection.php");

if(!isset($_SESSION['user_email'])){
    header("Location: signin.php");
}else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>
<?php include('include/header.php') ?>
    <div class="row">
        <div class="col-sm-2">

        </div>
        <?php
            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email='$user'";
            $run_user = mysqli_query($con ,$get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];
            $user_pass = $row['user_pass'];
            $user_email = $row['user_email'];
            $user_profile = $row['user_profile'];
            $user_country = $row['user_country'];
            $user_gender = $row['user_gender'];
        ?>

        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr text-align="center">
                        <td colspan="6" class="active"><h2>Change Account Settings</h2></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Change Your Username</td>
                        <td><input type="text" name="u_name" class="form-control" required value="<?php echo $user_name;?>"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="upload.php" class="btn btn-default" style="text-decoration:none; font-size:15px;"><i class="fa fa-user" aria-hidden="true"></i> change Profile</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Change Your Email</td>
                        <td><input type="email" name="u_email" class="form-control" required value="<?php echo $user_email;?>"/></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Country</td>
                        <td>
                        <select name="u_country" class="form-control" required>
                        <option><?= $user_country?></option>
                        <option>Bangladesh</option>
                        <option>US</option>
                        <option>UK</option>
                        <option>India</option>
                        <option>Pakistan</option>               
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Gender</td>
                        <td>
                        <select name="u_gender" class="form-control" required>
                        <option><?= $user_gender?></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>                   
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Forgotten password</td>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Forgotten Password</button>

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class=" modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
                                                <strong>What is your school best Friend Name?</strong>
                                                <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Someone"></textarea><br>
                                                <input type="submit" class="btn btn-default" name="sub" value="Submit" style="width:100px"><br><br>
                                                <pre>Answer the above question we will ask you this question if you are forgot your <br>Passwoed.</pre><br><br>
                                        </form>
                                        <?php
                                            if(isset($_POST['sub'])){
                                                $bfn = htmlentities($_POST['content']);

                                                if($bfn == ''){
                                                    echo "<script> alert('Please enter something.')</script>";

                                                    echo "<script>window.open('account_settings.php','_self')</script>";

                                                    exit();
                                                }
                                                else{
                                                    $update = "update users set forgotten_answer='$bfn' where user_email='$user'";

                                                    $run = mysqli_query($con, $update);

                                                    if($run){
                                                        echo "<script> alert('Working.')</script>";

                                                        echo "<script>window.open('account_settings.php','_self')</script>";
                                                    }
                                                    else{
                                                        echo "<script> alert('Error while updating Information.')</script>";

                                                        echo "<script>window.open('account_settings.php','_self')</script>";
                                                    }
                                                }
                                            }
                                        ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="change_password.php" class="btn btn-default" style="text-decoration:none; font-size:15px;"><i class="fa fa-key fa-fw" aria-hidden=true></i></a>Change Password</td>
                    </tr>

                    <tr text-align="center">
                        <td colspan="6">
                            <input type="submit" value="update" name="update" class="btn btn-info">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['update'])){
                    $user_name = htmlentities($_POST['u_name']);
                    $email = htmlentities($_POST['u_email']);
                    $u_country = htmlentities($_POST['u_country']);
                    $u_gender = htmlentities($_POST['u_gender']);

                    $update = "update users set user_name = '$user_name', user_email = '$email', user_country = '$u_country', user_gender = '$u_gender' where user_email= '$user'";

                    $run = mysqli_query($con, $update);

                    if($run){
                        echo "<script> window.open('account_settings.php','_self')</script>";
                    }
                }
            ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
    
</body>
</html>

<?php } ?>