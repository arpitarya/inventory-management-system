<?php 
session_start();
      if(!isset($_SESSION["username"]))
      header("Location: login.html");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>


<link rel="stylesheet" href="css/topnav.css" type="text/css">
<link rel="stylesheet" href="css/left.css" type="text/css">
<link rel="stylesheet" href="css/right.css" type="text/css">
</head>

<body>
  <tr > </tr>

<?php include 'navtop.php'; include 'navleft.php';?>

<div id="right" style="height:200px; overflow:hidden;">
  <div id="title_">Statistics</div>
  <p>&nbsp;</p>
  <table id="table_" align="center">
    <tbody>
    <?php

    $con = mysql_connect("localhost","root","");
    $sumofpurchases=0;
    $sumofsales=0;
    $ap=0;
    $p=0;
    $s=0;
    $pq=0;
    $sq=0;
    $tbb=0;

    if(!$con){
     die("could not connect".mysql_error());
    }

    else{
     mysql_select_db("stock_m_s",$con);

     $sql1="Select * from stocks";
     $res1=mysql_query($sql1);
     while ($row1=mysql_fetch_array($res1)) {
       $ap+=$row1['quantity'];
       $p +=$row1['payment'];
       $s +=$row1['amount'];
       $pq+=$row1['pquantity'];
       $sq+=$row1['squantity'];
       if ($row1['quantity'] < "2") {
         $tbb++;
       }
     }

     $sql2="Select * from purchases";
     $res2=mysql_query($sql2);
     while ($row2=mysql_fetch_array($res2)) {
       $sumofpurchases+=1;
     }

     $sql3="Select * from sales";
     $res3=mysql_query($sql3);
     while ($row3=mysql_fetch_array($res3)) {
       $sumofsales+=1;
     }
     mysql_close();

      echo "<tr>";
        echo "<td>Available Products</td>";
        echo "<td>".$ap."</td>";
        echo "<td></td>";
        if ($tbb > 0) {
          echo "<td bgcolor='red'>Products to be bought</td>";
          echo "<td bgcolor='red'>".$tbb."</td>";
        }
        else {
          echo "<td>Products to be bought</td>";
          echo "<td>".$tbb."</td>";
        }
        
      echo "</tr>"; 

      echo "<tr>";
        echo "<td>Purchase Transactions</td>";
        echo "<td>".$sumofpurchases."</td>";
        echo "<td></td>";
        echo "<td>Purchased Products</td>";
        echo "<td>".$pq."</td>";
      echo "</tr>"; 

      echo "<tr>";
        echo "<td>Sale Transactions</td>";
        echo "<td>".$sumofsales."</td>";
        echo "<td></td>";
        echo "<td>Sold Products</td>";
        echo "<td>".$sq."</td>";
      echo "</tr>"; 
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