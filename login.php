<?php
session_start();
include("connection.php");
include("functions.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
       $user_name= $_POST['user_name'];
       $pass=$_POST['password'];
       if(!empty($user_name) and !empty($pass) and !is_numeric($user_name)){
           
            $query="select * from users where user_name='$user_name' limit 1";
            $result=mysqli_query($con,$query);
            
            if($result){
                
                if($result and mysqli_num_rows($result)>0){
                    $user_data=mysqli_fetch_assoc($result);
                    if($user_data['password']===$pass){
                        $_SESSION['user_id']=$user_data['user_id'];
                        header("Location:index.php");
                        die;
                    }
                   
                }
            }
            echo "Please enter valid information";
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
    <title>Login</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <div>Login</div>
            <input type="text" name="user_name" id=""> <br> <br>
            <input type="password" name="password" id=""> <br> <br>
            <input type="submit" value="Login"> <br> <br>
            <a href="sign.php">SignUp</a>
        </form>
    </div>
</body>
</html>