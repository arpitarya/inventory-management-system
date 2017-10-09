

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
<div id="top"></div>
<nav class="navbar" role="navigation">
<div class="collapse" id="collapse">
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="stocks.php">Stock</a>
                    </li>
                    <li>
                        <a href="sales.php">Sales</a>
                    </li>
                    <li>
                        <a href="purchases.php">Purchases</a>
                    </li>
                    <?php
                    if ($_SESSION['username']=='admin') {
                     echo "<li>";
                      echo "<a href='accounts.php'>Accounts</a>";
                     echo "</li>";
                    } 
                    ?>
                    <li id="log">
                        <a href="dashboard.php" id="log_a">
                         <?php
						  echo "<div>".$_SESSION["username"]."</div>";
						 ?> 
						 </a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
</nav>

<p>&nbsp;</p>




</body>
</html>