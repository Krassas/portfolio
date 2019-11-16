<html> 
 <head> 
 <title>Contact Me</title>
 <style>
 .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-left: 40%;
  
 }
 span {
	 margin-left: 39%;
 }
</style>
 </head>
 <body>
 
 
 
<?php
/* verify captcha */
$secret = ''; /*Enter secret site key here*/
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
$verify = json_decode(file_get_contents($url));

/* process the form */
if ($verify->success) {
  $to = "example@mail.com";/*Enter email here*/ 
  $subject = "Contact Form";
  $message = "Name - " . $_POST['name'] . "\r\n";
  $message = "Surname - " . $_POST['surname'] . "\r\n";
  $message = "Phone - " . $_POST['phone'] . "\r\n";
  $message .= "Email - " . $_POST['email'] . "\r\n";
  $message .= "Message - " . $_POST['message'] . "\r\n";
  if (@mail($to, $subject, $message)) {
    /* Send mail OK */
    
	echo "<span>Message sent successfully</span>";
  } else {
    /* Send mail error */
    
	echo "<span>Please try again</span>";
  }
} else {
  /* Invalid captcha */
  
  echo "<span>Invalid captcha, please try again</span>";
}

?>
 </br>
 <a href="#index" class="button">Back to Portfolio</a>
 </body>
</html>