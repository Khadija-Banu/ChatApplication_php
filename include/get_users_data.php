<?php
  include 'connection.php';
// $con = mysqli_connect("localhost","root","","phpchatapp");

    $user = "select * from users";

    $run_user = mysqli_query($con, $user);
    $users=mysqli_fetch_array($run_user);

    while($row_user=mysqli_fetch_array($run_user)){
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_profile = $row_user['user_profile'];
        $login = $row_user['log_in'];

        echo "
        <li>
            <div class='chat-left-img'>
                <img src='$user_profile'>
            </div>
            <div class='chat-left-details'>
                <p><a style='text-decoration:none' href='home.php?user_name=$user_name'>$user_name</a></p>";
    if ($login == 'Online') {
        echo "<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
    } else {
        echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
    }
    echo "
            </div>
        </li>
    ";
    
       
    }
?>
