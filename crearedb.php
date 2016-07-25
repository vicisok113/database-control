<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>


<br><center><h2 class="heading">Crearea unei baze de date</h2></center><br><br>

<div class="body">
	<div class="row">
		<div class="col-md-8 col-lg-8">

			<h3>Scrieti comanda pentru crearea bazei de date:</h3><br>
			<div class="help-tip">
				<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
			</div>

			<form action="" method="POST">

			<div class="row">

				<div class="col-sm-5 col-md-5 col-lg-5">
					<div class="form-group">
		    			<label>Comanda MySQL:</label>
					 	<input class="form-control" placeholder="Comanda MySQ" type="text" name="comanda_sql">
					 </div>
				</div>
				
				<div class="col-sm-5 col-md-5 col-lg-5">
					<div class="form-group">
		    			<label>Numele bazei de date:</label>
						<input class="form-control" placeholder="Numele bazei de date" class="input_comanda" type="text" name="nume_db"> 
					</div>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2">
					<br><input type="submit" value="Creează" class="btn btn-primary btn-md">
				</div>

			</div>

			</form>

			<br><center>
			<?php 

			if (empty($_POST)===false) {

				if(empty($_POST['comanda_sql']) && empty($_POST['nume_db'])) {
					echo "<h4 class='error'>Ambele câmpuri trebuie completate</h4>";
				} elseif (empty($_POST['comanda_sql'])) {
					echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
				} elseif (empty($_POST['nume_db'])) {
					echo "<h4 class='error'>Numele bazei de date este necesar</h4>";
				} elseif ($_POST['comanda_sql'] === "CREATE DATABASE" || $_POST['comanda_sql'] === "create database") {
					$dbn=$_POST['nume_db'];
					$username=$_SESSION['username'];

					if(db_exists($dbn, $username)) {
						mysql_query("INSERT INTO baze_de_date (nume,user) VALUES ('$dbn','$username')"); ?>
						<script>
					    	alert("Bravo! Ai creat cu succes baza de date numită \" <?=$dbn?> \"");
					   		window.location.href = "crearedb.php";
						</script>					
					<?php } else {
						echo '<script>
							window.alert("Aceasta baza de date exista deja.");
							window.location.href = "crearedb.php";
						</script>';
					}
					
				} else {
					echo "<h4 class='error'>Comandă MySQL greșită</h4>";
				}
				
			}
			?> </center>

		</div>

		<div class="col-md-4 col-lg-4 right">

			<?php include 'includes/sidebar.php'; ?>

		</div>
	</div>
</div>

<? } ?>

<?php include "includes/footer.php"; ?>