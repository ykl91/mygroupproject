<?php
require('config.php');

// Getting upcoming events

$search_query = "SELECT * FROM events WHERE 1";

if (isset($_POST['location']) != "") {
  $by_location = $_POST['location']; 
  $search_query .= " AND eventCity LIKE '%$by_location%'";
}


$query = 'SELECT * FROM events ORDER BY startDate ASC LIMIT 8';
$randomQuery = 'SELECT * FROM events ORDER BY RAND() LIMIT 4'; 
$locationquery = 'SELECT DISTINCT eventCity FROM events';
$newEventsQuery = 'SELECT * FROM events ORDER BY eventCreation ASC LIMIT 4';

	// Get Result
  $result = mysqli_query($conn, $query);
  $locationresult = mysqli_query($conn, $locationquery);
  $searchresult = mysqli_query($conn, $search_query);
  $randomResult = mysqli_query($conn, $randomQuery);
  $newEventsResult = mysqli_query($conn, $newEventsQuery);

	// Fetch Data
	$upcomingEvents = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $locationEvents = mysqli_fetch_all($locationresult, MYSQLI_ASSOC);
  $searchEvents = mysqli_fetch_all($searchresult, MYSQLI_ASSOC);
  $randomEvents = mysqli_fetch_all($randomResult, MYSQLI_ASSOC);
  $newEvents = mysqli_fetch_all($newEventsResult, MYSQLI_ASSOC);

	// Free Result
    mysqli_free_result($result);
    mysqli_free_result($locationresult);
    mysqli_free_result($searchresult);
    mysqli_free_result($randomResult);
    mysqli_free_result($newEvents);

    


    mysqli_close($conn); 
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Eventure</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
  <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
  <link rel="stylesheet" href="CSS/main.css">

</head>

<body class="noPadding">

  <div class="row">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbar-scroll">
     <a class="navbar-brand nav-link logo-icon" href="index.php">Eventure
       <!-- <img src="CSS/images/eventure logo 4.2.png" class="logo-icon"> -->
      </a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="events.php">Events <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="categories.php">Categories <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="dashboard.php">
              Members
            </a>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="logIn.php" tabindex="-1">Log In/ Sign Up</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="searchresults.php">
          <input id="searchNav" type="text" name="search" placeholder="Start your eventure.."><i id="magnGlass"
            class="fas fa-search btn"></i>
        </form>
      </div>
    </nav>
    <div class="search">
      <div class="container searchbar">
        <h1>Find an event!</h1>
        <form action="searchresults.php" method="post">
          <div class="form-row">
            <div class="form-group col-sm-4">
              <label class="sr-only" for="location">Location</label>
              <input type="text" class="form-control searchforms" id="location" name="location" placeholder="Location">
            </div>
            <div class=" form-group col-sm-4">
              <label class="sr-only" for="date">When</label>
              <div class="input-group">
                <input type="date" class="form-control searchforms" id="date" placeholder="Date" name="date">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
            <div class="form-group col-sm-4">
              <label class="sr-only" for="category">Event Categories</label>
              <select id="category" name="category" class="form-control searchforms">
                <option value="all">All</option>
                <option value="free">Free</option>
                <option value="music">Music</option>
                <option value="comedy">Comedy</option>
                <option value="sport">Sport</option>
                <option value="food">Food</option>
              </select>
            </div>
          </div>
          <div class="col-sm-12" id="button-center">
            <button type="submit" class="btn btn-default btn-primary searchbar-btn">Search</button>
          </div>
        </form>
      </div>
    </div>

    <!--Entire width header/hero-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner event-slider ">
        <div class="carousel-item active banner-slide">
          <img class="d-block w-100" src="CSS/images/tickets_NEW.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block text-center">
            <h1 class="carousel-title">Eventure</a></h1>
            <p class="banner-tagline">Make Adventures Possible</p>
          </div>
        </div>
        <div class="carousel-item banner-slide">
          <img class="d-block w-100" src="CSS/images/carousel1.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="carousel-title">Have a boogie</h1>
            <p></p>
          </div>
        </div>

        <div class="carousel-item banner-slide">
          <img class="d-block w-100" src="CSS/images/carousel4-laughter.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="carousel-title">Have a laugh</a></h1>
            <p></p>
          </div>
        </div>
        <div class="carousel-item banner-slide">
          <img class="d-block w-100" src="CSS/images/carousel-sport.jpg" alt="Fourth slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="carousel-title">Make some noise</a></h1>
            <p></p>
          </div>
        </div>
        <div class="carousel-item banner-slide">
          <img class="d-block w-100" src="CSS/images/carousel3.jpg" alt="Fifth slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="carousel-title">Wine 'n Dine</a></h1>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <!--Container with event categories-->
  <div class="container" id="explore">
    <h3 class="event-title">Events to Explore</h3>
    <div class="row">
      <div class="col-12 col-lg-4 category">
      <a href="categories.php">
        <img src="CSS/images/pineapple-all.jpg" class="img-fluid" alt="fireworks image">
        <div class="category-content">
          <div class="category-text">
            <p>Explore All</p>
          </div>
          <!-- <div class="search-bar">
           
          </div> -->
          </a>
        </div>
    
      </div>
      <div class="col-12 col-lg-4 category">
      <a href="categories.php?eventType=Free">
        <img src="CSS/images/free.jpg" class="img-fluid" alt="free image">
        <div class="category-content">
          <div class="category-text">
            <p>Free</p>
          </div>
          </a>
          <!-- <div class="search-bar">
            <a href="/free" class="fas fa-search"></a>
          </div> -->
        </div>
      </div>
      <div class="col-12 col-lg-4 category">
      <a href="categories.php?eventType=Music">
      <img src="CSS/images/music.jpg" class="img-fluid" alt="concert">
      <div class="category-content">
        <div class="category-text">
          <p>Music</p>
        </div>
