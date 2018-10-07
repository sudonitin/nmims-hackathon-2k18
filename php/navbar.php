<?php 
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
//echo "Connected successfully";

$name_err = $username_err =  "";


if (isset($_POST['submit'])) {
  # code...
  //session_start();

   

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  #$num = mysqli_real_escape_string($conn, $_POST['email']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $days = mysqli_real_escape_string($conn, $_POST['days']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $person = mysqli_real_escape_string($conn, $_POST['person']);


     if(!empty(trim($_POST["name"]))){
          $first = test_input($name);
          if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
            # code...
            $name_err = "Only letters and spaces are allowed";
          }
    }


    if (empty($name_err)) {
      # code...
      $email_query = "SELECT * FROM helper WHERE email = ?";

      if ($emailstmt = mysqli_prepare($conn, $email_query)) {
        # code...
        mysqli_stmt_bind_param($emailstmt, 's', $email);
        
        mysqli_stmt_execute($emailstmt);

        $email_result = mysqli_stmt_get_result($emailstmt);
        $emailrow = mysqli_fetch_array($email_result, MYSQLI_BOTH);
        if ($emailrow['email'] == $email) {
          # code...
          echo "
            <script type = \"text/javascript\">
              alert('Email is already registered.');
            </script>
            ";        
        }
        else{
          $sql = "INSERT INTO helper (name, email, days, tim, me) VALUES (?,?,?,?,?)"; 
          if ($stmt = mysqli_prepare($conn, $sql)) {
            # code...
            mysqli_stmt_bind_param($stmt, 'sssss', $name,  $email, $days, $time, $person);
            mysqli_stmt_execute($stmt);
            echo "<script type = \"text/javascript\">alert('u have successfully registered..!!');</script>";            
          }
          mysqli_stmt_close($stmt);
        	

        }
      }
      
    }

}


