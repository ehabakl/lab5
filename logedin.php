<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type='button']{
            color: white ;
            background-color: red;
            font-weight: 500px ;
            width:200px;
            height:50px;
            font-size:15px;
            
        }
    </style>
</head>
<body align="center">
<?php
    session_start();
    if (isset($_SESSION['Username'])) {
        $userx = $_SESSION['Username'];
        echo "<h4>Hi $userx Welcome to our Site</h4>"."<br>";}
        ?>
    <!-- <img src="./indexpage.jpg"  height="500px"><br> -->
    <a href='./logout.php'><input type="button" name="exit" value="Sign Out Of Your Account"></a>
   
    

</body>
</html>