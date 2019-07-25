<?php
require('config.php');


if (!empty($_GET['eventType'])){
$valueForm = $_GET['eventType']; 
$querySelect = "SELECT *  FROM events WHERE eventType = '$valueForm' ";
$result2 = mysqli_query($conn, $querySelect);
$eventSelect = mysqli_fetch_all($result2, MYSQLI_ASSOC);
} else {
    $valueForm = $_GET['eventType']; 
    $querySelect = "SELECT *  FROM events";
    $result2 = mysqli_query($conn, $querySelect);
    $eventSelect = mysqli_fetch_all($result2, MYSQLI_ASSOC);    
}


// Create Query
$eventTypeQuery = 'SELECT DISTINCT eventType FROM events';



// Get Result
$result = mysqli_query($conn, $eventTypeQuery);


// Fetch Data
$eventType = mysqli_fetch_all($result, MYSQLI_ASSOC);



// Free Result
mysqli_free_result($result);

mysqli_close($conn);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
    <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
    <?php
include 'header.php';
?>

    <div class="container-fluid">
        <div class="row banner-categories">
            <div class="col-lg-12 p-0">
                <div class="jumbotron jumbotron-fluid d-flex justify-content-center"
                    style="background: url('./CSS/images/<?php 
                    
                    if (!empty($_GET['eventType'])){
                    echo $_GET['eventType'];
                    }
                    else {
                    echo 'Food';
                    }
                ?>.jpg')">
                    <form action="" method="get">
                        <h1 class="p-2 text-center text-white" style="text-shadow: 2px 2px black;">Find events:
                        </h1>
                        <select class="form-control m-1 mt-4 w-100" name="eventType">
                            <?php foreach($eventType as $event) : ?>
                            <option value="<?php echo $event['eventType']?>"><?php echo $event['eventType']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-center"> <input class="btn ml-1 w-50" type="submit" value="Search">
                        </div>
                    </form>
                </div>

            </div>
        </div>



   
    <div class="row">
    <div class="col-lg-8">
      <h1 class="search-title mt-3"><?php echo $_GET['eventType'] ?> Events </h1>
    <?php
        foreach($eventSelect as $event) : ?>
   
    <div class="card search-events mb-3">
      <div class="row no-gutters">
        <div class="col-lg-5">
          <a href="Event.php?id=<?php echo $event['id']?>"><img class="card-img-top"
              src="imagepath/uploads/<?php echo $event['imgName'] ?>" alt="Card image cap"></a>
        </div>
        <div class="col-lg-7" id = "card-details">
          <div class="event-details card-body">
            <div class="event-description">
              <h1 class="event-title font-weight-bold card-title"><?php echo $event['eventName'] ?></h1>
            <div class="datetime">
              <h3 class="event-date card-title"><?php 
         
            
            $startDate = strtotime($event['startDate']);
            $dt = new DateTime("@$startDate");
            $convertedStartDate = $dt->format('d-M-Y');

            echo $convertedStartDate 
                ?><span> @ <?php echo $event['startTime']?> </span></h3>
              </div>
              <p class="event-location card-text"><?php echo $event['eventAddress'] ?><span>, <?php echo $event['eventCity'] ?></span></p>
          
              <p class="event-text card-text"><?php echo substr($event['eventDescription'], 0, 70)?><a class="readMore" href="Event.php?id=<?php echo $event['id']?>">...[Read more]</a></p>
            </div>
           
          </div>
          <div class="event-button">
              <a href="#" class="btn align-self-center">Buy tickets</a>

        </div>
        </div>
     
</div>
    </div>

  <?php endforeach; ?>

  <!-- <div class="col-lg-4">
  </div> -->
    </div>
</div>


  <?php
include 'footer.php';
  ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>

</body>

</html>