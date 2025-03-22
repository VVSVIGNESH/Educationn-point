<?php
include("database.php");
include("navigation.php");
include("footer.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <title>Abhishek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url("https://images.pexels.com/photos/2067569/pexels-photo-2067569.jpeg?auto=compress&cs=tinysrgb&w=600");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:100% 100%;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        form {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: inline-block; /* Changed to inline-block */
            text-align: center;
            text-decoration: none;
            color: #4caf50;
        }
        a:hover {
            color: #45a049;
        }
        @media(min-width:762px){
            body {
            font-family: Arial, sans-serif;
            background-image:url("https://w.forfun.com/fetch/77/77b54e73aa6e6aee334586f0a86f7760.jpeg?h=900&r=0.5");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:100% 100%;
            margin: 0;
            padding: 0;
        }
    }
        @media(min-width:1300px) {
            body {
            font-family: Arial, sans-serif;
            background-image:url("https://images.unsplash.com/photo-1543248939-4296e1fea89b?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:100% 100%;
            margin: 0;
            padding: 0;
        }    
        }
    </style>
</head>
<body>
    <div>
    <?php
    function isValidEmail($email) {
        $allowedDomain = 'iiitt.ac.in';
    
        list($username, $domain) = explode('@', $email);
    
        if ($domain === $allowedDomain) {
            return true;
        } else {
            return false;
        }
    }

if(isset($_POST["register"])){
    $email=filter_input(INPUT_POST,"email",FILTER_DEFAULT);
    if (isValidEmail($email)) {
    $full_name=filter_input(INPUT_POST,"full_name",FILTER_SANITIZE_SPECIAL_CHARS);
    $password=filter_input(INPUT_POST,"password",FILTER_DEFAULT);
    $repeat_password=filter_input(INPUT_POST,"repeat_password",FILTER_DEFAULT);
    $errors=array();

        if(empty($full_name) OR empty($email) OR empty($password) OR empty($repeat_password)){
            array_push($errors,"requried feilds are missing");
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            array_push($errors,"email is not valid");
        }
        if(strlen($password)<8){
            array_push($errors,"password must contain minimum 8 values");
        }
        if($password!==$repeat_password){
            array_push($errors,"passwords doesn't match");
        }
        $duplicate=mysqli_query($con,"SELECT*FROM students WHERE email='$email'");
        if(mysqli_num_rows($duplicate)>0){
            echo"email is already registerd ";
        }
        echo"<br>";
        if(count($errors)>0){
            foreach($errors as $error){
                echo"$error <br>";
            }
        }else{
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO students(full_name,email,password)
                VALUES ('$full_name','$email','$hash')";
            mysqli_query($con,$sql);
            echo "u are registerd!";
        }
    }else{
        echo "invalid email forrmat";
    }
  mysqli_close($con);
 }

    
?>
    </div>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2>Welcome to Registration</h2>
        Full Name:<br>
        <input type="text" name="full_name"><br>
        Email:<br>
        <input type="text" name="email"><br>
        Password:<br>
        <input type="password" name="password"><br>
        Repeat Password:<br>
        <input type="password" name="repeat_password"><br>
        <input type="submit" name="register" value="Register"><br>
        Already Registered? <a href="login.php">Login</a> 
    </form>
</body>
</html>





