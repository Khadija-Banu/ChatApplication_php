<?php
include 'connect.php';

session_start();

if (!isset($_SESSION["user_name"])) {

    header('Location:login.php');
    exit();
}
$filename = $_SESSION['user_image'];

$sql="select * from users";
$statement=$pdo->query($sql);
$users=$statement->fetchAll(PDO::FETCH_ASSOC);

    
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
    <div class="container mt-5  ">
        <div class="card w-50 " style="margin-left:25%; ">
            <div class="card-header d-flex justify-content-between">
                <img style="width:50px; height:50px; border-radius:25px" src="<?php echo "images/$filename"; ?>" alt="" srcset="">
                <div><h6><?php echo $_SESSION["user_name"]; ?></h6><p><?php echo $_SESSION["status"]; ?> </p></div>
                <input  style="width:280px; border-radius:30px; height:50px; padding:10px" type="search" placeholder="Enter your .............">
                <a href="logout.php"><i class="fa fa-sign-out mt-3"></i></a>                
            </div>

            <div class="ms-4 ">
            <?php  foreach($users as $user):?>
                <div class="d-flex mt-2"><img style="width:50px; height:50px; border-radius:25px" src="<?= $user['filename'] ?>" alt="" srcset="">
              
                <div class="ms-3"><h6><?= $user['user_name'] ?></h6><p><?= $user['status'] ?> </p></div>
              </div>

            <?php endforeach; ?>
            </div>

        </div>
    </div>

  </body>
</html>