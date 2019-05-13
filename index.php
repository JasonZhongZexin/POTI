<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="a1_stytle.css">
    <title>Grocery Store</title>
</head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    function showSubMenu(top)
        {
            switch(top)
            {
                case "frozen_food":
                // alert(top);
                document.getElementById("frozen_food_sub").style.display = "block";
                document.getElementById("home_health_sub").style.display = "none";
                document.getElementById("beverages_sub").style.display = "none";
                document.getElementById("pet_food_sub").style.display = "none";
                document.getElementById("fresh_food_sub").style.display = "none";
                break;
                case "fresh_food":
                // alert(top);
                document.getElementById("frozen_food_sub").style.display = "none";
                document.getElementById("home_health_sub").style.display = "none";
                document.getElementById("beverages_sub").style.display = "none";
                document.getElementById("pet_food_sub").style.display = "none";
                document.getElementById("fresh_food_sub").style.display = "block";
                break;
                case "beverages":
                // alert(top);
                document.getElementById("frozen_food_sub").style.display = "none";
                document.getElementById("home_health_sub").style.display = "none";
                document.getElementById("beverages_sub").style.display = "block";
                document.getElementById("pet_food_sub").style.display = "none";
                document.getElementById("fresh_food_sub").style.display = "none";
                break;
                case "home_health":
                // alert(top);
                document.getElementById("frozen_food_sub").style.display = "none";
                document.getElementById("home_health_sub").style.display = "block";
                document.getElementById("beverages_sub").style.display = "none";
                document.getElementById("pet_food_sub").style.display = "none";
                document.getElementById("fresh_food_sub").style.display = "none";
                break;
                case "pet_food":
                // alert(top);
                document.getElementById("frozen_food_sub").style.display = "none";
                document.getElementById("home_health_sub").style.display = "none";
                document.getElementById("beverages_sub").style.display = "none";
                document.getElementById("pet_food_sub").style.display = "block";
                document.getElementById("fresh_food_sub").style.display = "none";
                break;
            }
        }

        // function changeImage(){
        //     element = document.getElementById('product_img');
        //     element.src = "apple.png";
        //     element.style.display = "inline-block";
        // }
        function updateProduct(pid){
            element = document.getElementById('product_iframe');
            var src = "getProduct.php?pid="+pid;
            element.src = src;
        }
</script>
<script src="./jQuery/jQuery-rwdImageMaps-1.6/jquery.rwdImageMaps.min.js"></script>
<script>
    $(document).ready(function() {
        //resizeImage();
        $('img[usemap]').rwdImageMaps();
        });
