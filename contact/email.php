<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@techmoxy.com";
    $email_subject = "Email from client";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $first_name = $_POST['first_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Contact Number: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div class="container">
  <nav class="navbar navbar-default" style="background-color: #ffffff; border: none;" >
    <div class="navbar-header">
    	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="../index.html" style="height: 54px; padding: 11px 15px;"><img src="../images/logo.png"/></a>
	</div>

	<div class="collapse navbar-collapse js-navbar-collapse">
		<ul class="nav navbar-nav">
            <li class="dropdown mega-dropdown nav-topmenu">
    			<a href="#" class="dropdown-toggle " data-toggle="dropdown">Services</a>
				<ul class="dropdown-menu mega-dropdown-menu">
					<li class="col-sm-3">
    					<ul>
							<li class="dropdown-header">COMPUTER HELP</li>
							<li><a href="../data/data.html">Data</a></li>
                            				<li><a href="../email/email.html">E-Mail</a></li>
                            				<li><a href="../harddrive/harddrive.html">Hard Drive</a></li>
							<li><a href="../computersetup/computersetup.html">Computer Setup</a></li>
                            				<li><a href="../os/os.html">Operating System (OS)</a></li>
                            				<li><a href="../printer/printer.html">Printer</a></li>
							<li><a href="../software/software.html">Software</a></li>
                         				<li><a href="../training/training.html">Training</a></li>
							<li><a href="../tuneup/tuneup.html">Tune-Up</a></li>
							<li><a href="../security/security.html">Security</a></li>
						</ul>
					</li>

					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">WIRELESS SETUP</li>
                           				 <li><a href="../wireless/setup.html">Wireless Setup</a></li>
							<li><a href="../wireless/support.html">Wireless Support</a></li>
							<li><a href="../wireless/optimization.html">Wireless Optimization</a></li>
							<li><a href="../wireless/signalextension.html">Wireless Signal Extension</a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">MOBILE + TABLETS</li>
                           				<li><a href="../mobile+tablets/setup+support.html">Mobile Device Setup</a></li>
							<li><a href="../mobile+tablets/mobiledevicesupport.html">Mobile Device Support</a></li>
						</ul>
					</li>


				</ul>
			</li>
            <li class="nav-topmenu"><a href="#">About Us</a></li>
	    <li class="nav-topmenu"><a href="../contact/contact.html">Contact</a></li>
		</ul>
	</div><!-- /.nav-collapse -->
  </nav>
</div>

<!--<div id="mycarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
        <img src="../images/aboutus.png" alt="About Us" class="img-responsive" style="width:100%;">
           <div class="carousel-caption" style="position: absolute; font-family: Roboto Regular; transform: translate(0%, -35%); text-align:left;">
           	<h2 style="font-size: 20px; line-height: 1.2; color: white;">The Brain</h2>
		<h4 style="font-size: 13px; color: white;">A brain is a marvelous thing</h4>
		<h4 style="font-size: 13px; color: white;">Thoughts and communication</h4>
		<h4 style="font-size: 13px; color: white;">Stuck in little files</h4>
		<h4 style="font-size: 13px; color: white;">Waiting to be opened and remembered</h4>
		<h4 style="font-size: 13px; color: white;">by: Meg Howell</h4>
           </div>

        </div>
    </div>
</div> -->



</div>
<div class="container">
<div class="row">
 <div class ='col-sm-12' style="margin-bottom:100px;">
	<h2 class="panel-body" style="text-align: left!important; font-size: 35px; line-height: 1.5; font-family: Roboto Bold;">Thank you for submitting your feedback and comments.</h2>
	<h5 style="line-height: 1.8; font-family: Roboto Light; font-size: 18px;">Your message has been successfully sent.</h5>
 </div>
</div>
</div>

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left" style="color: #918f9d; font-family: Roboto Regular; font-size: 14px;"> Copyright © 2018 Techmoxy. All Right Reserved.</p>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/tm.js"></script>
  </body>
</html>

<?php

}
?>
