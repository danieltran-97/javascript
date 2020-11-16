<?php
    session_start();
    $identified = false;

    if (!empty($_POST["reserve"]) && !empty($_POST["numDays"])) {
        if (!isset($_SESSION["reservations"])) {
            $item_array = array(
                'model' => $_POST["model"],
                'selectedCar' => $_POST["selectedCar"],
                'price' => $_POST["price"],
                'numDays' => $_POST["numDays"]
            );
            $_SESSION["reservations"][0] = $item_array;
            print "<script>location.replace('index.php')</script>";

        } else {
            foreach($_SESSION["reservations"] as $values) {
                if ($values['model'] == $_POST["model"]) {
                    $identified = true;
                    break;
                }
            }

            if(!$identified) {
                $count = count($_SESSION["reservations"]);
                $item_array = array(
                    'model' => $_POST["model"],
                    'selectedCar' => $_POST["selectedCar"],
                    'price' => $_POST["price"],
                    'numDays' => $_POST["numDays"]
                );
                $_SESSION["reservations"][$count] = $item_array;
                print "<script>location.replace('index.php')</script>";
            } else {
                print "<script>alert('Car has already been reserved.')</script>";
                }
            }
        }

        if (isset($_GET['remove'])) {
            if ($_GET['remove'] == 'delete') {
                foreach($_SESSION["reservations"] as $keys => $values) {
                    if($values["model"] == $_GET["id"]) {
                        unset($_SESSION["reservations"][$keys]);
                        echo "<script>alert('Car has been removed from reservation')</script>";
                    }
                }
            }
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


<div class ="center">
<body>
    <div style="clear:both"></div>
    <br />
        <?php
        if(!empty($_SESSION["reservations"])) {
        ?>
        <h3>My Reservations</h3>
        <div class="table-responsive">
        <form action="checkout.php" method="post" id="chkout_form" onsubmit="return(validateInput());">
        <table class="table">
        <tr class="bg-primary text-white">
            <th width="35%">Thumbnail</th>
            <th width="20%">Car</th>
            <th width="20%">Price Per Day</th>
            <th width="20%">Rental Days</th>
            <th width="15%" style="background-color: red;">Delete</th>
        </tr>
        <?php
            foreach($_SESSION["reservations"] as $keys => $values) {
                $i += 1;
        ?>
        <tr class="bg-light text-dark">
            <td><img src="pics/<?php print $values["model"];?>.jpg" id="carImage" alt="Item Image" style="width:90px;height:70px;"></td>
            <td><?php print $values["selectedCar"];?></td>
            <td><?php print "$".$values["price"];?><input type="hidden" name="price[]" value="<?php print $values["price"];?>"></td>
            <td><input class="form-control" placeholder="Add Days" type="number" name="rentalDays[]" id="rentalDays<?php print $i;?>"></td>
            <td><a href="cart.php?remove=delete&id=<?php print $values["model"]; ?>">
            <img src="pics/bin.png" usemap="#image-map" style="width:30px;height:30px;" align="center">
            <map name="image-map">
                <area alt="remove" coords="91,80,24,16" shape="rect">
              </map>
            </a>
            </td>
            <input type="hidden" name="numDays[]" value="<?php print $values["numDays"];?>">
        </tr>




        <?php
        }
        ?>
        <tr>
            <td>
                <input type="hidden" name="totalDays" value="rentalDays[]">
                <input type="hidden" name="carPrice" value="price[]">
                <input type="hidden" name="carType" value="numDays[]">
                <input type="submit" id="checkOut" name="checkOut" class="btn btn-success" value="Check Out" onclick="return validateInput()">
                <a href="index.php" class="btn btn-primary">Continue Browsing</a>
            </td>
        </tr>
        </form>
        <?php
        }
        if (empty($_SESSION["reservations"])) {
            echo "<script>alert('No cars have been reserved')</script>";
            echo "<script>location.replace('index.php')</script>";
        }
        ?>
    </table>
    </div>
</body>
</div>



<script type="text/javascript">
    function validateInput() {
        var days = document.getElementById('rentalDays<?php print $i;?>').value;
        if (days < 0){
            if (days < 0) {
                alert("Rental days cannot be negative.");
                return false;
            } else if (days == 0 || days == null) {
                alert("Please enter amount of days.");
                return false;
              }
           else {
             window.location.href = "checkout.php";
             return true;
           }

         }
  }


</script>
</html>
