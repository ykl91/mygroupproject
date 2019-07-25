

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
    <script src="formValidation.js"></script>

</head>

<body>
    <!--Entire width header/hero-->
    <!-- <div class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="#">Eventure</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Events <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Members
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Dashboard</a>
                                <a class="dropdown-item" href="#">My Events</a>
                                <a class="dropdown-item" href="#">Create Event</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log In</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1">Sign Up</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </header>
    </div> -->

    <?php
    include 'header.php';
    ?>
    <!--Main Container with auto margins-->
    <div class="container">
        <form name="createEventForm" method="POST" action="submit-event.php" enctype = "multipart/form-data" onsubmit="validate()" >
            <h1>Create Your Event!</h1>
            <div class="form-row">

                <div class="form-group col-lg-12">
                    <label for="eventName">Event Name:</label>
                    <input type="text" class="form-control" id="eventName"
                        placeholder="Add a short, clear name" name="eventName" required> <!--Without php echo does it clear the variables when the page is reloaded (otherwise the default variables are what has been previously entered-->
                </div>
                </div>
                <div class = "form-row">
                <div class="form-group col-lg-6">
                    <label for="eventAddress">Event Address</label>
                    <input type="text" class="form-control" id="eventAddress"
                        placeholder="278 Barker Rd Subiaco" name = "eventAddress" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="eventCity">Event City</label>
                    <input type="text" class="form-control" id="eventCity"
                        placeholder = "Perth" name = "eventCity" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="eventPostcode">Event Postcode</label>
                    <input type="text" class="form-control" id="eventPostcode"
                        placeholder="6008" name = "eventPostcode" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-3">
                    <label for="startDate">Event Start Date</label>
                    <input type="date" class="form-control" name = "startDate" id = "startDate" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="startTime">Event Start Time</label>
                    <input type="time" class="form-control" name = "startTime" id = "startTime" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="endDate">Event End Date</label>
                    <input type="date" class="form-control" name = "endDate" id = "endDate" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="endTime">Event End Time</label>
                    <input type="time" class="form-control" name = "endTime" id = "endTime" required>
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-lg-12">
                    <label for="eventDescription">Event Description</label>
                    <textarea class="form-control rounded-0" class="md-textarea form-control" rows="8" name = "eventDescription" id = "eventDescription" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-lg-4">
                    <label for="availableTickets">Available Tickets</label>
                    <input type="number" class="form-control" name = "availableTickets" id = "availableTickets" required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="price">Ticket Price</label>
                    <input type="text" class="form-control" id="price" name = "price"  required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="imgName">Upload Photo</label>
                    <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control"
                        id="imgName" name = "imgName" required>
                </div>
                
               
            </div>
            <div class = "form-row">
            <div class = "form-group col-lg-4">
            <label for="eventTwitter">Twitter Link</label>
            <input type = "text" class = "form-control" name = "eventTwitter" id = "eventTwitter">
            </div>
            <div class = "form-group col-lg-4">
            <label for="eventFacebook">Facebook Link</label>
            <input type = "text" class = "form-control" name = "eventFacebook" id = "eventFacebook">
            </div>
            <div class = "form-group col-lg-4">
            <label for="eventInstagram">Instagram Link</label>
            <input type = "text" class = "form-control" name = "eventInstagram" id = "eventInstagram">
            </div>
            </div>
            <div class="form-row">
                

                
                
                <div class="form-group col-lg-12">

                    <h4>Type of Event</h4>
                    <h5>Check all that apply</h5>
                    <div class="form-check" required>
                        <input class="form-check-input" type="checkbox" value="Free" name = "eventType[]" id = "free">
                        <label class="form-check-label" for="checkFree">
                            Free
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Comedy" name = "eventType[]" id = "comedy">
                        <label class="form-check-label" for="checkComedy">
                            Comedy
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Music" name = "eventType[]" id = "music"> 
                        <label class="form-check-label" for="checkMusic">
                            Music
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sport" name = "eventType[]" id = "sport">
                        <label class="form-check-label" for="checkSport">
                            Sport
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Food" name = "eventType[]" id = "food">
                        <label class="form-check-label" for="checkFood">
                            Food
                        </label>

                    </div>
        

            </div>

            <div class="form-row">
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-primary" id="createEventButton" name = "submit">Create Event!</button>
                </div>
            </div>
        </form>
      
    </div>
    
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
    
</body>

</html>