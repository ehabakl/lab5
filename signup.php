
<?php

?>
<html>
   <head>
         <style>
            h3{font-size:25px}
            label{
    font-weight: 700;
}
input[type="text"],input[type="password"]{
    width: 250px;
    height: 30px;
    background-color:none;
}
a{
   color:blue;
   text-decoration: none;
}
input[type="submit"]{
   background-color:blue;
   color:white;
   border-radius: 5px;
   height:35px;
   cursor:pointer;
}
input[type="reset"]{
   height:35px;
   border-radius: 5px;
   cursor:pointer;
}
         </style>
   </head>  
   <body>
      <?php
      if (isset($_POST['submit'])){
         $userx=$_POST['Username'];
         $Password=$_POST['pass'];
         $confrim_pass=$_POST['confrim_pass'];
         $password_hash = password_hash($Password , PASSWORD_DEFAULT);
         
         if(empty($userx) or empty($Password) or empty($confrim_pass)  ){
            echo "All fields are required.'<br>'";
         }
         if(strlen($Password)<8){
            echo "<p style='color:red'>Password must be at least 8 digits or characters or mix</p>"."<br>";
         }
         if($Password != $confrim_pass ){
            echo "<p style='color:red'>Passwords not matched</p>";
         }
         else{
            require_once 'config.php';
            $sql= "INSERT INTO  users (Username,User_pass,confrim_pass) VALUES ('$userx','$Password','$confrim_pass')";
            if ($conn->query($sql) === TRUE) {
               echo "New record created successfully'<br>'";
             } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
             }
             
             $conn->close();

         }
      }
      ?>
      <h3>sign up</h3>
      <p>please fill in your credentials to sign up .</p>
      <form action = "signup.php" method = "POST">
         <label for="Username">Username</label><br>
          <input type = "text" name = "Username" /><br>
          <label for="Password">Password</label><br>
          <input type = "password" name = "pass" /><br>
          <br>
          <label for="Confrim Password">Confrim Password</label><br>
          <input type = "password" name = "confrim_pass" /><br>
          <br>
         <input type = "submit" name="submit" /> &nbsp; <input  type="reset" name="Reset"  value="Reset" >
         <p>Already have an Account !<a href='signin.php'> Login here</a></p>
      </form>
      
   </body>
</html>