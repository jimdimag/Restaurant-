<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Restaurant Concierge</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body><div class="back">
        <section class="city">
    <div class="container">
        <div class="logo">
     <?php require_once 'title_links.php'; ?> 
     </div>
    </div>
  </section>
  
        <h2 class="tagline"></h2>
        
        <section class="pixgrid rclick">
  <!-- TODO:  add images of meals here -->    
  			<div class="item"><img src="images/flaming.png">  </div>   
        </section>
        <section class="ontour">
        <div class="container">
            <h1>Reviews</h1>
            <article id="reviews"></article>
        </div>
        </section>
        
     <script src="js/script.js"></script> 
     <script id="reviews" type="text/template">
         {{#reviews}}
         <div class="review">
             <h2>{{restaurant}}</h2>
             <h3>{{address}}</h3>
             <p><img src="rest/images/{{shortname}}_tn.jpg" alt="Photo of restaurant" /></p>
         </div>
         {{reviews}}
     </script>
     </div>  
    </body>
</html>