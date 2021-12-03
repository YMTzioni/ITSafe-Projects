<?php
	session_start();
	
	if(!isset($_SESSION["user"]))
    {
		header("location: register_login_bank.php");
    }
	
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank_2", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$action = $_POST["action"];
	
	if (isset($_POST["data"])){
		$data = $_POST["data"];
	}
	
	header("Content-Type: application/json");
	switch($action){
		case "logout":
			session_destroy();
			echo '{"success":"true"}';
			break;


		default:
			echo '{"success":"false"}';
			die();

		case "transfer":  
					// we place the POSTS in variables  
					$howmuch = $_POST["howmuch"];  
					$moneyto = $_POST["moneyto"];  
		  
					//pull the data of the payee from database  
					$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username");  
					$cursor->execute(array(":username" => $moneyto));  
					$payTo = $cursor->fetch();  
		  
					//we pull the balance from the database  
					$ToUserBallance = $payTo["amount"];  
					$touser = $payTo["username"];  
		  
					//we calculate the new balance  
					$newPayeeBalance = $ToUserBallance + $howmuch;  
		  
					//now we need to save the new balace to the payee amount we use UPDATE!  
					$data = [  
						'username' => $touser,  
						'amount' => $newPayeeBalance  
					];  
					$sql = "UPDATE users SET Amount_in_account=:Amount_in_account WHERE username=:username";  
					$stmt = $MySQLdb->prepare($sql);  
					$stmt->execute($data);  
		  
					//we have to update the payer balance  
					//so we pull his ballance from the database - we use the $_SESSION["user"] to idendify the logged in user  
					$cursor1 = $MySQLdb->prepare("SELECT * FROM users WHERE username=:fromusername");  
					$cursor1->execute(array(":fromusername" => $_SESSION["user"]));  
					$payFrom = $cursor1->fetch();  
					$fromUserBalance = $payFrom["amount"];  
		  
					//we deduct the amount from his ballance  
					$newPayerBallance = $fromUserBalance - $howmuch;  
		  
					//and save it with UPDATE  
					$data1 = [  
						'username' => $_SESSION["user"],  
						'Amount_in_account' => $newPayerBallance  
					];  
					$sql1 = "UPDATE users SET Amount_in_account=:Amount_in_account WHERE username=:username";  
					$stmt1 = $MySQLdb->prepare($sql1);  
					$stmt1->execute($data1);

	}

?>	
