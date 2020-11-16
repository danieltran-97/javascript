<?php
session_start();
$_SESSION['check'] = 1;

 $_POST['total_price'];


 $_POST['rentalDays'][1];



$total = 0;
for ($t = 0; $t < count($_POST['rentalDays']); $t++) {
    $total = $total + ($_POST['rentalDays'][$t] * $_POST['price'][$t]);
}
?>

<html>
<head>
  <title>Hertz Car Rental</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="ass2.css">
</head>


<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="index.php"><img src="pics/hertz.png"></a>
  <span style="color:#120efb;"><h1> Car Rental Center</h1></span>
  <a href="cart.php" class="btn btn-warning my-2 my-sm-0">My Reservations</a>
</nav>

<title>Checkout</title>
  <style>
    #center{text-align: center;}

    .details {
       border: 2px solid #CCCCCC;
       border-collapse: collapse;
       font-family: arial;
    }

    .lightgrey {
      background-color: #e0e0e0;
    }


    .button {
      background-color: #2e99f2;
      color: white;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
    }

    th,td,p,h3  {font-family: Arial;}
  </style>
  </head>

  <div class="center">
<body>
  <h3>Details and Payment</h3>
  <p>Please fill the required fields<span style="color:#f7bb07">* </span></p>

      <form action="sendreservation.php" method="POST" onsubmit="return verify()">
          <table>

              <tr>
                  <td> Full Name: <span style="color:#f7bb07">* </span></td>
                  <td><input type="text" name="fullname" id="fullname" size="55" placeholder="John M. Doe" required ></td>
              </tr>

              <tr>
                  <td> Address: <span style="color:#f7bb07">* </span></td>
                  <td><input type="text" name="address" id="address" size="55" placeholder="Anonymous street" required ></td>
              </tr>
              <tr>
                  <td> Suburb: <span style="color:#f7bb07">* </span></td>
                  <td><input type="text" name="suburb" id="suburb" size="55" placeholder="Beverly Hills" required ></td>
              </tr>
              <tr>
                  <td> State/Territory: <span style="color:#f7bb07">* </span></td>
                  <td><select name="country" id="country" required >
                    <option value="" selected="plsselect">--- Please Select state or territory ---</option>
                    <option value="ACT">Australian Capital Territory</option>
                    <option value="NSW">New South Wales</option>
                    <option value="QLD">Queensland</option>
                    <option value="SA">South Australia</option>
                    <option value="WA">Western Australia </option>
                    <option value="NT">Northern Territory</option>
                    <option value="TAS">Tasmania</option>
                    <option value="VIC">Victoria</option>
                  </select></td>
              </tr>
              <tr>
                  <td> Postcode: <span style="color:#f7bb07">* </span></td>
                  <td><input type="text" name="postcode" id="postcode" size="55" placeholder="8888" required ></td>
              </tr>
              <tr>
                  <td> Email: <span style="color:#f7bb07">* </span></td>
                  <td><input type="email" name="email" id="email" size="55" placeholder="john_doe@outlook.com" required ></td>
              </tr>
              <tr>
                    <td> Payment Method: <span style="color:#f7bb07">* </span></td>
                    <td><select name="payment" id="payment" required >
                      <option value="" selected="plsselect">--- Please Select payment method ---</option>
                      <option value="debit">Debit</option>
                      <option value="credit">Credit</option>
                      <option value="paypal">PayPal</option>
                      <option value="afterpay">Afterpay </option>
                    </select></td>
              </tr>
            </table>
            <br>
            <span class="total">Your subtotal is: <?php print "$".$total; ?></span>
            <br>
            <td><input class="button" type="submit" id="pay" name="pay" value="Confirm Order"></td>
        </form>
        </div>
</body>
</html>

<script type="text/javascript">
    function verify(){
        var fullName = document.getElementById('fullname').value;
        var address = document.getElementById('address').value;
        var suburb = document.getElementById('suburb').value;
        var state = document.getElementById('state').value;
        var postcode = document.getElementById('postcode').value;
        var email = document.getElementById('email').value;
        var emailFilter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

        if (!fullName || !address || !suburb || !state || !postcode ||!email) {
            alert("Please fill in required fields...");
            return false;
        }

        if(!(email.match(emailFilter))) {
            alert("Email Address does not exist");
            return false;
        }
        else {
            return true;
        }

    }
</script>
