<?php 
//session_start();
ini_set('display_errors',"1");
try {
require_once('pdo.php');
$conn= db_connect();
$result = $conn->prepare("insert into users (fname,lname,password,username,email) values (:fname,:lname,:pass,:username,:email)");
$result->bindParam(":fname", $_POST['fname'], PDO::PARAM_STR);
$result->bindParam(":lname", $_POST['lname'], PDO::PARAM_STR);
$result->bindParam(":pass", sha1($_POST['pass']), PDO::PARAM_STR);
$result->bindParam(":username", $_POST['username'], PDO::PARAM_STR);
$result->bindParam(":email", $_POST['email'], PDO::PARAM_STR);

$result->execute();
if($result->rowCount()==1) {
    $added = array('message'=>"You have successfully registered!  Enjoy your dining experience!");
    
}
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
    echo json_encode($added);
?>