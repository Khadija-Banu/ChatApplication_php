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
    <title>Change Password</title>

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

<style>
    body{
        overflow-x:hidden;
    }
 
</style>
<body>
<?php include('include/header.php') ?>

    <div class="row">
        <div class="col-sm-2">           
        </div>        
          
        <div class="col-xm-8">
            <form action="" method='post' enctype='multipart/form-data'>
                <table class="table table-bordered table-hover">
                    <tr text-align="center">
                        <td colspan="6" class="active"><h2>Change Password</h2></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Current Password</td>
                        <td><input type="password" id="mypass" name="current_pass" class="form-control" required placeholder="Current Password"/></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">New Password</td>
                        <td><input type="password" id="mypass" name="u_pass1" class="form-control" required placeholder="New Password"/></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Confirm Password</td>
                        <td><input type="password" id="mypass" name="u_pass2" class="form-control" required placeholder="Confirm Password"/></td>
                    </tr>
                    <tr text-align="center">
                        <td colspan="6">
                       <input type="submit" name="change" value="Change" class="btn btn-info"/>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['change'])){
                    $c_pass= $_POST['current_pass'];
                    $pass1 = $_POST['u_pass1'];
                    $pass2 = $_POST['u_pass2'];
                   
                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users where user_email='$user'";
                    $run_user = mysqli_query($con ,$get_user);
                    $row = mysqli_fetch_array($run_user);
    
                    $user_password = $row['user_pass'];

                    if($c_pass !== $user_password){
                        echo "
                            <div class='alert alert-danger'>
                                <strong> Your old password didn't match</strong>
                            </div>
                        ";
                    }
                    if($pass1 !== $pass2){
                        echo "
                            <div class='alert alert-danger'>
                                <strong> Your new password didn't match with confirm password</strong>
                            </div>
                        ";
                    }
                    if($pass1 <9 AND $pass2 <9){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Use 9 or more than 9 characters</strong>
                            </div>
                        ";
                    }
                    if($pass1 == $pass2 AND $c_pass == $user_password){
                        $update_pass = mysqli_query($con, "update users set user_pass='$pass1' where user_email='$user'");
                        echo"
                            <div class='alert alert-info'>
                                <strong> Your Password is Changed</strong>
                            </div>
                        ";
                    }
                
                }
            ?>
        </div>
        <div class="col-sm-2">

        </div>
    </div>

</body>
</html>

<?php } ?>