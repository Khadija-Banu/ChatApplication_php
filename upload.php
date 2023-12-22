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
    <title>Change Profile Picture</title>

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
    .card{
        box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin:auto;
        text-align:center;
        font-family:arial;
    }
    .card img{
        height:200px;
    }
    .title{
        color:grey;
        font-size:18px;
    }
    button{
        border:none;
        outline: 0;
        display:inline-block;
        padding: 9px;
        color:white;
        background-color: #000;
        text-align:center;
        cursor:pointer;
        width:100%;
        font-size:18px;
    }
    #update_profile{
        position:absolute;
        cursor:pointer;
        padding: 10px;
        border-radius:4px;
        color:white;
        background-color:#000;
    }
    label{
        padding:7px;
        display:table;
        color:#fff;
    }
    input[type='file']{
        display:none;
    }
</style>
<body>
<?php include('include/header.php') ?>
    <?php
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con ,$get_user);
    $row = mysqli_fetch_array($run_user);

    $user_name = $row['user_name'];
    $user_profile = $row['user_profile'];

    echo "
        <div class='card'>
        <img src='$user_profile'>
        <h1>$user_name</h1>
        <form method='post' enctype='multipart/form-data'>
           <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i> Select Profile
           <input type='file' name='u_image' size='60'>
           </label>
           <button id='button_profile' name='update'>&nbsp &nbsp<i class='fa fa-heart' aria-hidden='true'></i> Update Profile</button>
        </div><br><br>  
    ";

    if(isset($_POST['update'])){
        $u_image = $_FILES['u_image']['name'];
        $image_tmp = $_FILES['u_image']['tmp_name'];
        $random_number = rand(1,100);

        if($u_image==''){
            echo"<script>alert('Please select profile','_self')</script>";
            exit();
        }else{
            move_uploaded_file($image_tmp, "images/$u_image.$random_number");

            $update = "update users set user_profile='images/$u_image.$random_number' where user_email='$user'";

            $run = mysqli_query($con, $update);

            if($run){
                echo"<script>alert('Your profile updated')</script>";
                echo"<script>window.open('upload.php','_self')</script>";
            }
        }
    }
    ?>
    
</body>
</html>

<?php } ?>