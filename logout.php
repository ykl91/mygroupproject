<?php 
	session_start();
	unset($_SESSION['username']); 
    session_destroy();
    ?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
    <style>

.container {
  position: relative;
  text-align: center;
  margin-top: 50px;
}

   /* Centered text */
.text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  color: #009f8b;
  opacity: 0.8;
  font-size: 38px;
  border-radius: 10px;
}
    </style>
    </head>
  <?php
  include 'header.php'; ?>
  <div class="container">
  <img src="CSS/images/pineapple-all.jpg" alt="pineapple" style="width:100%;">
  
  <div class="text">You have successfully logged out.</div>
</div>
  <?php
  include 'footer.php';
  ?>
