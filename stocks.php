<?php 
session_start();
      if(!isset($_SESSION['username'])) 
      header("Location: login.html");  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stock</title>


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
        <th scope="col">Stock Id</th>
        <th scope="col">Stock Name</th>
        <th scope="col">Available</th>
        <th scope="col">Quantity(bought)</th>
        <th scope="col">Amount</th>
        <th scope="col">Quantity(sold)</th>
        <th scope="col">Payment</th>
      </tr>

<?php

    $con = mysql_connect("localhost","root","");
    $sno=0;

    if(!$con){
     die("could not connect".mysql_error());
    }

    else{
     mysql_select_db("stock_m_s",$con);

     $sql1="Select * from stocks";
     $res1=mysql_query($sql1);
     while ($row1=mysql_fetch_array($res1)) {
      if ($row1['quantity']<2) {
       echo "<tr bgcolor='red'>";
        echo "<td>".++$sno."</td>";
        echo "<td>".$row1['stockid']."</td>";
        echo "<td>".$row1['stockname']."</td>";
        echo "<td>".$row1['quantity']."</td>";
        echo "<td>".$row1['pquantity']."</td>";
        echo "<td>".$row1['amount']."</td>";
        echo "<td>".$row1['squantity']."</td>";
        echo "<td>".$row1['payment']."</td>";
        echo "<td></td>";
       echo "</tr>";
     }
     else {
       echo "<tr>";
        echo "<td>".++$sno."</td>";
        echo "<td>".$row1['stockid']."</td>";
        echo "<td>".$row1['stockname']."</td>";
        echo "<td>".$row1['quantity']."</td>";
        echo "<td>".$row1['pquantity']."</td>";
        echo "<td>".$row1['amount']."</td>";
        echo "<td>".$row1['squantity']."</td>";
        echo "<td>".$row1['payment']."</td>";
        echo "<td></td>";
       echo "</tr>";
     }
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