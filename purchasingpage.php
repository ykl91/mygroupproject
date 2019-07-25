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


</head>

<body>
    <!--Entire width header/hero-->
    <?php
    include 'header.php';
    ?>
    <!--Main Container with auto margins-->
    <div class="container">
        <form>
            <h1>Placeholder Event Name</h1>
            <h2>Event location and Date</h2>
            <h4>Personal Details</h4>
            <div class="form-row">
                <div class="form-group col-lg-6">
                    <label for="inputFirstName4">First Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Nigel">
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputLastName4">Last Name</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Thornberry">
                </div>
            </div>
            <div class = "form-row">
            <div class="form-group col-lg-8">
                <label for="inputEmail">Email (tickets will be sent to this email)</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="nigelthornberry@gmail.com">
            </div>
            <div class="form-group col-lg-4">
                    <label for="numberOfTickets">Number of Tickets</label>
                    <select id="numberOfTickets" class="form-control">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
        </div>
        <h4>Card Details</h4>
            <div class = "form-row">
                <div class = "form-group col-lg-12">
                    <label>If this is a free event, leave the card details section blank.</label>
            </div>
        </div>
            <div class = "form-row">
            <div class="form-group col-lg-4">
                    
                <label for="nameOnCard">Name on Card</label>
                <input type="text" class="form-control" id="nameOnCard" placeholder="Mr Nigel Thornberry">
            </div>
            <div class="form-group col-lg-4">
                
                <label for="cardNumber">Card Number</label>
                <input type="number" class="form-control" id="cardNumber">
            </div>
            <div class="form-group col-lg-1">
                <label for="cvcNumber">CVC</label>
                <input type="number" class="form-control" id="cvcNumber">
            </div>
            <div class="form-group col-lg-3">
                    <label for="cardExpiry">Card Expiry</label>
                    <input type="month" class="form-control" id="cardExpiry">
                </div>
        </div>
            <div class="form-row">
                
                
            </div>
            <div class="form-group col-lg-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            I would like to receive emails about similar events.
                        </label>
                    </div>
                </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="main.js"></script>
</body>

</html>