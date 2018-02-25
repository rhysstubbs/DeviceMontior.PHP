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
			<title>Device History</title>
			<!-- Bootstrap -->
			<link href="/devices/css/bootstrap.min.css" rel="stylesheet">
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
				padding-top:50px;
			}
			
			html,body {         
                  height: 98%;
            }
			
			.button {
				padding-left: 14px;
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
				<h1>Device History</h1>
				<div class="button">
					<button onclick="window.location.href='/devices/index.php'" type="button" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back to My Devices <!-- takes users back to the previous page -->
					</button>
				</div>
				
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
								<th>Date/Time</th>
								<th>Status</th>
							</tr>
							
							<!-- table content -->
							<tbody>
					
								<?php
								
									//connection to database
									$username = "pmt";
									$password = "password"; 
									$host = "localhost";
									$db = "DeviceMonitor";
        
									$connection = mysqli_connect($host, $username, $password, $db);
									
									if (mysqli_connect_error()) { //connection failed
										echo "Failed to connect to MySQL: " . mysqli_connect_error(); //display error
									} else {
										$query = "SELECT * FROM devices WHERE devices.fqdm = '". $_GET[fqdm] . "'  ORDER BY timestamp DESC;"; //get all fileds from database where the device name equals the device name in database
										$result = mysqli_query($connection, $query); //store query in variable
								
										if($result == false) { //query failed
											echo "<p>Getting detailes failed.<p>"; //display error
										}
										else { //query successful
											while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ //loop through result storing in an array				
										
											?>		

												<!-- display results in a table -->
												<tr>
													<td><?php echo $row["fqdm"]; ?></td>
													<td><?php echo $row["local_ip"]; ?></td>
													<td><?php echo $row["public_ip"]; ?></td>
													<td><?php echo $row["mac_address"]; ?></td>
													<td><?php echo $row["battery_percent"]; ?>%</td>
													<td><?php echo $row["timestamp"]; ?></td>
													<td></td>
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
				<p>Copyright &copy; 2016, All Rights Reserved</p>
				<p><em>Logged in as: <?php echo $_SESSION["user"]; ?></em></p>
			</footer>
		</body>
	</html>