if (isset($_POST['victim'])) {
	$namevictim = mysqli_real_escape_string($conn, $_POST['namevictim']);
  $speakto = mysqli_real_escape_string($conn, $_POST['speakto']);
  $contactvictim = mysqli_real_escape_string($conn, $_POST['numbervictim']);
  $reasonvictim = mysqli_real_escape_string($conn, $_POST['reason']);

     if(!empty(trim($_POST["namevictim"]))){
          $firstvictim = test_input($namevictim);
          if (!preg_match("/^[a-zA-Z ]*$/",$firstvictim)) {
            # code...
            $name_errvictim = "Only letters and spaces are allowed";
          }
    }

    if (empty($name_errvictim)) {
      # code...	
          $sqlvictim = "INSERT INTO victim (name, speakto, contact, reason) VALUES (?,?,?,?)"; 
          if ($stmtvictim = mysqli_prepare($conn, $sqlvictim)) {
            # code...
            mysqli_stmt_bind_param($stmtvictim, 'ssss', $namevictim,  $speakto, $contactvictim, $reasonvictim);
            mysqli_stmt_execute($stmtvictim);
            echo "<script type = \"text/javascript\">alert(\"we'll reach you in a short span $namevictim till then read the stories\");</script>";            
          }                    
    }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	function generate_random_numbers($min,$max,$quantity){
		$numbers=range($min,$max);
		shuffle($numbers);
		return array_slice($numbers, 0, $quantity);
	}
	$numbers = generate_random_numbers(1,92,15);
	for($i=0;$i<=14;$i++){
		$numbers[$i]='../images/'.$numbers[$i].'.jpg';
	}
	?>
	<title>U r Important.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include "./header.php"; ?>
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<script type="text/javascript" src="../js/navbar.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">	<style>
		.mySlides {display:none;}
	</style>
</head>	
		<audio id="my_audio" src="./music.mp3" loop="loop"></audio>
		<div class="topnav" id="myTopnav" style="position: sticky; top: 0">
		  <a href="#sect-1" id="home" onclick="border1()"><i class="fas fa-home"></i> Home</a>
		  <a href="#sect-2" id="quotes" onclick="border2()"><i class="fas fa-feather"></i> Quotes</a>
		  <a href="#sect-3" id="stories" onclick="border3()"><i class="fas fa-book-open"></i> Stories</a>
		  <a href="#sect-4" id="speak2us" onclick="border4()"><i class="fas fa-phone-volume"></i> Speak2Us</a>
		  <a href="#sect-5" id="donatenow" onclick="border5()"><i class="fas fa-hand-holding-usd"></i> Donate now</a>
		  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="responsive_bar()">&#9776;</a>
		  <span class="nav-slider"></span>
		</div>
		<br>
<script>
	window.onload = function() {
    document.getElementById("my_audio").play();
}

function responsive_bar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

	<body>
		<div class="container">
			
		  	<main class="nav-main">
			  <section id="sect-1">
			    <p>U R Important.com engages the public by partnering with communities across the country to organize awareness events, start up new U R Important.com charters, and disseminate suicide prevention messaging.</p>
			    	<div class="container-fluid">
			    		<div class="row">
			    			<div class = "col-sm col-md col-lg"><p>
			    				U R Important.com raises public awareness by organizing a variety positive events in partnership with dedicated individuals and communities across the country. Learn more about joining, supporting, or starting your own U R Important.com event near you. Start a U R Important.com Charter in your community! </p>
			    			</div>
			    			<div class="col-md col-lg col-sm">
			    				<img src="../images/content-1.jpg" style="width: 100%;" class="wrap-img">
			    			</div>
			    		</div>
			    	</div>
			  </section><hr style="height:3px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">
			  <section id="sect-2">
			    <span>Quotes</span>
			    <div class="" id="slideshow" >
				  <img class="mySlides" src='<?php echo "$numbers[0]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[1]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[2]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[3]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[4]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[5]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[6]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[7]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[8]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[9]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[11]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[12]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[13]"; ?>' >
				  <img class="mySlides" src='<?php echo "$numbers[14]"; ?>' >
				</div>
			  </section><br><hr style="height:3px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">
			  <section id="sect-3" class="h3">
			    <span>Stories</span>
			    <div class="container">
		    	<div class="row">
		    		<div class="col-sm col-lg col-xs col-md">
		    			<br>
		    			After 9/11, Michael Liguori joined the Marines to fight for his country. When he returned, he struggled with PTSD and attempted suicide. This is his story.
		    			<br>
		    			<b>"I want to share this with you because life is complicated, hard and often, a constant struggle. But that doesn’t mean you have to do it alone."</b>
		    			<br><br>
		    			<a href="https://mhaofnyc.org/what-i-learned-from-my-suicide-attempt/?_ga=2.218323033.1791358035.1538908887-1080897535.1538908887" class="btn btn-success">See Mike's story</a>
		    		</div>
		    		<div class="col-sm col-lg col-xs col-md">
		    			<img src="../images/mike.png" style="height:30vh;padding-left: 10%;width:">
		    		</div>
		    	</div>
		    	<br><br>
		    	<div class="row">
		    		<div class="col-sm col-lg col-xs col-md">
		    			<img src="../images/david.png" style="height:30vh;padding-left: 10%;width:">
		    		</div>
		    		<div class="col-sm col-lg col-xs col-md">
		    			<br>
		    			David Lilley survived a suicide attempt in his forties.
		    			<br>
		    			<b>"I nearly missed out on a lot of my childrens' lives. It's been a real blessing to watch them grow into adults and be blessed with a grandchild."</b>
		    			<br><br>
		    			<a href="https://www.youtube.com/watch?v=CVxZN1bWfYA&t=6s" class="btn btn-success">See David's story</a>
		    		</div>
		    	</div>
		    	<br><br>
		    	<div class="row">
		    		<div class="col-sm col-lg col-xs col-md">
		    			<br>
		    			Terry Wise survived a suicide attempt in her thirties and has since become a well-known author and speaker.
		    			<br>
		    			<b>"If I was to sum up my life today, the word that I would use to describe it is fulfilling."

						WATCH TERRY'S STORY</b>
		    			<br><br>
		    			<a class="btn btn-success" href="https://www.youtube.com/watch?v=i9x1suuv6gw">See Terry's story</a>
		    			
		    		</div>
		    		<div class="col-sm col-lg col-xs col-md">
		    			<img src="../images/terry.png" style="height:30vh;padding-left: 10%;width:">
		    		</div>
		    	</div>
		    	
		    </div>

			  </section><br><hr style="height:3px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">
			  <section id="sect-4">
			    <span>Speak2us</span><br><br>
			    <div class="container-fluid">
			    	<div class="row">
			    		<div class="col-lg col-md col-sm col-sm">
			    			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			    				<h3 class="h3">I am A Helper</h3><br>
			    				<input type="text" class="form-control" name="name" placeholder="Enter your name" required><br><br>
			    				<input type="text" class="form-control" name="email" placeholder="Enter your number" required><br><br>
			    				<input type="text" class="form-control" name="days" placeholder="No. of days you can dedicate in a week()" required=""><br><small>mention in this manner eg: Monday, Tuesday</small><br><br>
			    				
			    				<span class="h3">Who am I?</span><br>
			    				<div class="input-group">
			    					
                  <span class="input-group-addon"><i class="fa fa-building-o fa-lg icon" aria-hidden="true"></i></span>
                  <select name="person" class="form-control selectpicker">
                      <option>Philanthropist</option>
                      <option>Councellor</option>
                      <option >Anonymous Helper</option>
                      
    			</select>
                </div><br><br>
			    				<input type="text" class="form-control" name="time" placeholder="mention time" required><br><small>mention time hours eg: 00:00-17:00</small><br><br>
			    				<input type="submit" name="submit" value="submit" class="btn btn-success"><br><br>
			    			</form>
			    		</div>
			    		<div class="col-lg col-sm col-md col-xs">
			    				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			    					<h3 class="h3">I need help</h3><br>
			    					<input type="text" name="namevictim" placeholder="Enter your name" required class="form-control"><br><br>
			    					<input type="number" name="numbervictim" placeholder="Enter your phone number" required class="form-control"><br><br>
			    					Who would u like to speak to
			    					<select class="form-control" name="speakto">
			    						<option>Philanthropist</option>
			    						<option>Stranger</option>
			    						<option>Counsellor</option>
			    					</select><br><br>
			    					<textarea name="reason" placeholder="Enter Your problem" class="form-control"></textarea> <br>
			    					<input type="submit" class="btn btn-danger" name="victim" />
			    				</form>
			    				
			    			</div>
			    	</div>
			    </div>
			  </section><br><hr>
			</main>
		</div>
		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			    var i;
			    var x = document.getElementsByClassName("mySlides");
			    for (i = 0; i < x.length; i++) {
			       x[i].style.display = "none";  
			    }
			    myIndex++;
			    if (myIndex > x.length) {myIndex = 1}    
			    x[myIndex-1].style.display = "block";  
			    setTimeout(carousel, 5000); // Change image every 2 seconds
			}
		</script>
	</body>
</html>

