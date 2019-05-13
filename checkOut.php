<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="a1_stytle.css">
    <title>Grocery Store</title>
    <style>
    span {
        color:red;
    }
</style>
<script>
function checkEmail(){
    var email = document.getElementById("email");
    if(trim(email.value)==null || trim(email.value)==""||!validateEmail(email.value)){
        alert("Invalid email address. Please enter a valid email address.");
        email.focus();
        return false;
        }
        return true;
}
function trim(str){
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(window.parent.document).find("#menue_cover").show();
    });
    function addMore(){
        $(document).ready(function(){
        $(window.parent.document).find("#menue_cover").hide();
        });
        window.location.href = "getProduct.php";
    }
</script>
</head>
    <body>
       <?php
        if(isset($_SESSION['cart'])){ ?>
        <h2>Delivery Details and Payment</h2>
        </h2>Please fill in your details. <span>*</span> indicates required field</h2>
        <form name="checkout_detail" action="process_email.php" onsubmit="return checkEmail();" method="POST">
        <table>
        <tr><td>First Name<span>*</span></td><td><input type="text" name = "first_name" required/></td></tr>
        <tr><td>Last Name<span>*</span></td><td><input type="text" name = "last_name" required/></td></tr>
        <tr><td>Email Address<span>*</span></td><td><input id="email" type="text" name = "email" /></td></tr>
        <tr><td>Address Line1<span>*</span></td><td><input type="text" name = "address_line1" required/></td></tr>
        <tr><td>Address Line2</td><td><input type="text" name = "address_line2"/></td></tr>
        <tr><td>Suburb<span>*</span></td><td><input type="text" name = "suburb" required/></td></tr>
        <tr><td>State<span>*</span></td><td><input type="text" name = "state" required/></td></tr>
        <tr><td>Country<span>*</span></td><td><input type="text" name = "country" required/></td></tr>
        <tr><td></td><td></td></tr>
    </table>
    <input type="submit" id="paurchaseBtn" name="purchase" value="Purchase"/>
    <input type="button" id="continue_shop" name="continue_shop" onclick="addMore()" value="Add more"/>
        <?php
            $productds = $_SESSION['cart'];
            $sum = 0;
            foreach($productds as $product){
                $quantity = $product['quantity'];
                $price = $product['price'];
                $sum += $quantity*$price;
            }
            echo "<h1>The total price is \$$sum.</h1>";
            echo "</form>";
        }else{
            echo"<h1>Your shopping cart is current empty. Please add at least 1 items first.</h1>";
        }
       ?>
    </body>
</html>
