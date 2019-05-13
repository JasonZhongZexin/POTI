<?php
    session_start();
    $quantity = $_REQUEST['quantity'];
    $price = $_REQUEST['product_price'];
    $product_name = $_REQUEST['product_name'];
    $unit_quantity = $_REQUEST['unit_quantity'];
    if($quantity != NULL && $price != NULL && $product_name != NULL && $unit_quantity != NULL &&$quantity>0 ){
        if(!isset($_SESSION['cart'])||empty($_SESSION['cart'])){
            $product = array('product_name' => $product_name ,'unit_quantity' => $unit_quantity,'price' => $price,'quantity' => $quantity);
            $products = array($product_name . $unit_quantity => $product);
            $_SESSION['cart'] = $products;
            //$q = $_SESSION['cart'][$product_name]['quantity'];
            showCart();
        }else{
            $products = $_SESSION['cart'];
            //check if the product exists in the cart
            if(array_key_exists($product_name . $unit_quantity,$products)){
                $product = $products[$product_name . $unit_quantity];
                $product['quantity'] = ($product['quantity'])+$quantity;
                $products[$product_name . $unit_quantity] = $product;
                $_SESSION['cart'] = $products;
                showCart();
            }else{
                $product = array('product_name' => $product_name ,'unit_quantity' => $unit_quantity,'price' => $price,'quantity' => $quantity );
                //$products = $_SESSION['carts'];
                $products[$product_name . $unit_quantity] = $product;
                $_SESSION['cart'] = $products;
                showCart();
            }
        }
    }else{
        $clear = $_REQUEST['clear'];
        if($clear!=NULL && strcmp($clear,'true')==0){
            if(session_destroy()){
                echo "<html><body><head></head>";
                echo "<h2>All itmes have been removed.</h2><link rel=\"stylesheet\" type=\"text/css\" href=\"a1_stytle.css\">";
                flush();
            }
        }
        else if(isset($_SESSION['cart'])){
            showCart();
        }else{
            showCart();
        }
    }

    /**
     * this function will check if the shopping cart is set and not empty.
     * if the cart is set and not empty, list all item and the check out, clear button. 
     * Otherwise, print out the empty message. 
     */
    function showCart(){?>
    <html>
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="a1_stytle.css">
    <title>Grocery Store</title>
    <script>
    function clearCart(){
        if(confirm("Clear Cart will remove all items in the shopping cart. Are you sure to clear cart ? ")){
            window.location.href = "shoppingCart.php?clear=true";
        }
    }
    </script>
    <style>
    #product_detail {
        width:100%;
        border-collapse: collapse;
        background: #095dca;
        color: white;
    }
  
    #product_detail, th,td {
        border: 3px solid white;
        /* padding-right: 2em; */
        padding-top: 0.5em;
        /* padding-left:1em; */
        padding-bottom: 0.5em;
        text-align: center;
    }
    th{
        background: black;
        font-size:1.5em;
        color: white;
    }
    td{
        font-size:1.2em;
    }
    tr:nth-child(2n){
    background:#00CCCC;
    }
    </style>
    </head>    
    <body>
            <div class = "cart">
    <?php
        if(isset($_SESSION['cart'])){
            echo "<form mehtod = \"POST\" action = \"checkOut.php\" target = \"product_iframe\">";
            echo "<table id=\"product_detail\">";
            echo "<tr><th>Product Name</th><th>Unit Quantity</th><th>Price</th><th>Quantity</th></tr>";
            $sum = 0;
            foreach($_SESSION['cart'] as $product){
                echo"<tr>";
                $quantity = $product['quantity'];
                $price = $product['price'];
                $sum += $quantity*$price;
                foreach($product as $value){
                    echo "<td>$value</td>";
                }
                echo"</tr>";
            }
            echo "<tr> <th></th><th></th><th>Total</th><th>$$sum</th></tr>";
?>
            </table>
        </div>
        <input type="submit" id="paurchaseBtn" value = "Check Out"/>
        <input type="button" id="clear" value = "Clear Cart" onclick="clearCart()"/>
        </form>
        <?php }else{
            echo "<h2>Your shopping cart is empty. Please select and add an item to the cart.</h2>";
        }
    } ?>
    </body>
</html>