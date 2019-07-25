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

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Eventure | Route to your event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="CSS/main.css" />

</head>

<body>

  <?php
 include 'header.php';
 ?>

  <div class="container">
    <h1 class="text-center p-2">Find your way to: <?php echo $event['eventName']?></h1>
    <div class="container locationField text-center d-flex justify-content-center">
      <input id="start" class="form-control autocomplete" type="text" onFocus="geolocate()"
        placeholder="Enter your address">
    </div>
    <div class="text-center">
      <button id=getStart class="btn btn-lg p-1 m-2 mt-5 pl-5 pr-5">Get directions</button>
    </div>

    <div id="map2"></div>
  </div>
  <script>
    function initialize() {
      initMap();
      initAutocomplete();
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

    function initMap() {
      geocoder = new google.maps.Geocoder()
      var address = "<?php echo $event['eventAddress'] . $event['eventCity'] . $event['eventPostcode'] ?>";

      geocoder.geocode({
        'address': address
      }, function (results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
        }
      });

     

      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var map = new google.maps.Map(document.getElementById('map2'), {
        zoom: 12,
      });
      directionsDisplay.setMap(map);

      var onChangeHandler = function () {
        calculateAndDisplayRoute(directionsService, directionsDisplay);
      };

      const start = document.getElementById('start').addEventListener('keyup', function (event) {
        if (event.keyCode === 13) {
          onChangeHandler();
        }
      })

      document.getElementById('getStart').addEventListener('click', onChangeHandler);
    }



    let endDestination = '<?php echo $event['eventAddress']?>';



    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
      directionsService.route({
        origin: document.getElementById('start').value,
        destination: endDestination,
        travelMode: 'DRIVING',
      }, function (response, status) {
        if (status === 'OK') {
          directionsDisplay.setDirections(response);
        } else if (status === 'NOT_FOUND') {
          window.alert("Google can't find your location")
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
    }

    // autocomplete maps

    var placeSearch, autocomplete;


    function initAutocomplete() {
      // Create the autocomplete object, restricting the search predictions to
      // geographical location types.
      autocomplete = new google.maps.places.Autocomplete(
        document.querySelector('.autocomplete'), {
          types: ['geocode']
        });

      // Avoid paying for data that you don't need by restricting the set of
      // place fields that are returned to just the address components.

      // When the user selects an address from the drop-down, populate the
      // address fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();


      // Get each component of the address from the place details,

    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
        });
      }
    }
  </script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8fr1kqe2iBN30S0oX06Ff6FhwoJdloGg&callback=initMap"
                async defer></script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8fr1kqe2iBN30S0oX06Ff6FhwoJdloGg&libraries=places&callback=initAutocomplete&callback=initMap"
               async defer></script> -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8fr1kqe2iBN30S0oX06Ff6FhwoJdloGg&signed_in=true&libraries=places&callback=initialize"
    async defer></script>



  <?php
 include 'footer.php';
 ?>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script src="main.js"></script>
</body>

</html>