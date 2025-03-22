
    <?php
    ob_start();
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
            /*mobile*/
            font-family: Arial, sans-serif;
            background-image:url("https://images.pexels.com/photos/2067569/pexels-photo-2067569.jpeg?auto=compress&cs=tinysrgb&w=600");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:100% 100%;
            margin: 0;
            padding: 0;
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
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: #4caf50;
        }
        a:hover {
            color: #45a049;
        }
        /*tab*/
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
        /*laptop*/
        @media (min-width:1300px) {
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
    
     
    if(isset($_POST["login"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        $result=mysqli_query($con,"SELECT * FROM students WHERE email='$email'");
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if (isValidEmail($email)) {
                    if(password_verify($password,$row["password"])){
                        header("location:start.php");
                        ob_end_flush();
                    }
                    else{
                    echo"wrong password ";
                    }
                }else{
                    echo "invalid email";
                }
                }
                else{
                    echo"user not registerd";
                }
            }
    mysqli_close($con);
    ?>
    </div>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2>Login Page</h2>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="login" value="Login"><br>
        <a href="resetpass.php">forgotpassword?</a>
        Don't have a account? <a href="registration.php">Register</a> 
    </form>
</body>
</html>


    