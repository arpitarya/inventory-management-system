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
     $pquantity=0;

     $sql1="INSERT INTO purchases(username,stockid,purchasedate,purchasequantity,purchaseamount) 
            VALUES ('".$_SESSION['username']."','".$id."','".date("Y/m/d")."','".$quantity."','".$amount."')";
     mysql_query($sql1);

     $sql2="Select * from stocks";
     $res2=mysql_query($sql2);
     while ($row2=mysql_fetch_array($res2)) {
        if ($id==$row2['stockid']) {
            $amount+=$row2['amount'];
            $pquantity=$row2['pquantity']+$quantity;
            $quantity+=$row2['quantity'];
            $go=1;
            break;
        }
     }

     if ($go==1) {
         $sql3="UPDATE stocks SET quantity='".$quantity."',amount='".$amount."',pquantity='".$pquantity."' WHERE stockid='".$id."'"; 
     }
     else {
         $sql3="INSERT INTO stocks(stockid,stockname,quantity,amount,pquantity)
            VALUES ('".$id."','".$name."','".$quantity."','".$amount."','".$quantity."')";
     }

     mysql_query($sql3);
     }

     mysql_close();

     header("location: purchases.php");
?>