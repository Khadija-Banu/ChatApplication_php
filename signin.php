<?php

// include 'connect.php';

// if($_SERVER['REQUEST_METHOD']=='POST'){
//   $name=$_POST['user_name'];
//   $pass=$_POST['user_password'];

//   $sql="select * from users where user_name='$name' && user_password='$pass'";

//   $stmt=$pdo->query($sql);

//   if ($stmt->rowCount() > 0) {
//     $row = $stmt->fetch();

//     // Verify the password
//     if($pass == $row['user_password']) {
//       session_start();
//         $_SESSION['user_id'] = $row['user_id'];
//         $_SESSION['user_name'] = $row['user_name'];
//         $_SESSION['user_image'] = $row['user_image'];
//         $_SESSION['status'] = $row['status'];

//         header("Location: users.php"); // Redirect to the profile page
//         exit();
//     } else {
//         echo "Invalid password";
//     }
// } else {
//     echo "User not found";
// }

//   // if($user){ 
//   //   session_start();
//   //   $_SESSION['user_name']=$name;
//   //   $_SESSION['user_image']=$filename;
//   //   header('Location:users.php');
//   // }
// }
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
  <body class="bg-secondary">

    <div class="container mt-5  ">
        <div class="card w-50 " style="margin-left:25%; ">
            <div class="card-header">
                <h3>Realtime Chat App</h3>
            </div>
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">                               
                <div class="mb-3">
                    <label  class="form-label">Enter your email</label>
                    <input type="email" name="email" class="form-control"   required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter your password </label>
                    <input type="password" name="pass" class="form-control" id="user_password" data-parsley-minlength="6" data-parsley-maxlength="12" required><i class="fas fa-eye" style="position:absolute; right:25px; top:54%; "></i>
                </div>
                <div class="small mb-3">Forgot Password? <a href="forgot_pass.php">Click here</a></div>
  
                <button type="submit" class="btn btn-primary w-100 mb-3" name="sign_in">Continue to Chat</button>

                <?php include("signin_user.php"); ?>
                </form>

                <div class="  text-center small">Don't have an account? <a href="signup.php" style="text-decoration: none;">SignUp now</a></div>
            </div>
        </div>
    </div>
  </body>
</html>