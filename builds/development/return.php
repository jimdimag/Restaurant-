<?php 
session_start();
$fname = $_SESSION['fname'];
try {
require_once('pdo.php');

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
<script src="js/script.js"></script> 
</div>
</body>
</html>