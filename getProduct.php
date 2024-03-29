<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="a1_stytle.css">
    <title>Grocery Store</title>
    <style>
    #product_ifo {
        width:70%;
        border-collapse: collapse;
        background:#00ff80;
    }
  
    #product_ifo, th,td {
        border: 1px solid white;
        /* padding-right: 2em; */
        padding-top: 0.5em;
        /* padding-left:1em; */
        padding-bottom: 0.5em;
    }
    td{
        padding-left:10%;
    }
    th{
        background: black;
        color: white;
    }
    </style>
</head>
<script>
    function changeQuantity(id){
        // alert(id);
        element = document.getElementById('quantity');
        var element_value = element.value;
        if(element_value==""){
            element_value ="0";
        }
        var current_quantity = parseInt(element_value,10);
        switch(id){
            case "add":
            if(current_quantity<20){
                current_quantity++;
                element.value = current_quantity;
            }else{
                alert("The maximum quantity for each product is 20 per order.");
            }
            break;
            case "sub":
            if(current_quantity>0)
            current_quantity--;
            element.value = current_quantity;
            break;
        }
    }
    function checkQuantity(){
        var quantity = document.getElementById("quantity");
        if(quantity.value>20){
        alert("The maximum quantity for each product is 20 per order.");
        quantity.focus();
        return false;
        }
        return true;
    }
</script>
<body>
    <?php
        $pid=$_GET[pid];
        if($pid==NULL){
            echo "<div id=\"product_init\">Choose the product from the categories on the left.</div>";
        }else{
            require_once "db_settings.inc" ;
            $db = new mysqli(HOST,USER,PASS,DB);
            if(mysqli_connect_errno()){
            echo "db connect fail";
            exit;
            }
            $result = $db->query("select * from products where product_id = $pid;");
            $num_rows = mysqli_num_rows($result);
            if($num_rows > 0){
                while($a_row = $result->fetch_assoc()){
                    $product_name = $a_row['product_name'];
                    $unit_quantity = $a_row['unit_quantity'];
                    $product_stock = $a_row['in_stock'];
                    $product_price = $a_row['unit_price'];
                }
                echo "<form method=\"POST\" onsubmit=\"return checkQuantity();\" action=\"shoppingCart.php\" target=\"shoppingCart_iframe\">";
                echo "<table id=\"product_ifo\">
                    <input type=\"hidden\" name=\"product_name\" value=\"$product_name\"/>
                    <input type=\"hidden\" name=\"unit_quantity\" value=\"$unit_quantity\"/>
                    <tr><th><h1>$product_name</h1><h3>($unit_quantity)<h3></th></tr>
                    <input type=\"hidden\" name=\"product_price\" value=\"$product_price\"/>
                    <tr><td><h2>Price: $$product_price</h2></td></tr>
                    <tr><td><h2>Quantity Available:$product_stock</h2></td></tr>
                    <tr><td>
                    <input type=\"button\" id=\"sub\" value=\"-\" onclick=\"changeQuantity(this.id)\"/>
                    <input type=\"number\" name=\"quantity\" id=\"quantity\" value=\"1\" min =\"1\" max=\"100\" required/>
                    <input type=\"button\" id=\"add\" value=\"+\" onclick=\"changeQuantity(this.id)\"/>(Max:20)
                    </td></tr>
                    <tr><td>
                    <input id=\"paurchaseBtn\" type=\"submit\" id=\"submit\" value=\"Add\"/>
                    </td></tr>
                    </table>";
                echo "</form>";
            }           
        }
    ?>
</body>
</html>