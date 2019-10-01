<!-- <?php
            session_start();
            // Test that the authentication session variable exists
            if ( !isset ($_SESSION["gatekeeper"]))
            {
                header( "refresh:5;url=login.html" );
                echo "You're not logged in. Go away!";
            }
            else
            {
                echo "You are logged in as ".$_SESSION["gatekeeper"]; 
              ?>  
         -->
    <html lang='en'>
    <head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    </head>
    <body>
    <div class='wrapper'>
        <img src='hittastic.png' alt='Image?'>
        
        <h1 class='center'>Welcome to HitTastic</h1>
        
        <p class='center'>
          Search and shop for your favourite top 40 hits on HitTastic! Lorem ipsum dolor sit amet consectetur               
          quod, fugit, corrupti temporibus dolor labore quae sapiente dignissimos. Aspernatur, 
          cupiditate assumenda!
        </p>
        
        <form method='get' action='searchresults.php' class='center'>
          <input type='text' id='artist' name='artist'>
        <a href='updatepass.html' class='center'>Change password</a>
        <a href='advancedsearch.html' class='center'>Advanced search</a>
        <a href='admindbupdate.php' class='center'>Admin DB Update</a>
        <a href='logout.php' class='center'>Log out</a>
        <a href='ajax_index.html' class='center'>AJAX SEARCH</a>
        <a href="htmlcilla.php" class="center">CILLAS FAN PAGE</a>
    </div> <!--wrapper end-->
  </body>
</html>
<!-- <?php
}
?>-->