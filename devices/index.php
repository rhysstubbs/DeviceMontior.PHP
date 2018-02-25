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
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<title>My Devices</title>
			<!-- Bootstrap -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<!-- NAVBAR -->
			<link type="text/css" rel="stylesheet" href="/devices/css/styles.css">
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="js/bootstrap.min.js"></script>
			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		<style>
			table, th, tr, td, h1 {
				text-align: center;
			}
			
			h1 {
				padding-top:5px;
			}
			
			.table-responsive {
				padding-top:96px;
			}
			
			html,body {         
                  height: 98%;
            }
			
			button {
				bordered:none;
			}
		</style>
		<body style="background-color: #F0F0F0; padding-bottom: 40px;">
		
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
			<div class="container">
			<h1>My Devices</h1>
			
			<!-- table -->
				<div class="table-responsive">
					<div class="container-fluid">
						<table class="table table-bordered">
						
						<!-- table header -->
							<tr>
								<th>Device Name</th>
								<th>Local IP Address</th>
								<th>Public IP Address</th>
								<th>MAC Address</th>
								<th>Battery Life</th>
								<th>Status</th>
							</tr>
							
							<!-- table content -->
							<tbody>
								<?php
									include 'connection.php'; //script to connect to the database
								
									if (mysqli_connect_error()) { //connection failed
										echo "Failed to connect to MySQL: " . mysqli_connect_error(); //display error message
									} else { //connection successful
										
										if (((!empty($_GET["mode"])) && (!empty($_GET["fqdm"]))) && ($_GET["mode"] == "history")) { //check that the mode and device name is not empty and mode equals history
											$query = "SELECT fqdm FROM devices WHERE fqdm=" . $_GET["fqdm"] . ";"; //select device from the database which equals the selected device
											$result = mysqli_query($connection, $query); // store query in a variable
										
											if ($result == false) { //query failed
												echo "<p>Getting device history details failed.</p>"; //display error
											} else { // query successful                
												$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //get device history from database 
												
												if (empty($row)) { //getting device history failed
													echo "<p>No device in history found.</p>"; // display error message
												} else { //query successful
													$query = "SELECT * FROM devices WHERE fqdm" . $_GET["fqdm"] . ";"; // get all fields from database of that specific device
													$result = mysqli_query($connection, $query); // store query in a variable
                        
													if ($result == false) { //query failed
														echo "<p>Unable to get history for specific device.</p>"; //display error              
													}
												}
											}									
										}
									}								
								
									if (mysqli_connect_error()) { //connection failed
										echo "Failed to connect to MySQL: " . mysqli_connect_error(); //display error
									} else { //connection successful
								 
										$username = $_SESSION['user']; //store session in a variable 
										$query = "SELECT  * FROM devices INNER JOIN Users ON devices.user_id = Users.user_id WHERE Users.username = '".$username."' GROUP BY devices.fqdm ORDER BY devices.timestamp DESC ;"; //get all fields from database for the current user
										$result = mysqli_query($connection, $query); //store query in variable
									
										if ($result == false) { //query failed
											echo "<p>Getting detailes failed.</p>"; //display error
										}
										else { //query successful
											while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //loop through result storing in an array			
											?>			
											
												<!-- display results in a table -->
												<tr>
													<td><?php echo $row["fqdm"]; ?></td>
													<td><?php echo $row["local_ip"]; ?></td>
													<td><?php echo $row["public_ip"]; ?></td>
													<td><?php echo $row["mac_address"]; ?></td>
													<td><?php echo $row["battery_percent"]; ?>%</td>
													<td><a href="/history/index.php?mode=history&fqdm=<?php echo $row["fqdm"]; ?>" title="History">History</a>
												</tr>
											<?php 
											}
										}							
										mysqli_close($connection); //close connection to database
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<!-- footer -->
			<footer class="footer">
				<p>Copyright &copy; 2017, All Rights Reserved</p>
				<p><em>Logged in as: <?php echo $_SESSION["user"]; ?></em></p>
			</footer>
		</body>
	</html>