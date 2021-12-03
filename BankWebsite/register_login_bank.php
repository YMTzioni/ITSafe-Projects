<?php
session_start();

if (isset($_SESSION["user"])) {
   
    header("location: index.php");
}


$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank 2", "root", "");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["r_username"]) && isset($_POST["r_password"])) {
    $cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username");
    $cursor->execute(array(":username" => $_POST["r_username"]));

    if ($cursor->rowCount()) {
        $msg = "username or password already exist";
    } else {
        $cursor = $MySQLdb->prepare("INSERT INTO users (username,password,Email,Phone_number,Bank_account_number,Amount_in_account,City,Address) value (:username,:password,:Email,:Phone_number,:Bank_account_number,:Amount_in_account,:City,:Address)");
        $cursor->execute(array(":username" => $_POST["r_username"],":password" => $_POST["r_password"],":Email" => $_POST["Email"],":Phone_number" => $_POST["Phone_number"],":Bank_account_number" => $_POST["Bank_account_number"],":Amount_in_account" => $_POST["Amount_in_account"],":City" => $_POST["City"],":Address" => $_POST["Address"]));
        $SESSION["user"] = $_POST["r_username"];
        $msg = "registered successfully";
    }
} else if (isset($_POST['l_username']) && isset($_POST['l_password'])) {
    $cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
    $cursor->execute(array(":username" => $_POST["l_username"], ":password" => $_POST["l_password"]));
    //  $SESSION["user"] = $return_value["l_username"];
    if ($cursor->rowCount()) {
       
        $return_value = $cursor->fetch();
		
        $_SESSION["user"] = $_POST['l_username'];
		echo  $_SESSION["user"];
		
		$_SESSION["l_password"] = $_POST['l_password'];
		echo  $_SESSION["l_password"];
			
		$_SESSION["Email"] = $return_value["Email"];
		echo  $_SESSION["Email"]; 
		
		$_SESSION["Phone_number"] =$return_value["Phone_number"];
		echo  $_SESSION["Phone_number"];
		
		$_SESSION["Bank_account_number"] = $return_value["Bank_account_number"];
		echo  $_SESSION["Bank_account_number"];
		
		$_SESSION["Amount_in_account"] = $return_value["Amount_in_account"];
		echo  $_SESSION["Amount_in_account"];
		
		$_SESSION["City"] = $return_value["City"];
		echo  $_SESSION["City"];
		
		$_SESSION["Address"] = $return_value["Address"];
		echo  $_SESSION["Address"];

		
        header("location: index.php");
      
    } else {


        $msg = "Worng username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>


	body {
	  background-image: url("https://wallpaperaccess.com/full/2312001.jpg");
	  background-repeat: no-repeat;
	  background-attachment: fixed;  
	  background-size: cover ;
	}

</style>
<body>

    <div class="container">
        <div class="raw">
            <div class="col-md-12 text-center">
                <h2 class="jumbotron">WELCOME TO YMTzioni's BANK</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Login

                    </div>
                    <div class="panel-body" id="login-panel">
                        <form action="register_login_bank.php" method="POST">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="Email" type="text" class="form-control" name="l_username" placeholder="username">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="l_password" type="password" class="form-control" name="l_password" placeholder="password">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">login</button>
                            <a href="#" id="register"><i class="glyphicon glyphicon-info-sign"></i>register</a>
                            <?php
                            if (isset($msg)) {
                                echo '<div class="alert alert-info"><strong>Info!</strong>' . $msg . '</div>';
                            }
                            ?>
                        </form>
                    </div>
                    <div class="panel-body" id="register-panel" hidden>
                        <form action="register_login_bank.php" method="POST">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="r_username" type="text" class="form-control" name="r_username" placeholder="username">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="r_password" type="password" class="form-control" name="r_password" placeholder="password">
                            </div></br>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input id="Email" type="text" class="form-control" name="Email" placeholder="Email">
							</div></br>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input id="Phone_number" type="Phone_number" class="form-control" name="Phone_number" placeholder="Phone_number">
							</div></br>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input id="Bank_account_number" type="Bank_account_number" class="form-control" name="Bank_account_number" placeholder="Bank_account_number">
							</div></br>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input id="Amount_in_account" type="text" class="form-control" name="Amount_in_account" placeholder="Amount_in_account">
							</div></br>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input id="City" type="City" class="text" name="City" placeholder="City">
							</div></br>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input id="Address" type="Address" class="form-control" name="Address" placeholder="Address"></br></br>
							</div></br>	
						
                            <button type="submit" class="btn btn-primary btn-block">register</button>
                            <a href="#" id="login"><i class="glyphicon glyphicon-info-sign"></i>login</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#register").click(function() {
                $("#login-panel").fadeOut(1000);
                $("#register-panel").delay(1000).fadeIn(1000);
            });
            $("#login").click(function() {
                $("#register-panel").fadeOut(1000);
                $("#login-panel").delay(1000).fadeIn(1000);
            });
        </script>
</body>

</html>



