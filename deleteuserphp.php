<?php
session_start();
if(!isset($_SESSION["username"]))
      header("Location: login.html");  
?>

<?php
    $con = mysql_connect("localhost","root","");
    
    if(!$con){
     die("could not connect".mysql_error());
    }

    else{
     mysql_select_db("stock_m_s",$con);

     $uname=$_POST['uname'];
     $go=1;

     $sql1="SELECT * FROM login WHERE username='".$uname."'";
     $res1=mysql_query($sql1);
     while($row1=mysql_fetch_row($res1)){
        if($row['status']=="admin"){
            $go=0;
            break;
        }
     }

     if($go==1){
        $sql2="DELETE FROM login WHERE username='".$uname."'"; 
        mysql_query($sql2);
     }
     }

     mysql_close();

     header("location: accounts.php");
?>