<?php
session_start();
$correct_id;
$correct = false;


if(!empty($_POST['Clear'])) {
    session_destroy();
}

if (!empty($_POST["addtocart"]) && !empty($_POST["amount"])) {
    if (!isset($_SESSION["shoppingcart"])) {
        $item_array = array(
            'id' => $_POST["itemID"],
            'name' => $_POST["itemName"],
            'price' => $_POST["itemPrice"],
            'quantity' => $_POST["amount"]
        );
        $_SESSION["shoppingcart"][0] = $item_array;
    }
    else {
        foreach($_SESSION["shoppingcart"] as $v) {
            if ($v['id'] == $_POST["itemID"]) {
                $correct = true;
                $correct_id = $v['id'];
                break;
            }

         }

        if(!$correct) {
            $count = count($_SESSION["shoppingcart"]);
            $item_array = array(
                'id' => $_POST["itemID"],
                'name' => $_POST["itemName"],
                'price' => $_POST["itemPrice"],
                'quantity' => $_POST["amount"]
            );
            $_SESSION["shoppingcart"][$count] = $item_array;
            //$_SESSION["shoppingcart"] = $item_array;
    }
        else {
            $curr_qty =$_POST["amount"];

            for ($i=0; $i < count($_SESSION["shoppingcart"]); $i++) {
                if ($_SESSION["shoppingcart"][$i]["id"] == $correct_id ) {
                    $curr_qty =$_POST["amount"];
                    $_SESSION["shoppingcart"][$i]["quantity"] = doubleval($_SESSION["shoppingcart"][$i]["quantity"]) + doubleval($curr_qty);
                    $correct = false;
                }
            }
        }
    }
}

else if  (!empty($_POST["amount"])){
    print "<script>alert('Please Enter an Amount')</script>";
}
?>
