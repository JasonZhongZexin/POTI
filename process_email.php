<?php
    session_start();
    ini_set("display_errors","On");
    error_reporting(E_ALL);
    session_destroy();
?>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <p>
        <?php
        $first_name=$_REQUEST['first_name'];
        $email=$_REQUEST['email'];

    function send_email($toEmail,$first_name)
    {
    // require_once('./PHPMailer-5.2.27/class.phpmailer.php');
    // require_once('./PHPMailer-5.2.27/class.smtp.php');
    // $mail = new PHPMailer();
    // $mail->IsSMTP(); 
    // $mail->Host = "smtp.gmail.com";            //smtp host
    // $mail->Port = 465;                        //email port 
    // $mail->SMTPAuth   = true;                //allow smtp
    // $mail->CharSet  = "UTF-8";               //encoding format
    // $mail->Encoding = "base64";              //encoding format
    // $mail->IsHTML(true);                     //support html
 
     
    // $mail->Username = "";      //email username
    // $mail->Password = "";      //email password
    // $mail->From     = "";      //from
    // $mail->SMTPSecure = 'ssl'; 
     
    // $mail->FromName = "POIT GROCERY STORE";             //from
    // $mail->AddAddress($toEmail);             //to
 
    // email subject
    $subject = 'NEW ORDER INFO'; 
    // $mail->Subject = $subject; 
 
    // email content
    $content = "Dear " . $first_name . ", <br>Thanks for shopping with us. Your order has been processed. Here is the detail of your order.<br>";
    // $mail->Body = $content;
    $headers = "POIT GROCERY STORE";
    mail($toEmail,$subject,$content,$headers);
 
    //send eamil
    // if(!$mail->Send()) {
    //       return false;
    // }else{
    //       return true;
    // }
    }

    if(($first_name!=NULL||$first_name!="")&& ($email!=NULL||$email!="")){
        // sendEmail($email,$first_name);
        send_email($email, $first_name);
        // if($status){
        //     echo 'email has sent';
        // }else{
        //     echo 'fail to send the email';
        // }
        echo "<br> <h2>Thanks for shopping with us. Your order has been processed and a confirmation email has been send to $email<h2>";
    }
?>
</p>
<form action="shoppingCart.php?clear=true" target="shoppingCart_iframe"></form>
        <script>
            $("form").submit();
        </script>
</body>
</html>