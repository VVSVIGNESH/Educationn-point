<?php
include("navigation.php");
include("footer.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <title>CONTACT US</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            margin-top: 50px;
        }
        .mail{
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .mail:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>For any kind of concerns or suggestions, please email us at the following address:</h2>
    <a  class="mail" href="mailto:211216@iiitt.ac.in">Send Email</a>
</body>
</html>
