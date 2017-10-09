<?php 
session_start();
      if(!isset($_SESSION['username'])) 
      header("Location: login.html");  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sales</title>


<link rel="stylesheet" href="css/topnav.css" type="text/css">
<link rel="stylesheet" href="css/left.css" type="text/css">
<link rel="stylesheet" href="css/right.css" type="text/css">

</head>

<body>
<?php include 'navtop.php'; include 'navleft.php';?>

<div id="right">
  <p>&nbsp;</p>
  <table id="table_" align="center">
    <tbody>
      <tr>
        <th scope="col">S.no.</th>
        <th scope="col">Transaction By</th>
        <th scope="col">Stock Id</th>
        <th scope="col">Stock Name</th>
        <th scope="col">Date</th>
        <th scope="col">Quantity</th>
        <th scope="col">Payment</th>
        <th scope="col">Action</th>
        
      </tr>
      
      <form id="form1" name="form1" method="POST" action="addsalephp.php">
      <tr>
        <td><label name="sno"></label></td>
        <td><label name="transactionby"><?php echo $_SESSION['username']; ?></label></td>
        <td><input type="text" placeholder="stock id" name="id" required></td>
        <td><input type="text" placeholder="stock name" name="name" required></td>
        <td><label name="date"><?php echo date("Y-m-d"); ?></label></td>
        <td><input type="text" placeholder="quantity" name="quantity" required></td>
        <td><input type="text" placeholder="amount(total)" name="amount" required></td>
        <td><button id="add">add</button></td>
       </tr>
       </form>

<?php

    $con = mysql_connect("localhost","root","");
    $sno=0;

    if(!$con){
     die("could not connect".mysql_error());
    }

    else{
     mysql_select_db("stock_m_s",$con);

     $sql4="SELECT * FROM sales INNER JOIN stocks ON sales.stockid=stocks.stockid";
     $res4=mysql_query($sql4);
     while ($row4=mysql_fetch_array($res4)) {
      echo "<form id='form1' name='form1' method='POST' action='deletedata.php'>";
       echo "<tr>";
        echo "<td>".++$sno."</td>";
        echo "<td>".$row4['username']."</td>";
        echo "<td>".$row4['stockid']."</td>";
        echo "<td>".$row4['stockname']."</td>";
        echo "<td>".$row4['saledate']."</td>";
        echo "<td>".$row4['salequantity']."</td>";
        echo "<td>".$row4['saleamount']."</td>";
       echo "</tr>";
      echo "</form>"; 
     } 
    }

?>
<tr>
    <td>
    </td>
    </tr>
    </tbody>
  </table>
</div>

<p>&nbsp;</p>


</div>

</body>
</html>