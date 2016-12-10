
<?php
	//Collect POST values
	$username = $_POST[ 'username' ];
	$password = $_POST[ 'password' ];
	
	if($username == 'admin'){
		if($password == 'admin'){
			//Login successful set session variables and redirect to main page.
			session_start();
			$_SESSION[ 'IS_AUTHENTICATED' ] = 1;
			$_SESSION[ 'USER_ID' ] = 'admin';
			
			header("location:../Admin/admin_main.php");
		}
		else{
			include('login_form.php');
			echo '<center>Incorrect password</center>';
		}
	}
	else{
	//your code here
		if($username && $password){
			//Connect to mysql server
			include ("../../dbcontroller.php");
			$qry="SELECT * FROM logins WHERE BORROWER_ID = '$username' AND PASSWORD = '$password'";
			//echo $qry;
			//Execute query
		
			$result=mysqli_query($link, $qry);
		
			//Check whether the query was successful or not
			if($result){
				$count = mysqli_num_rows($result);
			}
			else{
				//Login failed
				include('login_form.php' );
				echo '<center>Incorrect Username or Password !!!<center>' ;
				exit();
			}
			//if query was successful it should fetch 1 matching record from the table.
			if($count == 1){
				//Login successful set session variables and redirect to main page.
				session_start();
				$_SESSION[ 'IS_AUTHENTICATED' ] = 1;
				$_SESSION[ 'USER_ID' ] = $username;
				header('location:../User/user_main.php' );
			}
			else{
				//Login failed
				include('login_form.php' );
				echo '<center>Incorrect Username or Password !!!<center>' ;
				exit();
			}
		}
		else{
			include('login_form.php' );
			echo '<center>Username or Password missing!!</center>' ;
			exit();
		}
	}
	
?>
