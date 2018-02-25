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
			<title>About</title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
			<meta http-equiv="Pragma" content="no-cache" />
			<meta http-equiv="Expires" content="0" />

			<!-- Custom CSS -->
			<link type="text/css" rel="stylesheet" href="/devices/css/styles.css">
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
			<!-- JavaScript & JQuery links -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
			<style>
				html,body,section {         
					height: 98%;
				}
				
				.row{
					padding-bottom: 40px;
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
					<li><a href="/install">Install</a></li>
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
                    
						<h3>About</h3>
						<p>We are a 7 man, Bournemouth based, professional freelance development team called Code Monkeys, we design and implement quality IT systems for a variety of clients and scopes. We constantly 
						search for and research the newest and best techniques and paradigms to augment our development process in order achieve only the highest quality for our products.</p>

						<h3>Management</h3>
						<p>Here at Code Monkeys we take management very seriously as we understand and respect that a poor management approach and structure often leads to the downfall of a project. Bearing that in mind,
						when it comes to managing the team we only employ highly rated and successful management techniques, ensuring that that the technique in question has yielded success in the past in order to ensure 
						our projects success. A common part of our management process is to create a highly detailed and extensive work plan of the project, which we stick to religiously, this partially ensures our success
						in the project.</p>

						<p>In the rare case that a problem occurs and we need to re-think our plan we create a suitable recovery plan to keep our project on track. All team members are highly trained in the managements 
						techniques of our choice and rigorous training regime is put in place if a new technique is found, this ensures that all team members can be relied upon to act out their part in the process without
						being a ‘baby-steps’ process, drastically increasing our efficiency as a team.</p>


						<h3>Development</h3>
						<p>As a team come from a computing/programming based background so this section comes very naturally to us and each team member is highly specialised and adept in their field, we have a team
						member for most roles ranging from server and backend development all the way to web and code development. Although this is the case we also look out for new techniques and paradigms in order to
						increase our knowledge and skills as individuals.</p>

						<p>As for the process itself, we stick to a very laissez-faire structure and team members take control and lead the project as and when is needed. We also know and understand the value that 
						sufficient and widespread testing has and we always aim to test our products fully to ensure that the client, rightly, gets the working system that they commissioned.</p>


						<h3>Our Guarantee</h3>
						<p>Our guarantee is that the project or system you receive from us is exactly catered to your specifications, resulting in a system you can use and trust without doubt or fear of error. We carefully pool over requirements for the system to ensure that the final project meets your specification exactly. We also guarantee that the project will only ever be handled with the upmost professionalism by our team and that every project is just as important as each other. This also includes discussing milestones and deliverables and more importantly handing them over on time with sufficient documentation and specifications.</p>
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
