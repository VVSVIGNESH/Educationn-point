
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <title>Abhishek</title>
    </head>
    <body>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <input type="submit" name="login" value="login"><br>
<?php
include("database.php");
if(isset($_POST["login"])){
    $email=$_POST["email"];
    $sql="SELECT count(*) FROM students WHERE email='$email'";
    $execute=mysqli_query($con,$sql);
    echo "$execute";
    mysqli_close($con);
}
?>

    </body>
    </html>