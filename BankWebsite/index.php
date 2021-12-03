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
		  background-image: url("https://wallpaperaccess.com/full/1431622.jpg");
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
	
		.navbar {
		  overflow: hidden;
		  background-color: #333;
		}

		.navbar a {
		  float: left;
		  font-size: 16px;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}
		#title {
		  width: 400px;
		  height: 150px;
		  position: absolute;
		  top: 430px;
		  left: 0px;
		}
		#usa {
		  width: 180px;
		  height: 150px;
		  position: absolute;
		  top: 500px;
		  left: 0px;
		}
		#euro {
		  width: 180px;
		  height: 150px;
		  position: absolute;
		  top: 500px;
		  left: 200px;
		}
		#israel {
		  width: 180px;
		  height: 150px;
		  position: absolute;
		  top: 500px;
		  left: 400px;
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
	  <h1>My Details:</h1>  
  <table>
  <tr>
	<th>Username</th>
	<th>Email</th>
	<th>Phone Number</th>
	<th>Bank account number</th>
	<th>Amount in account</th>
	<th>City</th>
	<th>Address</th>
  </tr>
  <tr>
    <td><?php echo $_SESSION["user"]; ?></td>
    <td><?php echo $_SESSION["Email"]; ?></td>
	<td><?php echo $_SESSION["Phone_number"]; ?></td>
	<td><?php echo $_SESSION["Bank_account_number"]; ?></td>
	<td><?php echo $_SESSION["Amount_in_account"]; ?></td>
	<td><?php echo $_SESSION["City"]; ?></td>
	<td><?php echo $_SESSION["Address"]; ?></td>
  </tr> 
  </table></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>




<h2 id="title"><u>NEWS:</u></h2>
<div class="gallery" id="usa">
  <a target="_blank" href="https://www.bbc.com/news/topics/cvenzmgyw42t/banking">
	<img src="https://i.pinimg.com/originals/ba/84/b9/ba84b9c41584e19ef4d9b6a5bf7a3069.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc" style="color:black;">USA</div>
</div>

<div class="gallery" id="euro">
  <a target="_blank" href="https://www.euronews.com/tag/banking">
	<img src="https://staticcorpo.euronews.com/wp-content/uploads/euronews-logo-our-brands.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc" style="color:black;">EUROPE</div>
</div>

<div class="gallery" id="israel">
  <a target="_blank" href="https://www.themarker.com/misc/tags/TAG-Bank-1.3427">
	<img src="https://upload.wikimedia.org/wikipedia/he/thumb/b/b3/TheMarker_Logo.svg/1280px-TheMarker_Logo.svg.png" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc" style="color:black;">ISRAEL</div>
</div>

























	
<script>
	$("#logout").click(function(){
			$.post("api.php",{"action":"logout"},function(data){
				if (data.success == "true"){
					location.href = "register_login_bank.php";
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