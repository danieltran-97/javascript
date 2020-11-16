<?php
    session_start();
    foreach($_SESSION["reservations"] as $keys => $values) {
        $details .=  $values["selectedCar"]." $".$values["price"]."x".$values["rentalDays[]"]."= $". number_format($values["rentalDays[]"] * $values["price"], 2)."<br>";
        $total = $total + ($values["rentalDays[]"] * $values["price"]);
    }
    $to = $_POST["email"];
    $subject = 'Order Confirmation';
    $message = "Thankyou for your order! ". $_POST["firstname"]."<br> Your total cost is $". $total ."<br> Your address is: ". $_POST["address"]."<br>"."Invoice: ".$details."Have a nice day!<br>";
    $headers = "From: no-reply@dgroceries.com";
    mail($to,$subject,$message,$headers);
    $success = mail($to,$subject,$message, $headers);
    if (!$success) {
        $output = "Email could not be sent";
    }
    else{
        $output = "Your reservation has been confirmed.<br> Thankyou for renting with Hertz Car Rentals.! <br> <h5 style='font-family:arial;'>An invoice has been sent to your email address. </h5>";
    }

?>

<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="ass2.css">
<title>Hertz Car Rental</title>

<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="index.php"><img src="pics/hertz.png"></a>
  <span style="color:#120efb;"><h1> Car Rental Center</h1></span>
  <a href="index.php" class="btn btn-primary my-2 my-sm-0">Back to Car Selection</a>
</nav>
</head>
<div class="center">


    <h3><?php echo $output?></h3>

</div>
    <script>
        document.getElementById('complete').click();
    </script>
    <?php
        session_destroy();
    ?>
</body>
</html>
