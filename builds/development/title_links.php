<?php
session_start();
ini_set('display_errors',"1");
include_once('pdo.php');

if(isset($_POST['Susername']) && $_POST['Spassword']){
$username = $_POST['Susername'];
$password = $_POST['Spassword'];
$conn = db_connect();
//run the query to search for the username and password the match
 $result = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
 $result->bindParam(":username", $_POST['Susername'], PDO::PARAM_STR);
 $result->bindParam(":password", sha1($_POST['Spassword']), PDO::PARAM_STR);
 $result->execute() or die("Unable to verify user because : " . mysql_error());
//this is where the actual verification happens
    if($result->rowCount()== 1){
        $user = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['userId'] = $user['u.id'];
        $userId = $_SESSION['userId'];
        $fname = $_SESSION['fname'];
    header('Location: return.php');
  }else{
        echo "<p><h3> Oops. Incorrect username / password. Try again! </h3></p>";
        header('Location: index.php');
    }
}
    ?>
<div id="tLinks">
    <div id="tNav">
        <a href="#" class="links" id="signIn">Sign in</a>
        <a href="#"id="make" class="links">Register</a>
        <a href="#" id="signOut" class="links">Sign Out</a>
    </div>
    <div id="sign">
        <form method="post" action="title_links.php">
        Username: <input type="text" name="Susername"/><br>
        Password: <input type="password" name="Spassword"/><br>
        <p><input type="submit" value="Login"></p>
        </form>
    </div>
    <div id="reg">
        <form id="add">
            <p><h3>Thank you for registering with Restaurant Concierge!</h3></p>
            <p>Please enter all the information below.<br> All fields are required</p>
            <label>First Name:</label> <input type="text"id="fname" name="fname"/><br>
            <label>Last Name:</label> <input type="text"id="lname" name="lname"/><br>
            <label>Email:</label> <input type="text"id="email" name="email"/><br>
            <label>User Name:</label> <input type="text"id="uname" name="username"/><br>
            <label>Password:</label> <input type="password"id="pass" name="password"/><br>
            <label>Confirm Password:</label> <input type="password"id="pass2" name="confirm"/><br>
            <button id="register">Register</button>
        </form>
        <div class="message"></div><br>
        <div class="message"><a href="return.php">Continue</a></div>
    </div>
</div>