</a>
        <!-- <div class="search-bar">
          <a href="/music" class="fas fa-search"></a>
        </div> -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-lg-4 category">
    <a href="categories.php?eventType=Comedy">
      <img src="CSS/images/laugh.jpg" class="img-fluid" alt="laugh">
      <div class="category-content">
        <div class="category-text">
          <p>Comedy</p>
        </div>
    </a>
        <!-- <div class="search-bar">
          <a href="/comedy" class="fas fa-search"></a>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-4 category">
    <a href="categories.php?eventType=Sport">
      <img src="CSS/images/sport.jpg" class="img-fluid" alt="tennis game">
      <div class="category-content">
        <div class="category-text">
          <p>Sport</p>
        </div>
</a>
        <!-- <div class="search-bar">
          <a href="/sport" class="fas fa-search"></a>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-4 category">
    <a href="categories.php?eventType=Food%2C+Wine">
      <img src="CSS/images/food.jpg" class="img-fluid" alt="tacos">
      <div class="category-content">
        <div class="category-text">
          <p>Food & Wine</p>
        </div>
</a>
        <!-- <div class="search-bar">
          <a href="/food" class="fas fa-search"></a>
        </div> -->
      </div>
    </div>
  </div>
</div>
  <hr>
  <!--Upcoming Events Grid-->
  <div class="container" id="upcoming-events">
    <h3 class="event-title">Upcoming Events</h3>
    <div class="row">
      <?php
      foreach($upcomingEvents as $event) : ?>

          <div id="cardHomePage" class="col-lg-3">
            <div class="card">
              <a href="Event.php?id=<?php echo $event['id']?>"><img class="card-img-top"
                  src="imagepath/uploads/<?php echo $event['imgName'] ?>" alt="Card image cap"></a>
              <div class="card-body">
                <a href="Event.php?id=<?php echo $event['id']?>">
                  <h5 class="event-title card-title font-weight-bold"><?php 
                  
                  if (strlen($event['eventName']) > 45) {
                    echo substr($event['eventName'], 0, 45)?>...
                    <?php
                  } else
                  echo $event['eventName']?></h5>
                </a>
                <p class="card-text-homepage overflow-auto"><?php echo substr($event['eventDescription'], 0, 70)?><a class="readMore" href="Event.php?id=<?php echo $event['id']?>">...[Read more]</a></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php 
            
            $startDate = strtotime($event['startDate']);
            $dt = new DateTime("@$startDate");
            $startTime = ($event['startTime']);
            $convertedStartDate = $dt->format('d-M-Y') . ' ' . $startTime;

            echo $convertedStartDate ?></li>
                <li class="list-group-item"><?php 
                  
                  if (strlen($event['eventAddress']) > 45) {
                    echo substr($event['eventAddress'], 0, 45)?>...
                    <?php
                  } else
                  echo $event['eventAddress']?></li>
              </ul>
              <div class="card-body text-center d-flex ">
                <a href="Event.php?id=<?php echo $event['id']?>" class="btn btn-block align-self-end">More info</a>
              </div>
            </div>
          </div>
       
      <?php endforeach; ?>

    </div>
  </div>
  <hr>
  <div class="container">
    <h3 id="test" class="event-title">New Events</h3>
    <div class="row">
    <?php
      foreach($newEvents as $event) : ?>

          <div id="cardHomePage" class="col-lg-3">
            <div class="card">
              <a href="Event.php?id=<?php echo $event['id']?>"><img class="card-img-top"
                  src="imagepath/uploads/<?php echo $event['imgName'] ?>" alt="Card image cap"></a>
              <div class="card-body">
                <a href="Event.php?id=<?php echo $event['id']?>">
                  <h5 class="event-title card-title font-weight-bold"><?php 
                  
                  if (strlen($event['eventName']) > 45) {
                    echo substr($event['eventName'], 0, 45)?>...
                    <?php
                  } else
                  echo $event['eventName']?></h5>
                </a>
                <p class="card-text-homepage overflow-auto"><?php echo substr($event['eventDescription'], 0, 70)?><a class="readMore" href="Event.php?id=<?php echo $event['id']?>">...[Read more]</a></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php 
            
            $startDate = strtotime($event['startDate']);
            $dt = new DateTime("@$startDate");
            $startTime = ($event['startTime']);
            $convertedStartDate = $dt->format('d-M-Y') . ' ' . $startTime;

            echo $convertedStartDate ?></li>
                <li class="list-group-item"><?php 
                  
                  if (strlen($event['eventAddress']) > 45) {
                    echo substr($event['eventAddress'], 0, 45)?>...
                    <?php
                  } else
                  echo $event['eventAddress']?></li>
              </ul>
              <div class="card-body text-center d-flex ">
                <a href="Event.php?id=<?php echo $event['id']?>" class="btn btn-block align-self-end">More info</a>
              </div>
            </div>
          </div>
       
      <?php endforeach; ?>

      <hr>
      <div class="container">
        <h3 id="test" class="event-title">Events you may like</h3>
        <div class="row">
          <?php
      foreach($randomEvents as $event) : ?>

          <div id="cardHomePage" class="col-lg-3">
            <div class="card">
              <a href="Event.php?id=<?php echo $event['id']?>"><img class="card-img-top"
                  src="imagepath/uploads/<?php echo $event['imgName'] ?>" alt="Card image cap"></a>
              <div class="card-body">
                <a href="Event.php?id=<?php echo $event['id']?>">
                  <h5 class="card-title font-weight-bold"><?php 
                  
                  if (strlen($event['eventName']) > 45) {
                    echo substr($event['eventName'], 0, 45)?>...
                    <?php
                  } else
                  echo $event['eventName']?></h5>
                </a>
                <p class="card-text-homepage overflow-auto"><?php echo substr($event['eventDescription'], 0, 70)?><a class="readMore" href="Event.php?id=<?php echo $event['id']?>">...[Read more]</a></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php 
            
            $startDate = strtotime($event['startDate']);
            $dt = new DateTime("@$startDate");
            $startTime = ($event['startTime']);
            $convertedStartDate = $dt->format('d-M-Y') . ' ' . $startTime;

            echo $convertedStartDate ?></li>
                <li class="list-group-item"><?php 
                  
                  if (strlen($event['eventAddress']) > 45) {
                    echo substr($event['eventAddress'], 0, 45)?>...
                    <?php
                  } else
                  echo $event['eventAddress']?></li>
              </ul>
              <div class="card-body text-center d-flex ">
                <a href="Event.php?id=<?php echo $event['id']?>" class="btn btn-block align-self-end">More info</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
    </div>
                  
        <!-- </div> -->
      </div>
    </div>
  </div>
  </div>










  </div>
  <?php include ('footer.php');
  ?>

  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(function () {
      var cities = [ <?php

        foreach($locationEvents as $city) {
          if ($city["eventCity"] != "") {
            $cityList .= "\"".$city["eventCity"]."\",";

          }
        }
        echo $cityList; ?>


      ]
      $("#location").autocomplete({
        source: cities
      });
    });

    /* $(function() {
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 200) {
                    $(".navbar-scroll").addClass("active-header");
                    $(".nav-link").attr("style","color: black");
                

                } else {
                    //remove the background property so it comes transparent again 
                   $(".navbar-scroll").removeClass("active-header");
                   $(".nav-link").attr("style","color: white");
                }
            });
        });*/
  </script>
  <script src="main.js"></script>
</body>

</html>