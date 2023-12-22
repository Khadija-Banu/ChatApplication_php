<!DOCTYPE html>

<?php
session_start();

include("find_friends_function.php");

if(!isset($_SESSION['user_email'])){
    header("Location: signin.php");
}else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Friends</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/find_people.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   

</head>
<body>
   <?php include('header.php') ?>

    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form action="" class="search_form">
                <input type="text" name="search_query" placeholder="Search Friends" autocomplete="off" required>
                <button class="btn " type="submit" name="search_btn">Search</button>
            </form>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
<br><br>

    <?php search_user(); ?>
</body>
</html>
<?php } ?>