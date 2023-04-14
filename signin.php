<html>
    <style>
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
    </style>
    <body>
        <?php
        session_start();
if (isset($_POST['login'])){
    $userx = $_POST['Username'];
    $Password = $_POST['pass'];
    require_once 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect form data
        $userx = real_escape_string($conn, $_POST['Username']);
        $password = real_escape_string($conn, $_POST['pass']);
    
        // Check if user exists in database
        $sql = "SELECT * FROM users WHERE Username='$userx' AND User_pass='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // User is authenticated, store their username in session
            $_SESSION['Username'] = $userx;
    
            // Redirect to welcome page
            header("Location: logedin.php");
            exit;
        }else
        echo "<p style='color:red'>incorrect password or user name<p>";

    }}

        ?>
        <h2>Login</h2>
        <p>Please fill in your credentials to login</p>
      <form action = "logedin.php" method = "POST">
        <label for="Username">Username</label><br>
          <input type = "text" name = "Username" /><br>
          <label for="Password">Password</label><br>
          <input type = "password" name = "pass" /><br>
          <br>
          <p>Don't have an account? <a href='signup.php'>Sign up now.</a></p>
          <input type = "submit" name="login" value="Login" />
      </form>
      

    </body>
</html>