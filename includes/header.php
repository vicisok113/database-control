<!DOCTYPE html>

<html>

<head>

	<title>Controlul bazelor de date</title>

	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="includes/style.css">

	<!-- Bootsrap -->

	<link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="includes/codemirror/lib/codemirror.css">

	<link rel="stylesheet" href="includes/codemirror/addon/hint/show-hint.css" />

</head>

<body>

<!-- Menu start -->
<div class="meniu">
	
	<!-- Menu toggle button -->
	<button class="btn btn-primary btn-lg navbar-toggler hidden-sm-up hidden-sm hidden-md hidden-lg" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" onclick="toggle_func()">
		<i class="fa fa-bars"></i>
  	</button>

	<!-- Menu colapse div start --> <!--<span class="caret"></span>-->
	<div class="row collapse navbar-toggleable-xs hidden-sm hidden-md hidden-lg" id="nav_colapse">
		<ul class="menu_ul">
			<li class="menu_link col-md-1 col-sm-1"><a href="index.php">Acasă</a></li>
			 <li class="menu_link col-md-1 col-sm-1">

				<a data-toggle="dropdown" href="index.php">Lecții</a>
				
				<ul id="dr-responsive" class="dropdown-menu">

					<?php $result = mysql_query("SELECT * FROM lectii");
					while ($row = mysql_fetch_assoc($result)) { 
						$id=$row['id'];
						$titlu=$row['titlu']; ?>

						<li><a href="lectie.php?id=<?=$id?>"><?=$titlu?></a></li>

					<?php } ?>

		  		</ul>

			</li>
			<li class="menu_link col-md-1 col-sm-1">

				<a data-toggle="dropdown" href="index.php">Exerciții</a>

				<ul id="dr-responsive" class="dropdown-menu">

				    <li><a href="crearedb.php">Crearea bazei de date</a></li>

					<li><a href="creare-tabel.php">Crearea unui tabel</a></li>

					<li><a href="populare-tabel.php">Popularea bazei de date</a></li>

					<li><a href="interogari.php">Interogari</a></li>

		  		</ul>

			</li>
			<li class="menu_link col-md-1 col-sm-1">

				<a data-toggle="dropdown" href="index.php">Teste</a>

				<ul id="dr-responsive" class="dropdown-menu">

				    <li><a href="test-grila.php">Test grilă</a></li>

					<li><a href="test-practic.php">Test practic</a></li>

		  		</ul>

			</li>
			<li class="col-md-3 col-sm-3"></li>
		
			<?php 

			if(empty($_SESSION) === false){

				if($_SESSION['logged_in'] == 1) {

			?>

			<li class="menu_link col-md-1 col-sm-1"><a href="cont.php">Cont</a></li>

			<li class="menu_link col-md-1 col-sm-1"><a href="logout.php">Logout</a></li>

			<li class="col-md-2 col-sm-2">
				<form action="cautare.php" method="post">
				    <div class="input-group">
				      <input type="text" class="form-control" name="cautare" placeholder="Căutare..." required>
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				      </span>
				      
				    </div>
			  	</form>
			</li>

			<?php }} else { ?>

			<li class="menu_link col-md-1 col-sm-1"><a href="signup.php">Sign up</a></li>

			<li class="menu_link col-md-1 col-sm-1"><a href="login.php">Login</a></li>			
		
			<?php } ?>
		</ul>
	</div>
	<!-- Menu colapse div end -->

		<ul class="menu_ul hidden-xs ">
			<li class="menu_link fleft"><a href="index.php">Acasă</a></li>
			 <li class="menu_link pull-left">
				
				<a data-toggle="dropdown" href="index.php">Lecții</a>
				<div class=""></div>
				<ul id="drd" class="dropdown-menu">

					<?php $result = mysql_query("SELECT * FROM lectii");
					while ($row = mysql_fetch_assoc($result)) { 
						$id=$row['id'];
						$titlu=$row['titlu']; ?>

						<li class="dr1"><a href="lectie.php?id=<?=$id?>"><?=$titlu?></a></li>

					<?php } ?>

		  		</ul>

			</li>
			<li class="menu_link fleft">

				<a data-toggle="dropdown" href="index.php">Exerciții</a>

				<ul id="drd" class="dropdown-menu">

				    <li class="dr2"><a href="crearedb.php">Crearea bazei de date</a></li>

					<li class="dr2"><a href="creare-tabel.php">Crearea unui tabel</a></li>

					<li class="dr2"><a href="populare-tabel.php">Popularea bazei de date</a></li>

					<li class="dr2"><a href="interogari.php">Interogari</a></li>

		  		</ul>

			</li>
			<li class="menu_link fleft">

				<a data-toggle="dropdown" href="index.php">Teste</a>

				<ul id="drd" class="dropdown-menu">

				    <li class="dr3"><a href="test-grila.php">Test grilă</a></li>

					<li class="dr3"><a href="test-practic.php">Test practic</a></li>

		  		</ul>

			</li>
			<li class="col-md-3 col-sm-3"></li>
		
			<?php 

			if(empty($_SESSION) === false){

				if($_SESSION['logged_in'] == 1) {

			?>

			<li class="menu_link fright"><a href="logout.php">Logout</a></li>

			<li class="menu_link fright"><a href="cont.php">Cont</a></li>

			<li class="search fright">
				<form action="cautare.php" method="post">
				    <div class="input-group">
				      <input type="text" class="form-control" name="cautare" placeholder="Căutare..." required>
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				      </span>
				      
				    </div>
			  	</form>
			</li>
			
			<?php }} else { ?>

			<li class="menu_link fright"><a href="signup.php">Sign up</a></li>

			<li class="menu_link fright"><a href="login.php">Login</a></li>
		
			<?php } ?>

		</ul>

</div>
<!-- Menu end -->

<br><br>

<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$fisier = substr($actual_link, -14);
$fisier2 = substr($actual_link, -16);

if($fisier !== "test-grila.php" || $fisier2 !== "test-practic.php") {
	include "includes/notite.php"; 
}?>
