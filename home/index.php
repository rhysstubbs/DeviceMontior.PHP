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
   
			<title>Home</title>
        
			<!-- Custom CSS -->
			<link type="text/css" rel="stylesheet" href="/devices/css/styles.css">
		
      
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
			<style>	
		
			body {
				padding-bottom: 40px;
			}
			
			.image {
				width: 100%;
				padding-top: 10px;							
			}
			
			img{
				max-width: 100%;
				height: auto;
				width: auto\9;				
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
					<div class="image">				 
						<img src="IoT_image.jpg">
					</div>
					<div class="row">
						<div class="col-md-15">
							<h2 style = "color:black;">Device Monitoring System</h2>
							<p style = "color:black;">The integrated software to keep track of your IoT devices.</p>
							<div>
								<p><b>What Does This Site Do?</b></p>
								<p>This site allows you to securely logon with a custom account and then allow you to efficiently and securely monitor and check all your IoT devices by displaying their current 
								and past status in a clear to read and understand manner that is easily and readily available. This is the perfect tool for people who have a plethora of devices and have a hard time 
								managing and monitoring them, this is due to the way this site detects and presents, in a user-friendly way, your devices, allowing you to effortlessly see devices and their status. 
								But that doesn't mean it's exclusively for those people, this service is also optimal for checking how much power a device is consuming allowing you to limit high consumption devices 
								and save on energy bills, it will also allow you to see the battery life of all devices allowing you to check the lifespan of your devices without having to turn them on or check them, 
								saving you that all important resource, time.</p>
								<p><b>What Features are Available?</b></p>
                                
								<p>This site offers the features required to effectively and efficiently monitor your devices. </p>
								<p><b>These features are:</b></p>
								<ul>
									<li>Connect to a dedicated secure server to see your personal devices </li>
									<li>See all currently active devices </li>
									<li>Check the status of all devices </li>
									<li>Check the past status of each device </li>
								</ul>
							</div>
								
								<p>What is an IoT Device?
                            
								IoT devices include thermostats, light bulbs, door locks, fridges, cars, implants for RFID and pacemakers. The concept behind the Internet of Things (IoT) is all these things working
								in concert for people in businesses, in industry, or at home.
								Here’s an example of the smart home enabled by IoT devices: The user arrives home and his car communicates with the garage to open the door. The thermostat is already adjusted to his 
								preferred temperature, due to sensing his proximity. He walks through his door as it unlocks in response to his smart phone or RFID implant. The home’s lighting is adjusted to lower 
								intensity and his chosen colour for relaxing, as his pacemaker data indicates that it's been a stressful day.
								IoT devices are part of a scenario in which every device talks to every other related device in an environment to automate home and industry and communicate more and more usable data
								to users, businesses and other interested parties. However, as is often the case, the technology has moved more quickly than mechanisms to safeguard user privacy and security. This is
								the fast-upcoming new tech that will one day become integral to our lives, soon every device will be considered IoT so it is wise to stay one step ahead of it, and this site offers that 
								exact chance.</p>
						</div>                             
					</div>
				</div>				
			</section>
        
			<!-- JavaScript & JQuery links -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			
			<!-- footer -->
			<footer class="footer">
				<p>Copyright &copy; 2017, All Rights Reserved</p>
				<p><em>Logged in as: <?php echo $_SESSION["user"]; ?></em></p>
			</footer>

		</body>
	</html>
