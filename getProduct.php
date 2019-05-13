<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="a1_stytle.css">
    <title>Grocery Store</title>
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
            if(current_quantity<15){
                current_quantity++;
                element.value = current_quantity;
            }else{
                alert("The max order for each items is 15.");
            }
            break;
            case "sub":
            if(current_quantity>0)
            current_quantity--;
            element.value = current_quantity;
            break;
        }
    }
</script>
<body>
    <?php
        $pid=$_GET[pid];
        if($pid==NULL){
            echo "<h2>Choose the product from the categories on the left.</h2>";
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
                echo "<form method=\"POST\" action=\"shoppingCart.php\" target=\"shoppingCart_iframe\">";
                echo "<table id=\"product_ifo\">
                    <input type=\"hidden\" name=\"product_name\" value=\"$product_name\"/>
                    <input type=\"hidden\" name=\"unit_quantity\" value=\"$unit_quantity\"/>
                    <tr><td><h1>$product_name</h1><h3>($unit_quantity)<h3></td></tr>
                    <input type=\"hidden\" name=\"product_price\" value=\"$product_price\"/>
                    <tr><td><h2>Price: $$product_price</h2></td></tr>
                    <tr><td><h2>Quantity Available:$product_stock</h2></td></tr>
                    <tr><td>
                    <input type=\"button\" id=\"sub\" value=\"-\" onclick=\"changeQuantity(this.id)\"/>
                    <input type=\"number\" name=\"quantity\" id=\"quantity\" value=\"1\" min =\"1\" max=\"15\"/>
                    <input type=\"button\" id=\"add\" value=\"+\" onclick=\"changeQuantity(this.id)\"/>
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