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

     $id=$_POST['id'];
     $name=$_POST['name'];
     $quantity=$_POST['quantity'];
     $amount=$_POST['amount'];

     $sql2="Select * from stocks";
     $res2=mysql_query($sql2);
     while ($row2=mysql_fetch_array($res2)) {
        if ($id==$row2['stockid']) {
            $payment_s=$row2['payment']+$amount;
            $quantity_s=$row2['quantity']-$quantity;
            $quantity_sa+=$quantity;
            if ($quantity<$row2['quantity']) {
                $go=1;
            }
            break;
        }
     }
     if ($go==1) {

     $sql1="INSERT INTO sales(username,stockid,saledate,salequantity,saleamount) 
            VALUES ('".$_SESSION['username']."','".$id."','".date("Y/m/d")."','".$quantity."','".$amount."')";
     mysql_query($sql1);

     $sql3="UPDATE stocks SET quantity='".$quantity_s."',payment='".$payment_s."',squantity='".$quantity_sa."' WHERE stockid='".$id."'"; 
     mysql_query($sql3);
     }

     else {
        header("location: esales.php");
        break;
     }
     
     }

     mysql_close();

     header("location: sales.php");
?>