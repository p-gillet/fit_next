<!DOCTYPE html>
<html>
   <head>
      <title>Fitnext - @yield('title')</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
   </head>

   <body>
      @yield('content')

      <!-- Header bar -->
      <div id="main-header">
         <a href="/">Fitnext</a>
      </div>

     <!-- Global styles -->
     <?php
       $headerHeightPx = 60;
       $pageWidth = "80%";
     ?>
     <style>
      * {
         font-family: 'Roboto', sans-serif;
         color: #111;
         background-color: #eee;
      }

      body {
         margin-top: <?=$headerHeightPx + 10?>px;
         width: <?=$pageWidth?>;
         margin-left: auto;
         margin-right: auto;
      }

      #main-header {
         background-color: white;
         display: flex;
         justify-content: center;
         align-items: center;
         height: <?=$headerHeightPx?>px;

         position: absolute;
         top: 0;
         width: 100%;
         left: 0;
      }

      #main-header a {
         background-color: white;
         text-decoration: none;
         font-size: 35px;
         transition: .3s;
         font-family: 'Bebas Neue', sans-serif;
      }

      #main-header a:hover {
         letter-spacing: 3px;
         cursor: pointer;
         color: coral;
      }
   </style>
   </body>
</html>
