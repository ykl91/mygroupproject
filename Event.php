<?php
	require('config.php');

	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM events WHERE id= '.$id;
    
    // -- WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$event = mysqli_fetch_assoc($result);


	// Free Result
    mysqli_free_result($result);
    
    mysqli_close($conn);

    $startDate = strtotime($event['startDate']);
    $dt = new DateTime("@$startDate");
    $startTime = ($event['startTime']);
    $convertedStartDate = $dt->format('d-M-Y') . ' ' . $startTime;
  
    $endDate = strtotime($event['endDate']);
    $dt = new DateTime("@$endDate");
    $endTime = ($event['endTime']);
    $convertedEndDate = $dt->format('d-M-Y') . ' ' . $endTime ;



    
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
        <div class="row">
            <div class="parentDiv col-lg-8">
                        <div style="background-image: url('imagepath/uploads/<?php echo $event['imgName']?>')"
                            class=" jumbotron jumbotron-fluid eventJumbo">
                        </div>
                            
                    </div>


                    <div id="eventInformation" class="col-lg-4 text-center">
                        <h1 class="pt-2 search-title"><?php echo $event['eventName']?></h1>
                        <p class="text-center font-italic"><?php echo $convertedStartDate?></p>
                        <p><?php echo '$' . $event['price']?></p>
                        <button class="btn-block btn">Buy Tickets</button>

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="search-title"><?php echo $event['eventName']?></h1>
                        <p><?php echo $event['eventDescription']?></p>


                    </div>
                    <div class="col-lg-4">

                        <h2 class="search-title">Time & Date</h2>
                        <p>From<p>
                                <p><?php echo $convertedStartDate?><br></p>
                                <p>Till</p>
                                <p><?php echo $convertedEndDate?><br></p>
                                <h2 class="search-title">Location</h2>
                                <p><?php echo $event['eventAddress'] . '<br> ' . $event['eventCity'] . ' ' . $event['eventPostcode']?></p>

                                <h2 class="search-title">Share this Event!</h2>
                                <a class="socialMedia" target="_blank" href="<?php echo $event['eventTwitter']?>"><span><i class="fab fa-twitter text-center"></i></span></a>
                                <a class="socialMedia" target="_blank" href="<?php echo $event['eventFacebook']?>"><span><i class="fab fa-facebook text-center"></i></span></a>
                                <a class="socialMedia" target="_blank" href="<?php echo $event['eventInstagram']?>"><span><i class="fab fa-instagram text-center"></i></span></a>
        
                    </div>

                </div>
            </div>

            <hr>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center pt-4 search-title">Get Ready</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card text-center m-4">
                            <img class="card-img-top" src="CSS/images\uber.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Get there</h4>
                                <a href="routeToEvent.php?id=<?php echo $event['id']?> "
                                    class="btn btn-primary">Find</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center m-4">
                            <img class="card-img-top" src="CSS/images\parking.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Parking</h4>
                                <a href="searchparking.php?id=<?php echo $event['id']?> "
                                    class="btn btn-primary">Find</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center m-4">
                            <img class="card-img-top" src="CSS/images\food2.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Food</h4>
                                <a href="restaurantsearch.php?id=<?php echo $event['id']?> "
                                    class="btn btn-primary">Find</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center m-4">
                            <img class="card-img-top" src="CSS/images\sleep.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Sleep</h4>
                                <a href="searchthehotels.php?id=<?php echo $event['id']?> "
                                    class="btn btn-primary">Find</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="text-center m-4 search-title">Location</h2>

                        <div id="map"></div>
                        <script>
                            function initialize() {
                                initMap();
                                codeAddress();
                            }
                            var map;

                            function initMap() {

                                let createCenter =
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: {
                                            lat: -34.397,
                                            lng: 150.644
                                        },
                                        zoom: 13
                                    });
                            }


                            function codeAddress() {
                                geocoder = new google.maps.Geocoder()
                                var address = "<?php echo $event['eventAddress'] . ' ' . $event['eventCity'] . ' ' . $event['eventPostcode']?>"


                                geocoder.geocode({
                                    'address': address
                                }, function (results, status) {
                                    if (status == 'OK') {
                                        map.setCenter(results[0].geometry.location);
                                        var marker = new google.maps.Marker({
                                            map: map,
                                            position: results[0].geometry.location
                                        });
                                    }
                                });
                            }
                        </script>
                        <script
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8fr1kqe2iBN30S0oX06Ff6FhwoJdloGg&callback=initialize"
                            async defer>
                        </script>
                    </div>
                </div>
            </div>

            <?php
include 'footer.php';
  ?>





            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
            </script>
            <script src="main.js"></script>
</body>

</html>