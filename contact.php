<?php 

require_once('config.php');
if((isset($_POST['names']) && $_POST['email'] && $_POST['subjects'] && $_POST['messages'])){
    $names = $conn->real_escape_string($_POST['names']);
    $email = $conn->real_escape_string($_POST['email']);
    $subjects = $conn->real_escape_string($_POST['subjects']);
    $messages = $conn->real_escape_string($_POST['messages']);

    $sql = "INSERT INTO contact (names ,email, subjects, messages) VALUES ('$names','$email','$subjects','$messages')";
    
    if (!$result = $conn->query($sql)){
        die('There was an error running the query [' .$conn->error . ']');
    }
    
        $success =  "Thank you for contacting us! We will contact you as soon as we review your messages.";
}
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="shortcut icon" href="CSS\images\eventure favcon 2.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">


</head>

    <!--Entire width header/hero-->
    <div class="container-fluid">
           <?php
           include 'header.php';
           ?>
<div class = "contactUsInner">
    <form method="POST">
    <h1>Contact Us</h1>
    <div class="form-row">
        <div class="form-group col-lg-3">
            <input type="text" class="form-control" placeholder="Your name" name="names">
        </div>
    </div>
    <div class = "form-row">
            <div class="form-group col-lg-3">
                <!-- <label for="inputEmail">Email</label> -->
                <input type="text" class="form-control" id="inputAddress" placeholder="Your email" name="email">
            </div>
        </div>
            <div class="form-row">
            <div class="form-group col-lg-3">
                    <select id="numberOfTickets" class="form-control" name="subjects">
                        <option selected>What's this about?</option>
                        <option>General Question</option>
                        <option>Work Opportunities</option>
                        <option>Complaints</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <!--Need to add textarea and centre all the form things col4 in centre of page-->
            <div class="form-row">
                <div class="form-group col-lg-3">
                    <textarea class="form-control" rows="4" placeholder="Write something..." name="messages"></textarea> 
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
</form>
<br>
    <?php echo $success ?>

</div>
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