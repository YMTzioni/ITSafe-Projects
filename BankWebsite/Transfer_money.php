<?php
session_start();

if (!isset($_SESSION["user"])) {
   
    header("location: index.php");
}
$cursor = false;
$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank 2", "root", "");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $cursor = $MySQLdb->prepare("SELECT * FROM transfers WHERE username=:username");
    $cursor->execute(array(":username" => $_POST["username"]));

    if ($cursor->rowCount()) {
        $msg = "username or password already exist";
    } 
	else {
        $cursor = $MySQLdb->prepare("INSERT INTO transfers (username,password,Bank_account_number,sum) value (:username,:password,:Bank_account_number,:sum)");
        $cursor->execute(array(":username" => $_POST["username"],":password" => $_POST["password"],":Bank_account_number" => $_POST["Bank_account_number"],":sum" => $_POST["sum"]));
        $SESSION["user"] = $_POST["username"];
        $msg = "Transfer successfully";
    }
} 
else if (isset($_POST['username']) && isset($_POST['password'])) {
    $cursor = $MySQLdb->prepare("SELECT * FROM transfers WHERE username=:username AND password=:password");
    $cursor->execute(array(":username" => $_POST["username"], ":password" => $_POST["password"], ":Bank_account_number" => $_POST["Bank_account_number"],":sum" => $_POST["sum"]));
}
    //  $SESSION["user"] = $return_value["username"];
    if($cursor != false){
	if ($cursor->rowCount()) {
    

		$return_value = $cursor->fetch();
		
        $_SESSION["username"] = $return_value["username"];
		echo  $_SESSION["username"];
		
		$_SESSION["password"] = $return_value["password"];
		echo  $_SESSION["password"];
		
		
		$_SESSION["Bank_account_number"] = $return_value["Bank_account_number"];
		echo  $_SESSION["Bank_account_number"];

		$_SESSION["sum"] = $return_value["sum"];
		echo  $_SESSION["sum"];
}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charest="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
    <title>Transfer Money</title>
	
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
	   
  </head>
  <style>
		
		body {
			  background-image: url("https://wallpaperaccess.com/full/4600300.jpg");
			  background-repeat: no-repeat;
			  background-attachment: fixed;  
			  background-size: cover ;
			}
		table {
		  border-collapse: collapse;
		  border-spacing: 0;
		  width: 100%;
		  border: 1px solid #ddd;
		  
		  
		 
		}

		th, td {
		  text-align: left;
		  padding: 16px;
		}

		tr:nth-child(even) {
		  
		}
		
		

		li {
		  float: left;
		}

		li a {
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}

		
	
</style>

  </style>
			<h1 style="color:black;">History of transfers:</h1>

  <table>
  <tr>
    <b><th style="color:black;">Username</th></b>
    <th style="color:black;">Bank account number</th>
    <th style="color:black;">Summary</th>
	
  </tr>
  <tr>
    <td style="color:blue;"><b>Roman</b></td>
    <td style="color:blue;"><b>12</b></td>
	<td style="color:blue;"><b>500000$</b></td>
  </tr>
  <tr>
    <td style="color:blue;"><b>Shay</b></td>
	<td style="color:blue;"><b>13</b></td>
    <td style="color:blue;"><b>30000$</b></td>

  </tr>
  <tr>
    <td style="color:blue;"><b>Moriel</b></td>
	<td style="color:blue;"><b>14</b></td>
    <td style="color:blue;"><b>6800$</b></td>
  </tr>
   <tr>
    <td style="color:blue;"><b>Or</b></td>
	<td style="color:blue;"><b>15</b></td>
    <td style="color:blue;"><b>5600$</b></td>
  </tr>
   <tr>
    <td style="color:blue;"><b>YMTzioni</b></td>
	<td style="color:blue;"><b>1</b></td>
    <td style="color:blue;"><b>10000000$</b></td>
  </tr>
</table></br></br>
  <h1 style="color:black;">Transfer Money</h1>
  <body>
  <input type="text" placeholder="Enter Username" name="username" id="username" required>
  <input type="text" placeholder="Enter Password" name="password" id="password" required>
  <input type="text" placeholder="Enter bank_account_number" name="bank_account_number" id="bank_account_number" required>
  <input type="text" placeholder="Enter Sum" name="" required>
  <button type="button" id="transfer">Transfer</button>
  </body>
  
  
  
  
  

  

  
  
  
  
  
  
  
<script>

	$("#logout").click(function(){
			$.post("api.php",{"action":"logout"},function(data){
				if (data.success == "true"){
					location.href = "register_login_bank.php";
				}
			});
	});
	
	$("#transfer").click(function(){
		$.post("Transfer_money.php",{"action":"transfer","username":$("#username").val(),"password":$("#password").val(),"bank_account_number":$("#bank_account_number").val(),"Sum":$("#Sum").val()},function(data){
			if (data.success == "true"){
				location.href = "index.php";
			}
		});
	});
	
	 $("#sendamount").click(function () {  
            $.post("api.php", {"action": "transfer", "moneyto": $("#moneyto").val(), "howmuch": $("#howmuch").val()}, function (data) {  
                if (data) {  
                   // console.log(data);  
                    $("#result2").html("sent to: " + data.touser + "<br> the user have: " + data.moneyOnAccount + "<br> the amout you sent: " + data.howmuch + "<br> now he have: " + data.nowPayeeHave + "<br> you have now: " + data.nowYouHave);  
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
</html>




