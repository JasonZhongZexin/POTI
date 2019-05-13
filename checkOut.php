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
        $(document).ready(function(){
        $(window.parent.document).find("#menue_cover").hide();
        });
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
    <style>
    #product_detail {
        width:auto;
        border-collapse: collapse;
        background: #095dca;
        color: white;
        margin:auto;
    }
  
    /* #product_detail th td {
        border: 3px solid white;
        text-align: center;
    } */
    #product_detail th{
        border: 3px solid white;
        background: black;
        font-size:1em;
        text-align: center;
        color: white;
        padding-left: 1em;
        padding-right: 1em;
        padding-top:0.3em;
        padding-bottom:0.3em;
    }
    #product_detail td{
        border: 3px solid white;
        font-size:1em;
        padding-left: 1em;
        padding-right: 1em;
        padding-top:0.3em;
        padding-bottom:0.3em;
    }
    #product_detail tr:nth-child(2n){
    background:#00CCCC;
    }
    </style>
</head>
    <body>
        <div id="checkout">
            <div id="checkout_container">
       <?php
        if(isset($_SESSION['cart'])){ 
        echo "<h1>Checkout Form</h1>";
        echo"<table id=\"product_detail\">";  
        echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total cost</th></tr>";
        $productds = $_SESSION['cart'];
        $sum = 0;
        foreach($productds as $product){
            $product_name = $product['product_name'];
            $quantity = $product['quantity'];
            $price = $product['price'];
            $cost = $quantity*$price;
            $sum += $cost;
        echo "<tr><td>$product_name</td><td>$price</td><td>$quantity</td><td>$cost</td></tr>";
        }
        echo "<tr><th></th><th></th><th>Total cost</th><th>$sum</th></tr>";
        echo"</table>"
        ?>
        <br/>
        <br/>
        <h2>Delivery Details and Payment</h2>
        <!-- </h2>Please fill in your details. <span>*</span> indicates required field</h2> -->
        <form name="checkout_detail" action="process_email.php" onsubmit="return checkEmail();" method="POST">
        <table  id="delivery_detail">
        <tr><td>First Name<span>*</span></td><td><input class="detail" type="text" name = "first_name" required/></td></tr>
        <tr><td>Last Name<span>*</span></td><td><input class="detail" type="text" name = "last_name" required/></td></tr>
        <tr><td>Email Address<span>*</span></td><td><input class="detail"  id="email" type="text" name = "email" /></td></tr>
        <tr><td>Address<span>*</span></td><td><input class="detail" type="text" name = "address_line1" required/></td></tr>
        <tr><td>Suburb<span>*</span></td><td><input class="detail" type="text" name = "suburb" required/></td></tr>
        <tr><td>State<span>*</span></td><td><input class="detail" type="text" name = "state" required/></td></tr>
        <tr><td>Country<span>*</span></td><td><input class="detail" type="text" name = "country" required/></td></tr>
        <tr><td></td><td></td></tr>
    </table>
    <input type="submit" id="paurchaseBtn" name="purchase" value="Purchase"/>
    <input type="button" id="continue_shop" name="continue_shop" onclick="addMore()" value="Add more"/>
    </form>
<?php
        }else{
            echo"<h1>Your shopping cart is current empty. Please add at least 1 items first.</h1>";
            echo "<input type=\"button\" id=\"continue_shop\" name=\"continue_shop\" onclick=\"addMore()\" value=\"Add more\"/>";
        }
       ?>
       </div>
    </div>
    </body>
</html>
