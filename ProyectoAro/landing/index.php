<?php

    //$url  = 'http://bing.com/HPImageArchive.aspx?format=json&idx=5&n=5&mkt=en-US.xml';
    //$path = 'data/bing.xml';
    //file_put_contents($path, fopen($url, 'r'));
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PARK-EAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="data/Logo.png">
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="data/style.css" />

    <script type="text/javascript">
    window.onload = function(){
      LandingJs.start({
        slide: true,
        slideCount: 5,
        countdown: true,
        countdownTime: '2015,5,8',
        brand: 'PARK-EAT',
        description: 'Encuentra donde aparcar facilmente cuando vayas a comer',
        brief: 'Este sera tu pagina ideal cuando vayas a visitar a pamplona, encuenta tu aparcamiento mas cercano ya sea gratuito o de pago. Ademas conoceras opiniones de nuestros usuarios sobre los mejores restaurantes en Pamplona'
      });
    }

    </script>
  </head>
  <body>
    <div id="blur"></div>
      <div id="container">
        <h1></h1>
        <h4></h4>
        <form action="save.php" method="post">
          <input type="text" name="subscribe" id="subscribe" placeholder="Introduce tu email ..." />
          <input type="submit" name="notify" id="notify" value="Notificame" />
        </form>
        <p id="brief"></p>
        <div id="countdown">
         
        </div>
        <p id="copyright"></p>
      </div>
    
  <script src="data/countdown.min.js"></script>  
  <script src="landing.min.js"></script>
  </body>
</html>
