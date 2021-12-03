<?php
	session_start();
   
    if(!isset($_SESSION["user"]))
    {
		header("location: register_login_bank.php");
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
    <title>Main page</title>
  </head>
  <style>
		body {
			  background-color: white;
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
		  background-color: #f2f2f2;
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

		
		
		div.gallery {
					  margin: 5px;
					  border: 1px solid #ccc;
					  float: left;
					  width: 180px;
					}

					div.gallery:hover {
					  border: 1px solid #777;
					}

					div.gallery img {
					  width: 100%;
					  height: auto;
					}

					div.desc {
					  padding: 15px;
					  text-align: center;
					}
			
 </style>
 <body>
		
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
	 
	<h1><u>About us:</u></h1>
		<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;">YMTzioni's Bank was established in 1996</span></br></br>
		<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;">The director of the bank is Yaniv Max Tzioni</span></br></br>
		<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;">The main Bank is located in the in Elyachin</span></br></br>
		
	
	 
	 
<h1>Other Banks:</h1>	  
<div class="gallery">
  <a target="_blank" href="https://www.bankofamerica.com/">
	<img src="data:image/png;base64,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" alt="Cinque Terre" width="600" height="400">
  </a>
  <div class="desc" style="color:black;">BANK OF AMERICA</div>
</div>


<div class="gallery">
  <a target="_blank" href="https://www.boi.org.il/he/Pages/Default.aspx">
	<img src="data:image/jpeg;base64,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" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc" style="color:black;">BANK OF ISRAEL</div>
</div>


































<script>
	$("#logout").click(function(){
			$.post("api.php",{"action":"logout"},function(data){
				if (data.success == "true"){
					location.href = "register_login_bank.php";
				}
			});
	});
	
	      
	//$("#fill").click(function(){
			//$.post("api.php",{"action":"logout"},function(data){
				//if (data.success == "true"){
					//location.href = "register_login_bank.php";
				//}
			//});
	//});
	
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