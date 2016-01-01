<?php
$Password = $_REQUEST["Password"];
$Login = $_REQUEST["Login"];

$Hostname = "localhost";
$DBName="loginsystemchestgame";
$User ="root";
$PasswordP = "";

mysql_connect($Hostname,$User,$PasswordP) or die("can't conect to database");
mysql_select_db($DBName) or die("Can't select database");

if(!$Login || !$Password)
{
	echo "Empty";
}
else
{
	$SQL = "SELECT * FROM accounts WHERE Login = '" . $Login . "'";
	$Result = mysql_query($SQL) or die("DB Errro");
	$Total = mysql_num_rows($Result);
	if($Total == 1)
	{
		$datas = @mysql_fetch_array($Result);
		if(strcmp($PasswordP, $datas["password"]))
		{
			$ip = $_SERVER['REMOTE_ADDR'];
			$now = new DateTime();
			$date= $now->format('Y-m-d H:i:s');

			$insert = "INSERT INTO `logintabel` (`date`, `ip`, `Login`) VALUES ('" .  $date . "', '" . $ip . "','" . $Login ."')";
			$SQL = mysql_query($insert);
			$code
			echo "LoginSucess";
		}
		else
		{
			echo "Wrong Password";
		}
	}
	else if($Total > 1)
		echo "login have more than one account";
	else
		echo "login not exit";
		
}
?>