<?php
require('config.php');

// Getting upcoming events

$search_query = "SELECT * FROM events WHERE 1";
if (isset($_POST['location']) && $_POST['location'] != "") {
  $by_location = $_POST['location']; 
  $search_query .= " AND eventCity LIKE '%$by_location%'";
  if (isset($_GET['location'])) {
    $by_location = $_GET['location']; 
    $search_query .= " AND eventCity LIKE '%$by_location%'";
  }
}

if ($_POST['category'] != "all") {
    $by_eventType = $_POST['category']; 
    $search_query .= " AND eventType LIKE '%$by_eventType%'";
    if ($_GET['category'] != "all") {
        $by_eventType = $_GET['category']; 
        $search_query .= " AND eventType LIKE '%$by_eventType%'";
  }
}
// 
  
if ($_POST['date'] != ""){
$startDate = $_POST['date'];
$search_query .= " AND startDate = '$startDate'";

}
// search field by keyword //

if ($_POST['search'] != "") {
  $by_search = $_POST['search'];
  $search_query .= " AND eventName LIKE '%$by_search%' AND eventDescription LIKE '%$by_search%'";
}

// if ($search_query != ($by_location && $by_eventType && $startDate)) {
//   $heading = <p>Sorry, there are no events that match your search, please try a broader search <a href="index.php"></a></p>;
// }

// var_dump($search_query);

// echo "<br><br>";

//  $sql = "SELECT * FROM events WHERE eventName LIKE ? AND eventType LIKE ?"; 

//  $datesql = "SELECT * FROM events WHERE startDate = ?";




// $res = $stmt->get_result();

// $by_date = $_POST['startDate'];


	// Get Result
  
  $searchResult = mysqli_query($conn, $search_query);

	// Fetch Data

  $searchEvents = mysqli_fetch_all($searchResult, MYSQLI_ASSOC);
  // Free Result
    //  var_dump($searchEvents);
  
//     if (!($stmt = $conn->prepare($sql))) {
//     echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
//  }
// //  $stmt->bind_param('ss', $by_location, $by_eventType);
//  $stmt->bind_param('ss', $by_location, $startDate, $by_eventType);
//  $stmt->execute();

// var_dump($stmt);

    mysqli_free_result($searchresult);

 
/*OR startDate LIKE '$by_date' OR eventType LIKE '%$by_eventType%'*/
  
  

  // return $searchresult;



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

<?php include 'header.php'
?>

<body>
  <div class="container-fluid" id="all-events">
    <div class="search-banner">
      <h1>Find your Eventure</h1>
    </div>
   
    <div class="row">
    <div class="col-lg-8">
      <h1 class="search-title">Event Search Results</h1>
     <?php if ($searchEvents === []) { ?>
  <p>Sorry, there are no events that match your search, please try a broader search<a href="index.php" style="color:#009f8b; font-weight:bold;"> here</a></p>
  
  
          <?php
          }
        foreach($searchEvents as $event) : ?>
   
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
            <!-- </div>
          </div> -->
        </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12"> -->
         
    </div>
  </div>
   


    <?php endforeach; ?>
  </div>
  <div class="col-lg-4">
      <div class="sponsors aside">
        <h1 class="search-title">Sponsors</h1>
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