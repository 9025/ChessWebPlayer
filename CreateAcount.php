<?php
$Email =$_REQUEST["Email"];
$Password = $_REQUEST["Password"];
$Login = $_REQUEST["Login"];

$Hostname = "localhost";
$DBName="loginsystemchestgame";
$User ="root";
$PasswordP = "";

mysql_connect($Hostname,$User,$PasswordP) or die("can't conect to database");
mysql_select_db($DBName) or die("Can't select database");

if(!$Email || !$Password)
{
	echo "Empty";
}
else
{
		$SQL = "SELECT * FROM accounts WHERE Email = '" . $Email . "'";
		$Result = mysql_query($SQL) or die("DB Errro");
		$Total = mysql_num_rows($Result);
		if($Total == 0)
		{
			$insert = "INSERT INTO `accounts` (`email`, `password`, `Login`) VALUES ('" .  $Email . "', MD5('" . $Password . "'),'" . $Login ."')";
			$SQL = mysql_query($insert);
			echo "CreateAccountSucess";
		}
		else
			echo "Accounts Already Exist";
}

?>