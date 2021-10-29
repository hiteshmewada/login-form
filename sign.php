<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
           $user_name= $_POST['user_name'];
           $pass=$_POST['password'];
           if(!empty($user_name) and !empty($pass) and !is_numeric($user_name)){
               $user_id=random_num(20);
                $query="insert into users(user_id,user_name,password) values('$user_id','$user_name','$pass')";
                mysqli_query($con,$query);
                header("Location:login.php");
                die;
           }
           else{
               echo "Please enter valid information";
           }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <div>Sign Up</div>
            <input type="text" name="user_name" id=""> <br> <br>
            <input type="password" name="password" id=""> <br> <br>
            <input type="submit" value="SignUp"> <br> <br>
            <a href="login.php">Login</a>
        </form>
    </div>
</body>
</html>