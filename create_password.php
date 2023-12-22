
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
                <h3>Create New Password</h3>
            </div>
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">                               
            <div class="mb-3">
                    <label class="form-label">Enter Password </label>
                    <input type="password" name="pass1" class="form-control" placeholder="Enter password" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm password </label>
                    <input type="password" name="pass2" class="form-control" placeholder="Confirm password" autocomplete="off" required>
                </div>
  
                <button type="submit" class="btn btn-primary w-100 mb-3" name="change">Change</button>

            </div>
        </div>
    </div>

    <?php 
        session_start();
        include("include/connection.php");
        if(isset($_POST['change'])){
            $user =$_SESSION['user_email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

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
            if($pass1 == $pass2){
                $update_pass = mysqli_query($con, "update users set user_pass='$pass1' where user_email='$user'");
                session_destroy();

                echo "<script>alert('Go ahead and signin.')</script>";
                echo"<script>window.open('signin.php','_self')</script>";
            }
        }
        ?>
  </body>
</html>