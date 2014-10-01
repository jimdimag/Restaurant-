<?php

//session_start();
ini_set('display_errors',"1");
include_once('pdo.php');

if(isset($_POST['username']) && $_POST['password']){
$username = $_POST['username'];
$password = $_POST['password'];
$conn = db_connect();
//run the query to search for the username and password the match
$query = "SELECT * FROM users WHERE username = '".$username."' AND password = sha1('".$password."')";
$result = $conn->query($query) or die("Unable to verify user because : " . mysql_error());
//this is where the actual verification happens
    if(mysqli_num_rows($result) == 1){
        $user = $result->fetch_assoc();
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['userId'] = $user['u.id'];
        $userId = $_SESSION['userId'];
    
    header('Location: return.php');
  }else{
        echo "<p><h3> Oops. Incorrect username / password. Try again! </h3></p>";
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
        Username: <input type="text" name="username"/><br>
        Password: <input type="password" name="password"/><br>
        <p><input type="submit" value="Login"></p>
        </form>
    </div>
    <div id="reg">
        <form>
            <p><h3>Thank you for registering with Restaurant Concierge!</h3></p>
            <p>Please enter all the information below.<br> All fields are required</p>
            <label>First Name:</label> <input type="text"id="fname" /><br>
            <label>Last Name:</label> <input type="text"id="lname" /><br>
            <label>User Name:</label> <input type="text"id="uname" /><br>
            <label>Password:</label> <input type="password"id="pass" /><br>
            <label>Confirm Password:</label> <input type="password"id="pass" /><br>
            <button id="register">Register</button>
        </form>
        <div id="message"></div>
    </div>
</div>
