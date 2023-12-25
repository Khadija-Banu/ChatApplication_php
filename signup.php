<?php

// include "connect.php";

//     if(isset($_POST['submit'])){
//       $name=$_POST['user_name'];
//       $email=$_POST['user_email'];
//       $password=$_POST['user_password'];
//       $filename= $_FILES['user_image']['name'];
//       $tmploc= $_FILES['user_image']['tmp_name'];
//       $filetype= $_FILES['user_image']['type'];
//       $filesize= $_FILES['user_image']['size'];

//       $uploc="images/".$filename;

//         if($filesize <200000){
//             if(file_exists($uploc)){
//                 echo "File already exists";
//             }else{
//                 if(move_uploaded_file($tmploc,$uploc)){
//                $sql="INSERT INTO users (user_name,user_email,user_password,user_image,status) VALUES ('$name','$email','$password','$filename','offline')";

//                $statement=$pdo->prepare($sql);
//                $statement->execute();

 
//                header('location:login.php');
//                 }else{
//                     echo "not uploaded";
//                 }
//             }
           
//         }else{
//             echo "Size must be less then 200000";
//         }

//         if($statement){
 
//             session_start();
//             $_SESSION['user_name']=$name;
//             $_SESSION['user_image']=$filename;
//             $_SESSION['status']=$status;
//             header('Location:users.php');
//           }
   
      
//     }
    ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realtime Chat application | Rk's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body >
    <div class="container mt-2  ">
        <div class="card w-75 " style="margin-left:12%; ">
            <div class="card-header">
                <h4>Sign up</h4>
                <small>Fill out this form and start chatting with your friends</small>
            </div>
            <div class="error_text"></div>
            <div class="card-body">
            <form method="post" enctype="multipart/form-data"> 
            <div class="mb-2">
                    <label>Enter your name</label>
                    <input type="text" name="user_name" class="form-control" id="user_name"  required>
                </div>                               
                <div class="mb-2">
                    <label>Enter your email</label>
                    <input type="email" name="user_email" class="form-control" id="user_email" data-parsley-pattern="email" required>
                </div>
                <div class="mb-2">
                    <label>Country</label>
                    <select name="user_country" class="form-control" required>
                        <option disabled="">Select a country</option>
                        <option>Bangladesh</option>
                        <option>US</option>
                        <option>UK</option>
                        <option>India</option>
                        <option>Pakistan</option>               
                    </select>
                </div>
                <div class="mb-2">
                    <label>Gender</label>
                    <select name="user_gender" class="form-control small" required>
                        <option disabled="">Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>                           
                    </select>
                </div>
                <div class="mb-2">
                    <label class="checkbox-inline small"><input type="checkbox" required> I accept the <a href="#">Terms and use </a>&amp; <a href="#">Privacy and Policy</a></label>
                </div>
                <div class="mb-2 icon">
                    <label class="form-label">Enter your password</label>
                    <input type="password" name="user_pass" class="form-control" id="user_password"  required>
                    <i class="fas fa-eye" style="position:absolute; right:25px; top:68%; "></i>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label">Enter your picture</label>
                    <input type="file" name="user_image" class="form-control" id="user_password" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                </div > -->
                <button type="submit" name="sign_up" class="btn btn-primary w-100">Sign up</button>
                
                <?php include("signup_user.php"); ?>
                </form>

                <div class=" mt-3 text-center fw-medium">Already signed up? <a href="signin.php" style="text-decoration: none;">Login now</a></div>
            </div>
        </div>
    </div>

    <script src="js/pass_show_hide.js"></script>
  </body>
</html>