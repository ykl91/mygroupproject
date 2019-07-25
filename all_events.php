<?php
require('config.php');

// Getting upcoming events


$query = 'SELECT * FROM events';
    


	// Get Result
  $result = mysqli_query($conn, $query);
 

	// Fetch Data
	$allEvents = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" type="text/css" href="CSS/main.css"> -->
  <link rel="stylesheet" href="CSS/main.css">

</head>

<?php
    include 'header.php';
      ?>
<body>
    <div class="container" id="all-events">
    
    
      <?php
        foreach($allEvents as $event) : ?>
        <div class="card search-events mb-3">
      <div class="row no-gutters">
        <div class="col-lg-3">
          <a href="Event.php?id=<?php echo $event['id']?>"><img class="card-img-top"
              src="imagepath/uploads/<?php echo $event['imgName'] ?>" alt="Card image cap"></a>
        </div>
        <div class="col-lg-5">
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
          
              <p class="event-description card-text"><?php echo substr($event['eventDescription'], 0, 70)?><a class="readMore" href="Event.php?id=<?php echo $event['id']?>">...[Read more]</a></p>
            </div>
            <div class="event-button">
              <a href="#" class="btn align-self-center">Buy tickets</a>
            </div>
          </div>
        </div>
      </div>
    </div>
   


    <?php endforeach; ?>
  </div>
    <div class="col-lg-4">
        <div class="sponsors aside">
          <h1>Sponsors</h1>
        </div>
      </div>
    </div>
  </div>





  </div>















  <?php 
include'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    <script src="main.js"></script>    
</body>
</html>