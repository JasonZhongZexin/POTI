<?php
    session_start();
    ini_set("display_errors","On");
    error_reporting(E_ALL);
?>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="a1_stytle.css">
    </head>
    <body>
        <p>
        <?php
        $first_name=$_REQUEST['first_name'];
        $email=$_REQUEST['email'];
        $subject = "NEW ORDER INFO"; 
        $from = "zexin.zhong-1@student.uts.edu.au";
        $content = "Dear " . $first_name .",<br><br>Thanks for shopping with us. Your order has been processed. Here is the detail of your order.<br>";
        if(isset($_SESSION['cart'])){ 
            $content .= "<table id=\"product_detail\">";  
            $content .=  "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total cost</th></tr>";
            $productds = $_SESSION['cart'];
            $sum = 0;
            foreach($productds as $product){
                $product_name = $product['product_name'];
                $quantity = $product['quantity'];
                $price = $product['price'];
                $cost = $quantity*$price;
                $sum += $cost;
                $content .=  "<tr><td>$product_name</td><td>$price</td><td>$quantity</td><td>$cost</td></tr>";
            }
            $content .=  "<tr><th></th><th></th><th>Total cost</th><th>$sum</th></tr>";
            $content .= "</table>";
            $content .="<style>";
            $content .= "#product_detail {";
            $content .= "width:auto;";
            $content .= "border-collapse: collapse;";
            $content .= "background: #095dca;";
            $content .= "color: white;";
            $content .= "margin:auto;";
            $content .= "}";
  
            $content .= "/* #product_detail th td {";
            $content .= "border: 3px solid white;";
            $content .= "text-align: center;";
            $content .= "} */";
            $content .= "#product_detail th{";
            $content .= "border: 3px solid white;";
            $content .= "background: black;";
            $content .= "font-size:1em;";
            $content .= "text-align: center;";
            $content .= "color: white;";
            $content .= "padding-left: 1em;";
            $content .= "padding-right: 1em;";
            $content .= "padding-top:0.3em;";
            $content .= "padding-bottom:0.3em;";
            $content .= "}";
            $content .= "#product_detail td{";
            $content .= "border: 3px solid white;";
            $content .= "font-size:1em;";
            $content .= "padding-left: 1em;";
            $content .= "padding-right: 1em;";
            $content .= "padding-top:0.3em;";
            $content .= "padding-bottom:0.3em;";
            $content .= "}";
            $content .= "#product_detail tr:nth-child(2n){";
            $content .= "background:#00CCCC;";
            $content .= "}";
            $content .= "</style>";
            $content .="<br><br>Regards,<br>POTI Grocery Shop";
        }
        
        session_destroy();
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    if(($first_name!=NULL||$first_name!="")&& ($email!=NULL||$email!="")){
        mail($email,$subject,$content,$headers);
        echo "<br> <div id=\"order_email\">Thanks for shopping with us. <br>Your order has been processed and a confirmation email has been send to $email</div>";
    }
?>
</p>
<form action="shoppingCart.php?clear=true" target="shoppingCart_iframe"></form>
        <script>
            $("form").submit();
        </script>
</body>
</html>