</script>
<body>
<div class = "left_hand_frame" >
    <div id = "menue_container" >
        <div id = "menue_content">
            <h3 id = "title">Please select a category:</h3>
            <img src="./res/top_catalogue.png" alt="top catalogue" usemap="#topCatalogue" class = "menu"/>
            <img src="./res/fresh_food.png" id="fresh_food_sub" alt="top catalogue" usemap="#fresh_food_sub_map" class = "menu" style="display:none;"/>
            <img src="./res/frozen_food.png" id="frozen_food_sub" alt="top catalogue" usemap="#frozen_food_sub_map" class = "menu" style="display:none"/>
            <img src="./res/home_health.png" id="home_health_sub" alt="top catalogue" usemap="#home_health_sub_map" class = "menu" style="display:none"/>
            <img src="./res/pet_food.png" id="pet_food_sub" alt="top catalogue" usemap="#pet_food_sub" class = "menu" style="display:none"/>
            <img src="./res/beverages.png" id="beverages_sub" alt="top catalogue" usemap="#beverages_sub_map" class = "menu" style="display:none"/>
            <map name="topCatalogue">
                <area  alt="frozen_food" shape="rect" id="frozen_food" coords="9,217,137,281" onmouseover="showSubMenu('frozen_food')"/>
                <area  alt="fresh_food" shape="rect" id="fresh_food" coords="159,216,285,280" onmouseover="showSubMenu('fresh_food')"/>
                <area  alt="beverages" shape="rect" id="beverages" coords="306,217,434,281" onmouseover="showSubMenu('beverages')"/>
                <area  alt="home_health" shape="rect" id="home_health" coords="455,216,585,281" onmouseover="showSubMenu('home_health')"/>
                <area  alt="pet_food" shape="rect" id="pet_food" coords="604,217,732,281" onmouseover="showSubMenu('pet_food')"/>
            </map>
            <map name = "frozen_food_sub_map">
                <area  alt="" shape="rect" coords="10,205,138,267" onclick = "updateProduct('1002')"/>
                <area  alt="" shape="rect" coords="97,388,225,452" onclick = "updateProduct('1000')"/>
                <area  alt="" shape="rect" coords="241,389,369,453" onclick = "updateProduct('1001')"/>
                <area  alt="" shape="rect" coords="305,207,433,271" onclick = "updateProduct('1003')"/>
                <area  alt="" shape="rect" coords="396,387,524,451" onclick = "updateProduct('1004')"/>
                <area  alt="" shape="rect" coords="543,387,671,451" onclick = "updateProduct('1005')"/>
            </map>
            <map name = "fresh_food_sub_map">
                <area  shape="rect" coords="7,203,109,268" onclick = "updateProduct('3002')"/>
                <area  shape="rect" coords="53,387,182,453" onclick = "updateProduct('3000')"/>
                <area  shape="rect" coords="200,387,329,453" onclick = "updateProduct('3001')"/>
                <area  shape="rect" coords="223,201,321,266" onclick = "updateProduct('3003')"/>
                <area  shape="rect" coords="333,203,431,266" onclick = "updateProduct('3004')"/>
                <area  shape="rect" coords="441,203,539,266" onclick = "updateProduct('3006')"/>
                <area  shape="rect" coords="551,203,649,266" onclick = "updateProduct('3007')"/>
                <area  shape="rect" coords="654,203,755,263" onclick = "updateProduct('3005')"/>
            </map>
            <map name = "beverages_sub_map">
                <area  shape="rect" coords="249,380,348,445" onclick = "updateProduct('4000')"/>
                <area  shape="rect" coords="358,379,457,444" onclick = "updateProduct('4001')"/>
                <area  shape="rect" coords="467,380,566,445" onclick = "updateProduct('4002')"/>
                <area  shape="rect" coords="32,380,131,443"  onclick = "updateProduct('4003')"/>
                <area  shape="rect" coords="139,381,240,443" onclick = "updateProduct('4004')"/>
                <area  shape="rect" coords="613,212,740,274" onclick = "updateProduct('4005')"/>
            </map>
            <map name = "home_health_sub_map">
                <area shape="rect" coords="95,388,226,453" onclick = "updateProduct('2000')"/>
                <area  shape="rect" coords="243,388,374,453" onclick = "updateProduct('2001')"/>
                <area  shape="rect" coords="8,200,139,265" onclick = "updateProduct('2002')"/>
                <area  shape="rect" coords="398,387,526,448" onclick = "updateProduct('2003')"/>
                <area  shape="rect" coords="546,388,674,449" onclick = "updateProduct('2004')"/>
                <area  shape="rect" coords="307,203,435,267" onclick = "updateProduct('2005')"/>
                <area  shape="rect" coords="605,204,733,268" onclick = "updateProduct('2006')"/>
            </map>
            <map name = "pet_food_sub">
                <area  shape="rect" coords="399,387,524,449" onclick = "updateProduct('5001')"/>
                <area  shape="rect" coords="546,387,671,449" onclick = "updateProduct('5000')"/>
                <area  shape="rect" coords="158,203,283,265" onclick = "updateProduct('5002')"/>
                <area  shape="rect" coords="308,202,437,268" onclick = "updateProduct('5003')"/>
                <area  shape="rect" coords="606,203,735,269" onclick = "updateProduct('5004')"/>
            </map>
        </div>
    </div>
</div>

<div class="right_frame">
    <div class="top_right_hand_frame">
        <!-- <div id="p_img"><img id="product_img" src="" alt="fresh food apple" width="40%" height="40%"/></div>
        <div id="p_att"><input id="add_button" type="button" name="add" value="Add" ></div> -->
        <iframe src="getProduct.php" id="product_iframe" name="product_iframe" width="100%" height="100%" frameborder="0" scrolling="yes">
            <p>Your web broser do not suppor iframe tag.</p>
        </iframe>
    </div>
    <div class="bottom_right_hand_frame">
        <iframe src="shoppingCart.php" name="shoppingCart_iframe" id="shoppingCart_iframe" width="100%" height="100%" frameborder="0" scrolling="yes">
            <p>Your web broser do not suppor iframe tag.</p>
        </iframe>
    </div>
</div>

</body>
</html>