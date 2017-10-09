<?php 

session_start();

      if(!isset($_SESSION['username'])) 
      header("Location: login.html");  
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Accounts</title>


<link rel="stylesheet" href="css/topnav.css" type="text/css">
<link rel="stylesheet" href="css/left.css" type="text/css">
<link rel="stylesheet" href="css/right.css" type="text/css">
<style type="text/css">
  #e{
    color: #E9181C;
    font-size: 17px;
    font-weight:bold;
    margin-left: 5%;
  }
</style>
</head>

<body>
<?php include 'navtop.php';?> 

 <p id="e">Username already taken ! Retry</p>

<?php include 'navleft.php';?>

<div class="del" id="del" style="float:right; margin-right:5%; margin-top:30px;">
 <form id='form2' name='form2' method='POST' action='deleteuserphp.php'>
  <input type="text" placeholder="username" name="uname" id="uname">
  <button id='delete'>delete</button>
 </form>

</div>

<div id="right">
  <p>&nbsp;</p>
  <table id="table_" align="center">
    <tbody>
      <tr>
        <th scope="col">S.no.</th>
        <th scope="col">Username</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Password</th>
        <th scope="col">Action</th>
        
      </tr>
      <form id="form1" name="form1" method="POST" action="adduserphp.php">
      <tr>
        <td><label name="sno"></label></td>
        <td><input type="text" placeholder="username" name="uname" required></td>
        <td><input type="text" placeholder="first name" name="firstname" required></td>
        <td><input type="text" placeholder="last name" name="lastname" required></td>
        <td><input type="text" placeholder="contact" name="contact" required></td>
        <td><input type="text" placeholder="password" name="pword" required></td>
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

     $sql5="Select * from login";
     $res5=mysql_query($sql5);
     while ($row5=mysql_fetch_array($res5)) {
      if ($row5['status']==NULL) {
	    echo "
      <tr>
        <td>".++$sno."</td>
        <td name='uname'>".$row5['username']."</td>
        <td>".$row5['firstname']."</td>
        <td>".$row5['lastname']."</td>
        <td>".$row5['contact']."</td>
        <td>".$row5['password']."</td>
       </tr>";
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