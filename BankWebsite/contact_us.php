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
			background-image: url("https://wallpaperaccess.com/full/1431622.jpg")
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
		#img1 {
			position: absolute;
			top: 102px;
			right: -10px;
		}
		
		#img2 {
			position: absolute;
			top: 102px;
			right: 470px;
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
	</div></br>
	 
	
<h1><u>Contact Us:</u></h1></br>
<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;">Activity time: Sunday-Friday 08:00-16:00</span></br></br>
<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;">Phone-Number: +972111111111</span></br></br>
<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;">Mail: YMTzioni@Bank.co.il</span></br></br>
<span style="font-size: 22px;" data-andiallelmwithtext="22" andisavestyle="font-size: 22px;"><u>Location:</u></br></br>
 Elyachin Center , Israel</br></br>
 


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2Ms-eSUljxE6qfyACpg-8Q1jbfmOyLxc&callback=myMap"></script>





<img src="https://media.istockphoto.com/photos/got-a-problem-contact-us-picture-id1129113667?k=20&m=1129113667&s=612x612&w=0&h=-NVtUCwT5PYmfHgHWUTKNkJhyJ_9rnD5m9ryN_ai_X4=" width="480" height="550" id="img1">


   









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