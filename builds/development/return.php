<?php 
session_start();
$fname = $_SESSION['fname'];
try {
require_once('pdo.php');
$conn = db_connect();
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Restaurant Concierge</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="back">
        <section class="city">
    <div class="container">
        <div class="logo">
     <?php require_once 'title_links.php'; ?> 
     </div>
    </div>
  </section>
        <h2 class="tagline"></h2>
   <p>Welcome back <?php echo $fname; ?>!</p> 
   <p> What are you craving today?</p>
   <select id="craving">
       <option value="">Select a craving</option>
       <?php
            $query = $conn->prepare("SELECT e_id, ethnicity FROM ethnicity ORDER BY ethnicity");
            $query->execute();
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['e_id'] . '" >' . $row['ethnicity'] . '</option>';
            }
            echo "</select>"; 
            echo"<label for='sub' id='food'>Select sub category:</label>";
                                        echo"<select id='sub' name='sub'>";
                                        echo"</select><br />";
            ?>
     

<script src="js/script.js"></script> 
</div>
</body>
</html>