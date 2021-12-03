<?php
session_start();
   
if(!isset($_SESSION["user"])){
	
	header("location: register_login_bank.php");
}

$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank 2", "root", "");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username");
    $cursor->execute(array(":username" => $_SESSION["user"]));
	$return = $cursor->fetch();
if (isset($_POST["action"]) ) {
	if($_POST["action"] == "update"){
    $cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username");
    $cursor->execute(array(":username" => $_SESSION["user"]));
	$return = $cursor->fetch();
	}
    if (false) {
        $msg = "username or password already exist";
    } else {
        $cursor = $MySQLdb->prepare("UPDATE  users  SET username=:username,password=:password,Email=:Email,City=:City,Address=:Address,Phone_number=:Phone_number WHERE username=:username1");
        $cursor->execute(array(":username" => $_POST["username"],":username1" => $_SESSION["user"],":password" => $_POST["password"],":Email" => $_POST["Email"],":City" => $_POST["City"],":Address" => $_POST["Address"],":Phone_number" => $_POST["Phone_number"]));
		$_SESSION["user"] = $_POST["username"];
		$_SESSION["Email"] = $_POST["Email"];
		$_SESSION["City"] = $_POST["City"];
		$_SESSION["Address"] = $_POST["Address"];
		$_SESSION["Phone_number"] = $_POST["Phone_number"];
       echo  "update successfully";
	   die();
    }
	
}
    




?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		
		<title>Main page Updated</title>
		
				
		<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
		  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
		  <a href="index.php" class="w3-bar-item w3-button">Home</a>
		  <a href="Transfer_money.php" class="w3-bar-item w3-button">Transfer Money</a>
		  <a href="about.php" class="w3-bar-item w3-button">About</a>
		  <a href="contact_us.php" class="w3-bar-item w3-button">Contact Us</a>
		</div>

		<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
		  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
		  <a href="Update_page.php" class="w3-bar-item w3-button">Update Details</a>
		  <a href="#" id="logout" class="w3-bar-item w3-button">Logout</a>

		</div>

		<div class="w3-teal">
		  <button class="w3-button w3-teal w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
		  <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
		  <div class="w3-container">
			<ul class="nav navbar-nav" style="float: right">
				<li><a href="https://www.wsj.com/market-data/stocks" target="_blank">USA Stocks</a></li>
			</ul>
		
			<ul class="nav navbar-nav" style="float: right">
				<li><a href="https://www.bloomberg.com/markets/stocks/world-indexes/europe-africa-middle-east" target="_blank">Europe Stocks</a></li>
			</ul>
		
			<ul class="nav navbar-nav" style="float: right">
				<li><a href="https://il.investing.com/equities/israel" target="_blank">Israel Stocks</a></li>
        </ul>
			<ul class="nav navbar-nav" style="float: right">
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Credit Cards <span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="https://www.americanexpress.com/" target="_blank">American Express</a></li>
			  <li><a href="https://usa.visa.com/" target="_blank">Visa</a></li>
			  <li><a href="https://www.mastercard.com/global/en.html" target="_blank">Master Card</a></li>
			</ul>
			</li>
		</ul>
		  </div>
		</div>
			
<body>
		<div class="jumbotron text-center">
		  <h1>Update Details</h1>
		  <p>Please fill in this form to Update your details:</p>
		</div>
		<div class="container">
		  <div class="row">
			<div class="col-sm-4">
			  <label for="fna"><b>Username:</b></label>
			  <input value="<?php echo $return["username"] ?>" id="username" name="username" type="text" class="form-control"
		  </div>

		<div class="form-group">
		</div><br></br>
		<div class="form-group">
		  <label for="Password"><b>Password:</b></label>
		  <input value="<?php echo $return["password"] ?>" type="password" name="password" id="password" class="form-control" size="25">
		</div><br></br>
		<div class="form-group">
		  <label for="Email"><b>Email:</b></label>
		  <input value="<?php echo $return["Email"] ?>" type="Email" name="Email" id="Email" class="form-control" size="30">
		</div><br></br>
		<div class="form-group">
		  <label for="City"><b>City:</b></label>
		  <input value="<?php echo $return["City"] ?>"  type="text" name="City" id="City" class="form-control" size="21">
		</div><br></br>
		<div class="form-group">
		  <label for="mail"><b>Address:</b></label>
		  <input value="<?php echo $return["Address"] ?> " type="text" name="Address" id="Address" class="form-control" size="27">
		</div><br></br>
		<div class="form-group">
		  <label for="Phone number"><b>Phone_number:</b></label>
		  <input value="<?php echo $return["Phone_number"] ?>"  type="text" name="Phone_number" id="Phone_number" class="form-control" size="27">
		</div><br></br>
	
				
		<button type="button" id= "update">Update</button><br></br>		
		
	<script>
	
		$.post("api.php", {"action":"get_all"},function(data){
			console.log(data);
		});
		
		$("#logout").click(function(){
			$.post("api.php",{"action":"logout"},function(data){
				if (data.success == "true"){
					location.href = "register_login_bank.php";
				}
			});
		});
		
		$("#update").click(function(){
			$.post("Update_page.php",{"action":"update","username":$("#username").val(),"password":$("#password").val(),"Email":$("#Email").val(),"City":$("#City").val(),"Address":$("#Address").val(),"Phone_number":$("#Phone_number").val()},function(data){
				if (data.success == "true"){
					location.reload();
				}
			});
		});

			
		function openLeftMenu() {
		  document.getElementById("leftMenu").style.display = "block";
		}

		function closeLeftMenu() {
		  document.getElementById("leftMenu").style.display = "none";
		}

		function openRightMenu() {
		  document.getElementById("rightMenu").style.display = "block";
		}

		function closeRightMenu() {
		  document.getElementById("rightMenu").style.display = "none";
		}

	
	</script>		
		
		
	
</body>
</html>