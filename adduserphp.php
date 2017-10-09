<?php
session_start();
if(!isset($_SESSION["username"]))
      header("Location: login.html");  
?>

<?php
    $con = mysql_connect("localhost","root","");
    $go=1;
    if(!$con){
     die("could not connect".mysql_error());
    }

    else{
     mysql_select_db("stock_m_s",$con);

     $username=$_POST['uname'];
     $firstname=$_POST['firstname'];
     $lastname=$_POST['lastname'];
     $password=$_POST['pword'];
     $contact=$_POST['contact'];

     $sql2="Select * from login";
     $res2=mysql_query($sql2);
     while ($row2=mysql_fetch_array($res2)) {
       if ($row2['username']==$username) {
           $go=0;
       };
     }

     if($go==0){
        header("location: eaccounts.php");
        break;
     }

     if ($go==1) {
          $sql1="INSERT INTO login(username,password,firstname,lastname,contact) VALUES ('".$username."','".$password."','".$firstname."','".$lastname."','".$contact."')";
     mysql_query($sql1);

     }
     }

     mysql_close();

     header("location: accounts.php");
?>