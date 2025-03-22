<?php
include("database.php");
include("navigation_1.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            max-width: 400px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            text-align: center;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h2>Password Reset</h2>
    Enter The Email:
    <input type="text" name="email" placeholder="Enter the email">
    Enter The Code:
    <input type="text" name="resetcode" placeholder="Enter the code">
    Enter The New Password:
    <input type="password" name="newpassword" placeholder="Enter the new password">
    <input type="submit" name="reset" value="Reset">
</form>
<div class="message">
    <?php
    if(isset($_POST["reset"])){
        $email=$_POST["email"];
        $resetcode=$_POST["resetcode"];
        $new_password=$_POST["newpassword"];
        $sql="SELECT * FROM students WHERE email='$email'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $password_1=password_hash($new_password,PASSWORD_DEFAULT);
        if($row["restoken"]==$resetcode){
            $sqy="UPDATE students SET password='$password_1' WHERE email='$email'";
            $success=mysqli_query($con,$sqy);
        }

    }
    ?>
</div>