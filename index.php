
<?php
	session_start(); //start session

    function phpAlert($msg) { //declaration of function
		echo '<script type="text/javascript">alert("' . $msg . '")</script>'; //create a dialog box displaying a message
    } //end of function
	
	
	//<------------------------------------------------ Login Form ------------------------------------------------>
	
	include 'scripts/connection.php'; //connection to the database
	
	if (mysqli_connect_error()) { //connection failed
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); //display an error message
	} else { //connection successful 
	
		if (isset($_POST['login'])) { //when login button is pressed
			if ((!empty($_POST["login-username"])) && (!empty($_POST["login-password"]))) { //check that all fields are filled in	
			
				$query = "SELECT * from Users WHERE username LIKE '".$_POST['login-username']."' AND password LIKE '".$_POST['login-password']."' LIMIT 1"; //get from database username and password
				
				$result = mysqli_query($connection, $query); //store query inside a variable
				$num_rows = mysqli_num_rows($result); //get number of rows
	
				if ($result == false) { //if query failed
					echo "<p>Query Failed.</p>"; //display an error
				}
				
	
				else if ($num_rows == 1){ //number of rows equal 1
					$_SESSION['user'] = $_POST['login-username']; //store username inside a session variable
					header("Location: /home/index.php"); //allow the user to login and direct them to home page		
				} else {//no match is found
					phpAlert("Error: Incorrect Username/password"); //display error message
				}
			} else { //not all fields are filled in
				echo phpAlert("Please fill in all fields"); //display error message
			}
		}
		mysqli_close($connection); //close connection to database
	}
	
	
	//<------------------------------------------------ Signup Form ------------------------------------------------>

	include 'scripts/connection.php'; //connection to the database
	
	if (mysqli_connect_error()) { //connection failed
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); //display an error message
	} else { //connection successful 
	
		if(isset($_POST['signup'])) { //when signup button is pressed
			if ((!empty($_POST["signup-username"])) && (!empty($_POST["signup-password"])) && (!empty($_POST["signup-email"])) && (!empty($_POST["confirm-password"]))) { //check that all fields are filled in
				if ($_POST["signup-password"] == $_POST["confirm-password"]) {//check if the the password in the two fields match		
				
					$query = "SELECT username, email from Users WHERE username = '".$_POST['signup-username']."' OR email = '".$_POST['signup-email']."';"; //get username and email from database and check that they are unique
				
					$result = mysqli_query($connection, $query); //store query inside a variable        
				
					$num_rows = mysqli_num_rows($result); //get number of rows        
				
					if ($result == false) { //query failed					
						echo "<p>Query Failed.<p>"; //display an error				
					}
				
					else if ($num_rows >= 1) { //number of rows bigger/equal to 1					
						phpAlert("Error: Username/email already in use"); //display an error				
					}				
					else { //query successful					
						$query = "INSERT INTO Users (username, password, email) " . "VALUES ('" . $_POST["signup-username"] . "', '" . $_POST["signup-password"] . "', '" . $_POST["signup-email"] . "');"; //insert into the database the values in the signup form
					
						$result = mysqli_query($connection, $query); //store query inside variable					
					
						if ($result == false) { //query failed						
							phpAlert("Failed to sign the user up"); //display error							
						}											
					}
				
				} else { //passwords do not match						
					phpAlert("Passwords do not match"); //display error				
				}
			
			} else { //not all fields are filled in				
				echo phpAlert("Please fill in all fields"); //display error message			
			}		
		}		
		mysqli_close($connection); //close connection to database
	}
?>	


<!DOCTYPE html>
	<html lang="en">
		<head>
	
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
   
			<title>Login</title>
                
			<!-- Custom CSS -->
			<link type="text/css" rel="stylesheet" href="/devices/css/styles.css">
      
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
		</head>    
		<body>
			<div class="col-sm-offset-4 col-sm-4">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
					<li role="presentation"><a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Sign-up</a></li>
				</ul>

				<!-- Login Panel -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="login">
						<h3 class="form-heading">Enter your Log-in details</h3>
						
						<!-- Log-in form -->
						<form method="post">
							<div class="form-group">
								<label for="username-field" class="top-label">Username</label>
								<input type="text" class="form-control" id="username-field" placeholder="Username" name="login-username">
							</div>
							<div class="form-group">
								<label for="password-field">Password</label>
								<input type="password" class="form-control" id="password-field" placeholder="Password" name="login-password">
							</div>
							<input type="submit" class="btn btn-default" value="Login" name="login">
						</form>
					</div>    

				<!-- Sign-up Panel -->
					<div role="tabpanel" class="tab-pane fade" id="signup">
						<h3 class="form-heading">Enter your details to create an account</h3>
							
						<!-- Sign-up form -->
						<form method="post">
							<div class="form-group">
								<label for="username-signup-field" class="top-label">Username</label>
								<input type="text" class="form-control" id="username-signup-field" placeholder="Username" name="signup-username">
							</div>
							<div class="form-group">
								<label for="email-signup-field">Email address</label>
								<input type="email" class="form-control" id="email-signup-field" placeholder="Email" name="signup-email">
							</div>
							<div class="form-group">
								<label for="password-signup-field">Password</label>
								<input type="password" class="form-control" id="password-signup-field" placeholder="Password" name="signup-password">
							</div>
							<div class="form-group">
								<label for="confirm-password-signup-field">Confirm password</label>
								<input type="password" class="form-control" id="confirm-password-signup-field" placeholder="Re-type your password" name="confirm-password">
							</div>
							<input type="submit" class="btn btn-default" value="Sign-up" name="signup">
						</form>
					</div>
				</div>
			</div>
 
        
        <!-- JavaScript & JQuery links -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		</body>
	</html>
