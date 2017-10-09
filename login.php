<?php
session_start();
if(!isset($_SESSION["username"]))
      header("Location: login.html");  
?>

<?php
$con = mysql_connect("localhost","root","");
$go=0;

if(!$con){
	die("could not connect".mysql_error());
}

else{
	mysql_select_db("stock_m_s",$con);
	$sql="Select username,password from login";
	$res=mysql_query($sql);

	$username=$_POST['username'];
	$password=$_POST['password'];

	while ($row=mysql_fetch_array($res)) {
		$t_username=$row['username'];
		$t_password=$row['password'];

		if ($t_username==$username && $t_password==$password) {
			$go=1;
			break;
		}
	}
}

mysql_close();

if ($go==1) {
	$_SESSION["username"]=$_POST["username"];
	header("location: dashboard.php");
}
else{

	header("location: elogin.html");
}

?>