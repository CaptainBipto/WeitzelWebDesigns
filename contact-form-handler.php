<?php 
$errors = '';
$myemail = 'norm@weitzelwebdesigns.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: postContact.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Oh No!</title>
  <link rel="shortcut icon" href="favicon2.ico"/>
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/stylesheet.css">
  <script src="js/vendor/custom.modernizr.js"></script>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<!-- Original error page<?php
echo nl2br($errors);
?> End orignial error page -->

<div id="bodyWrapper">
			  <!-- Header and Nav -->

  <div class="row">
    <div class="large-3 columns">
     <a href="index.html"><h1><img src="img/logo.png"></h1></a>
    </div>
    <div class="large-9 columns">
      <ul class="button-group right">
        <!-- <li><a href="contact.html" class="button">Contact Us</a></li> --> 
        <li><a href="index.html" class="button">Home</a></li>
        <li><a href="portfolio.html" class="button">Portfolio</a></li> 
      </ul>
    </div>
  </div>

  <!-- End Header and Nav -->
  
		<div id="thankYouMessage" class="row">
			<h1>There was an error, and your email was not sent.</h1>
				
			<p>Please make sure you entered a valid email address and try again.</p>
		</div>
		
					<form name="redirect">
						<div align="center">
							<h4>You will be redirected to the home page in</h4>
							<form>
								<input style="text-align: center; font-size:2em; margin-bottom:0;" type="text"  name="redirect2">
							</form>
							<h4>seconds</h4>
						</div>
							
						<script>
							
							
							/*
							Count down then redirect script
							By JavaScript Kit (http://javascriptkit.com)
							Over 400+ free scripts here!
							*/
							
							//change below target URL to your own
							var targetURL="index.html";
							//change the second to start counting down from
							var countdownfrom=10;
							
							
							var currentsecond=document.redirect.redirect2.value=countdownfrom+1;
							function countredirect(){
							if (currentsecond!=1){
							currentsecond-=1;
							document.redirect.redirect2.value=currentsecond;
							}
							else{
							window.location=targetURL;
							return;
							}
							setTimeout("countredirect()",1000);
							}
							
							countredirect();
							//-->
							</script>
						
					</form>
					
	</div>



	




</body>
</html>