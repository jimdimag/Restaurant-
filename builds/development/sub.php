<?php 
//session_start();
ini_set('display_errors',"1");
try {
require_once('pdo.php');
$conn= db_connect();
$x=0;

$query = $conn->prepare("SELECT sub_id, item FROM sub_eth where e_id = :craving ORDER BY item");
$query->bindParam(":craving", $_POST['craving'], PDO::PARAM_STR);
$query->execute();
        if($query->rowCount()>= 1){
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $idArray[$x] = $row['sub_id'];
            $itemArray[$x] =  $row['item'];
            $x++;
        }
        $added = array('id'=>$idArray,
        'item'=>$itemArray
        );
        } else {
          $added = array('id'=>null,
        'item'=>null
        );  
        }
}catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
    echo json_encode($added);
?>  
          