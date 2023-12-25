

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
                <h3>Forgot Password</h3>
            </div>
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">                               
                <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"   required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bestfriend Name</label>
                    <input type="text" name="bf" class="form-control" placeholder="Someone......." required><i class="fas fa-eye" style="position:absolute; right:25px; top:54%; "></i>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 mb-3" name="submit">Submit</button>

                <?php include("signin_user.php"); ?>
                </form>

                <div class="text-center small">Back to signin? <a href="signin.php" style="text-decoration: none;">Click here</a></div>
            </div>
        </div>
    </div>

    <?php
        // session_start();
        include("include/connection.php");
            if(isset($_POST['submit'])){
                $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
                $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));

                $select_user = "select * from users where user_email='$email' AND forgotten_answer='$recovery_account'";

                $query = mysqli_query($con, $select_user);
                $check_user = mysqli_num_rows($query);

                if($check_user==1){
                    $_SESSION['user_email']=$email;

                    echo"<script>window.open('create_password.php','_self')</script>";
                }else{
                    echo "<script>alert('Your email or bestfriend name is incorrect.')</script>";
                    echo"<script>window.open('forgot_pass.php','_self')</script>";
                }
                }    
    ?>
  </body>
</html>