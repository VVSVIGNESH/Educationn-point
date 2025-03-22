<?php
ob_start();
include("database.php");
include("navigation_1.php");
include("footer.php");

$message = ""; // Variable to store the message

if(isset($_POST["send"])){
    include("mail.php");
    $email = $_POST['email'];
    $restoken=md5(rand());

    $sqa = "SELECT * FROM students WHERE email='$email'";
    $sqz= "SELECT full_name FROM students WHERE email='$email'";
    $full=mysqli_query($con,$sqz);
    $row_1=mysqli_fetch_assoc($full);
    $execute = mysqli_query($con, $sqa);
    $row = mysqli_fetch_assoc($execute);
    $full_1=$row["full_name"];

    if ($row) {
        $mail->Subject = 'reset code';
        $mail->Body = "Hello " . $full_1 . ", your reset code is " . $restoken;
        $mail->send();

        $sql = "UPDATE students SET restoken='$restoken' WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        header("location:respassword.php");

    } 
    else {
        $message = "Email not found in the database"; // Set the message
    }
}

ob_end_flush();
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .message-container {
            text-align: center;
            margin:3% auto;
            max-width: 400px;
            padding: 10px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            transition: width 1s, height 1s;
        }
        


        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
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
    </style>
</head>
<body>
    <div class="message-container">
        <?php 
        if(isset($_POST["send"])){
         echo "$message";  
        }
        ?>
    </div>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Forgot Password</h2>
        Email:
        <input type="text" name="email" placeholder="Enter the email">
        <input type="submit" name="send" value="Send">
    </form>
</body>
</html>
