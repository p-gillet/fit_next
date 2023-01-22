<!DOCTYPE html>
<html>
   <head>
      <title>Fitnext - @yield('title')</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
      </-- jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>

   <body>
      @yield('content')

      <?php
      session_start();
      ?>

      <!-- Notifications -->
      <?php if (array_key_exists('notif', $_SESSION) && $_SESSION['notif'] != null) :?>
         <div id="notif" style="background-color: 
         <?php switch($_SESSION['notif']['type']) {
            case 'danger': echo '#c72323'; break;
            case 'warning': echo '#e68217'; break;
            case 'success': echo 'green'; break;
         } ?>
         ">
            <div><?=$_SESSION['notif']["text"]?></div>
         </div>
      <?php endif; ?>

      <!-- Header bar -->
      <div id="main-header">
         <a href="/">Fitnext</a>
      </div>

     <!-- Global styles -->
     <?php
       $headerHeightPx = 60;
       $pageWidth = "80%";
       $notifheightPx = (array_key_exists('notif', $_SESSION) && $_SESSION['notif'] != null) ? 60 : 0;

       // Clear notif
       $_SESSION['notif'] = null;
     ?>
     <style>
      * {
         font-family: 'Roboto', sans-serif;
         color: #111;
         background-color: #eee;
      }

      body {
         margin-top: <?=$headerHeightPx + $notifheightPx + 20?>px;
         width: <?=$pageWidth?>;
         margin-left: auto;
         margin-right: auto;
      }

      #notif {
         background-color: red;
         height: <?=$notifheightPx?>px;
         position: absolute;
         top: <?=$headerHeightPx?>px;
         width: 100%;
         left: 0;
         padding-top: 5px;
         padding-bottom: 5px;
      }

      #notif div {
         color: white;
         width: 80%;
         background-color: transparent;
         margin-left: 10%;
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
         user-select: none;
      }

      #main-header a:hover {
         letter-spacing: 3px;
         cursor: pointer;
         color: coral;
      }

      .btn {
         border-radius: 5px;
         padding: 8px;
         background-color: white;
         transition: .4s;
         border-style: none;
         text-decoration: none;
         user-select: none;
      }

      .btn:hover {
         background-color: coral;
         transition: .2s;
      }

      .goBack {
         transition: .5s;
         user-select: none;
      }

      .goBack:hover {
         color: coral;
         letter-spacing: 1px;
         transition: .2s;
      }
      
      .form-elem > select {
         background-color: white;
         font-size: 22px;
         width: 100%;
         border-style: solid;
         border-color: black;
         border-width: 2px;
         height: 50px;
         padding: 5px;
         margin-bottom: 20px;
      }

      .form-elem > select[multiple] {
         height: 200px;
      }

      .form-elem > select > option {
         background-color: white;
      }

      .form-elem > input[type="checkbox"] {
         height: 20px;
         width: 20px;
         display: inline;
      }

      .form-elem input {
         background-color: white;
      }

      .form-elem input[disabled] {
         background-color: lightgray;
         cursor: no-drop;
      }
   </style>
   </body>
</html>
