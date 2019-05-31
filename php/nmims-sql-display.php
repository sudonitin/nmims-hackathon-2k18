
<!DOCTYPE html>
<html>
<head>
	<title>delete test</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' href='../css/header.css'>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<form method="post" class="container">
		<?php 

		#how to echo values from db -- completed

		session_start();

		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "nmims";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $db);

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		else{
			
				# code...
				$sql = "SELECT * FROM victim";
				$result = mysqli_query($conn, $sql);
				$c = 1;
				$emailarray = array();
				echo "<h1>Victims</h1>";
				while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
				    echo "<div id = del$c>" . $row['name'] . " " . $row['reason'] . " " .$row['speakto'] . " " . $row['contact'] ." " ."
				    <input type=submit value = delete name = del$c> </div>";
				    echo "<br>";
				    array_push($emailarray, $row['contact']);
				    $c += 1;
				}
				$count = $c;
				#for trial -- successful
				for ($i=0; $i < $count-1; $i++) { 
					# code...
					#echo "suc1";
					$j = $i + 1;
					if (isset($_POST['del' . $j])) {
						#$delemail = $emailarray[1];
						#echo "suc2";
						$delsql = "DELETE FROM `victim` WHERE contact = '". $emailarray[$i]. "'";
						if(mysqli_query($conn,$delsql)){
							#echo "suc3";
							echo "<script>document.getElementById('del$j').style.display = 'none';</script>";
						}
					}

				}

				echo "<br>";
				echo "<br>";

				$day = date('l');
				$sqlhelper = "SELECT * from helper WHERE days LIKE '%" .$day. "%' OR days LIKE '%".$day."' ";
				$resulthelper = mysqli_query($conn, $sqlhelper);
				$c = 1;
				echo "<h1>Helpers</h1>";
				while ($row = mysqli_fetch_array($resulthelper, MYSQLI_BOTH)) {
				    echo "<div id='helper$c'>" . $row['name'] . " " . $row['me'] . " " .$row['days'] . " " . $row['tim'] . " " . $row['email'] . " <input type=submit value = contact name = contact$c> </div>";
				    echo "<br>";
				   
				    $c += 1;
				}

				

		}
		#query for searching in db
		#SELECT FirstName from personss WHERE FirstName LIKE '%tue%' AND FirstName LIKE '%mon%'
		#<a href="tel:+15555555555">Call me at +1 (555) 555-5555</a>
		?>
		
	</form>
</body>

</html>
