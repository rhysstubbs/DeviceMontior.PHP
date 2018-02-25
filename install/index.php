<?php
	session_start(); //start session
	if(!isset($_SESSION['user'])) { //session variable is not set
		echo "<p>You haven't logged-in</p>"; //tell users they are not logged in
		header("Location: /errorPage.php"); //take users back to the log in page
	}

    include 'connection.php'; //connection to the database

    if (mysqli_connect_error()) { //connection failed
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); //display an error message
	} else { //connection successful 
    
        $query = "SELECT user_id FROM Users WHERE username = '".$_SESSION['user']."' LIMIT 1;";
        $result = mysqli_query($connection, $query);        
            
        $getID = mysqli_fetch_assoc(mysqli_query($connection, $query));
        $userID = $getID['user_id'];
        $_SESSION['id'] = $userID;

    } // Close IF

?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>Install</title>

			<!-- Custom CSS -->
			<link type="text/css" rel="stylesheet" href="/devices/css/styles.css">

			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- JavaScript & JQuery links -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		</head>

		<style>
			button {
				background-color:#f82;
				color: white;
			}
			
			h1 {
				text-align: center;
			}
			
			install {
				padding-top:75px;
			}
			
			html,body,section {         
                  height: 98%;
            }
			
			.col-md-15 {
                padding-bottom: 40px;
			}
				
		</style>

		<body style = "background-color:#f0f0f0;">
		
			<!-- nav bar -->
			<!-- this is all of the links to other pages that when clicked will re-direct the user -->
			<header>
				<div class="main-menu">
					<ul class="main-menu">
						<li><a href="/home">Home</a></li>
						<li><a href="/devices">My Devices</a></li>
						<li><a href="/install">Install</a></li>
						<li><a href="/contact">Contact</a></li>
						<li><a href="/about">About</a></li>
						<li id="logout"><a href="/scripts/logout.php">Logout</a></li>
					</ul>
				</div>
			</header>

			<!-- content -->
			<!-- in this section is formating and layout for the written content -->
			<section class="about">
				<div class="container">
					<div class="col-md-15">
						<h2>Download and Install the Client</h2>
						<h5>Release Date: 06/05/2017</h5>				
						
						<section id="title-bar">
							<div class="button">
								<div class="col-md-15">
									<a href="/scripts/client.py" download="<?php echo $_SESSION["id"].".py";?>">
                                    <button type="button">Download!</button>
									</a>
								</div>
							</div>
						</section>

						<br>
						
						<!-- This holds all of the collapsable content boxes and their corresponding content -->
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<h3>Setup Instructions</h3>

							<div class="panel panel-default">

								<div class="panel-heading" role="tab" id="headingOne"><!-- heading for the first collapsable box -->
									<h4 class="panel-title">
                                    <a role="button" data-toggle="collapse"  href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Windows</a>
									</h4>
								</div>

								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true"> <!-- content for the first collapsable box -->
									<div class="panel-body">
										<p>Follow these instructions in-order to start using your Windows client successfully!</p>
										<ul class="instructions">
											<li>Client (V 1.0) must be downloaded to the host machine you wish to monitor.</li>
											<li>Ensure the correct version of Python (2.7) is installed, <a href="https://www.python.org/downloads/windows/">click here to download</a>.</li>
											<li>Run the client installer package and follow the options (for reliability, please run as administrator if possible), ensuring to install to an appropriate location.
												<ul>
													<li>Alternatively, you can setup and run the software manually. To do so, please download the source <a href="">here</a>.</li>
												</ul>
											</li>
											<li>Once installed you will see a task bar item appear in the bottom right of your window. To configure the client, use this menu.</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default"> <!-- heading for the second collapsable box -->
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Linux </a>
									</h4>
								</div>
								
								<!-- content for the second collapsable box -->
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<p>Follow these instructions in-order to start using your Linux client successfully!</p>
										<ul class="instructions">
											<li>Client (V 1.0) must be downloaded to the host machine you wish to monitor.</li>
											<li>Ensure the correct version of Python (2.7) is installed, <a href="https://www.python.org/downloads/source/">click here to download</a>.</li> <!-- this is a hyperlink to where the modules can be downloaded -->
											<li>Run the client installer package and follow the options (for reliability, please run as administrator if possible), ensuring to install to an appropriate location.
												<ul>
													<li>Alternatively, you can setup and run the software manually. To do so, please download the source <a href="">here</a>.</li>
												</ul>
											</li>
											<li>Once installed you will see a task bar item appear in the bottom right of your window. To configure the client, use this menu.</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default"> <!-- heading for the third collapsable box -->
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Mac </a>
									</h4>
								</div>
								
								<!-- content for the third collapsable box -->
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
									<div class="panel-body">
										<p>Follow these instructions in-order to start using your Mac OS X client successfully!</p>
										<ul class="instructions">
											<li>Client (V 1.0) must be downloaded to the host machine you wish to monitor.</li>
											<li>Ensure the correct version of Python (2.7) is installed, <a href="https://www.python.org/downloads/source/">click here to download</a>.</li>
											<li>Run the client installer package and follow the options (for reliability, please run as administrator if possible), ensuring to install to an appropriate location.
												<ul>
													<li>Alternatively, you can setup and run the software manually. To do so, please download the source <a href="">here</a>.</li>
												</ul>
											</li>
											<li>Once installed you will see a task bar item appear in the bottom right of your window. To configure the client, use this menu.</li>
										</ul>
									</div>
								</div>
							</div>

						</div> <!-- CLOSING PANEL ITEMS -->


						<p><b>Install Requirements:</b></p>
						<ul>
							<li>Operating Systems: Windows XP or above. Including all versions of Windows Server 2008 onwards. Including x86 and x64 architectures.</li>
							<li>Hardware: CPU clock speed of at least 1.0 Ghz. 512mb of available memory. </li>
						</ul>
						<p>Any issues please visit our contact page <a href="/contact"><em>here</em></a>.</p>

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
