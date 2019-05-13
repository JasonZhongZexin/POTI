<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test db php page</title>
</head>
<body>
    <?php
    require_once "db_settings.inc" ;
    $db = new mysqli(HOST,USER,PASS,DB);
    if(mysqli_connect_errno()){
        echo "db connect fail";
        exit;
    }
    $result = $db->query("select * from products;");
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
        echo"<table border =1>";
        while($a_row = $result->fetch_row()){
            echo"<tr>";
            foreach($a_row as $field){
                echo "<td>$field</td>";
            }
            echo"</tr>";
        }
        echo"</table>";
        echo"total: $num_rows items";
    }
    ?>
</body>
</html>