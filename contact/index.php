<?php
	session_start(); //start session
	if(!isset($_SESSION['user'])) { //session variable is not set
		echo "<p>You haven't logged-in</p>"; //tell users they are not logged in
		header("Location: /errorPage.php"); //take users back to the log in page
	}
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
   
			<title>Contact</title>
        
			<!-- Custom CSS -->
			<link type="text/css" rel="stylesheet" href="/devices/css/styles.css">
			<link type="text/css" rel="stylesheet" href="/contact/contact.css">
      
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
			<!-- JavaScript & JQuery links -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
			<style>
			
			html,body,section {         
                  height: 97%;
            }
			</style>
		</head>
		
		<body style="background-color:#f0f0f0;">
	 
			<!-- nav bar -->
			<!-- this is all of the links to other pages that when clicked will re-direct the user -->
			<header>
				<ul class="main-menu">
					<li><a href="/home">Home</a></li>			
					<li><a href="/devices">My Devices</a></li>
					<li><a href="/install">Install</li>
					<li><a href="/contact">Contact</a></li>
					<li><a href="/about">About</a></li>
					<li id="logout"><a href="/scripts/logout.php">Logout</a></li>
				</ul>
			</header>
		
			<!-- content -->
			<!-- in this section is formating and layout for the written content -->
			<section class="about">
				<div class="container">
					<div class="row">
					
						<!-- contact form -->
						<!-- every field of the form must be filled -->
						<form id="contact" action="" method="post">
							<h3>Quick Contact</h3>
							<h4>Contact us today, and get a reply within 24 hours!</h4>
							<fieldset>
								<input placeholder="Your Name" type="text" tabindex="1" required autofocus> <!-- the word required is used for validation -->
							</fieldset>
							<fieldset>
								<input placeholder="Your Email Address" type="email" tabindex="2" required>
							</fieldset>
							<fieldset>
								<input placeholder="Your Phone Number" type="tel" tabindex="3" required>
							</fieldset>
							<fieldset>
								<textarea placeholder="Type your Message Here...." tabindex="5" required></textarea>
							</fieldset>
							<fieldset>
								<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
							</fieldset>
						</form>
					</div>
				</div>
			</section>

			<!-- footer -->
			<footer class="footer">
				<p>Copyright &copy; 2017, All Rights Reserved</p>
				<p><em>Logged in as: <?php echo $_SESSION["user"]; ?></em></p>
			</footer>

		</body>
	</html>
