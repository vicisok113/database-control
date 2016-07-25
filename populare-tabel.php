<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>


<br><center><h2 class="heading" id="inserare">Popularea unui tabel</h2></center><br><br>

<div class="body">
<div class="row">

<div class="col-md-8 col-lg-8">

	<h3>Inserarea datelor intr-un tabel:</h3>
	<div class="help-tip">
		<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
	</div><br>

	<form action="" method="POST">

		<div class="row">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<p class="p-select">Baza de date pentru care se face operatia: </p> 
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<select class="form-control" name="db">

				<?php $query = mysql_query("SELECT * FROM baze_de_date where user ='".$_SESSION['username']."' ");

				while($row = mysql_fetch_array($query))
				{
					$baza_de_date =  $row['nume'];?>

					<option value="<?=$baza_de_date?>"><?=$baza_de_date?></option>

				<?php } ?>
				</select> <br>
			</div>
		</div>

		<b>Notă: pentru a vedea structura tabelului dorit, faceti click pe numele lui din dreapta</b><br><br>

		<p>Comanda MySQL pentru inserarea datelor intr-un tabel:</p>

		<textarea class="form-control" rows="10" type="text" name="comanda_mysql_inserare"></textarea><br>

		<input id="actualizare" type="submit" value="Execută" class="btn btn-primary btn-md"><br><br><br>

		<?php //mysql_query("INSERT INTO Musafiri (firstname, lastname, email) VALUES ('Marinel', 'Covata', 'marinel@covata.com')") 

		if(empty($_POST)===false) {
			if(empty($_POST['comanda_mysql_inserare'])) {
				echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
			} else {

				$comanda = $_POST['comanda_mysql_inserare'];

				$cuv_comanda = explode(" ", $comanda);

				$tabel = $cuv_comanda[2]."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

				$cuv_comanda[2] = $tabel;

				$comanda = implode(" ", $cuv_comanda);

				$comanda = $comanda;

				$res = mysql_query($comanda);
				if(mysql_errno()) {
					?><script>
				   		window.location.href = "populare-tabel.php#inserare";
					</script><?php
	    			echo "<h4 class='error'>Comanda MySQL greșită</h4> <p>".mysql_error()."</p>";
	    		} else {
					?><script>
				    	alert("Bravo! Ai inserat cu succes datele in tabel\nPoți vedea datele adăugate selectand tabelul din sidebar");
				   		window.location.href = "populare-tabel.php";
					</script><?php
				}
	     	}
	     } ?>

	</form>

	<h3>Actualizarea datelor dintr-un tabel:</h3>
	<div class="help-tip">
		<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
	</div><br>

	<form action="" method="POST">

		<div class="row">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<p class="p-select">Baza de date pentru care se face operatia: </p> 
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<select class="form-control" name="db">

				<?php $query = mysql_query("SELECT * FROM baze_de_date where user ='".$_SESSION['username']."' ");

				while($row = mysql_fetch_array($query))
				{
					$baza_de_date =  $row['nume'];?>

					<option value="<?=$baza_de_date?>"><?=$baza_de_date?></option>

				<?php } ?>
				</select><br>
			</div>
		</div>

		<b>Notă: pentru a vedea structura tabelului dorit, faceti click pe numele lui din dreapta</b><br><br>

		<p>Comanda MySQL pentru actualizarea datelor dintr-un tabel:</p>

		<textarea class="form-control" rows="10" type="text" name="comanda_mysql_update"></textarea><br>

		<input id="stergere" type="submit" value="Execută" class="btn btn-primary btn-md"><br><br><br>

		<?php //mysql_query("INSERT INTO Musafiri (firstname, lastname, email) VALUES ('Marinel', 'Covata', 'marinel@covata.com')") 
				//UPDATE Musafiri SET firstname='Marunus', lastname='Covor', email='marinel@covata.com' WHERE id=2 

		if(empty($_POST)===false) {
			if(empty($_POST['comanda_mysql_update'])) {
				echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
			} else {

				$comanda = $_POST['comanda_mysql_update'];

				$cuv_comanda = explode(" ", $comanda);

				$tabel = $cuv_comanda[1]."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

				$cuv_comanda[1] = $tabel;

				$comanda = implode(" ", $cuv_comanda);

				$comanda = $comanda;

				$res = mysql_query($comanda);
				if(mysql_errno()) {
					?><script>
				   		window.location.href = "populare-tabel.php#actualizare";
					</script><?php
	    			echo "<h4 class='error'>Comanda MySQL greșită</h4> ".mysql_error();
	    		} else {
					?><script>
				    	alert("Bravo! Ai actualizat cu succes datele din tabel");
				   		window.location.href = "populare-tabel.php";
					</script><?php
				}
	     	}
	     } ?>

	</form>

	<h3>Ștergerea datelor dintr-un tabel:</h3>
	<div class="help-tip">
		<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
	</div><br>

	<form action="" method="POST">

		<div class="row">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<p class="p-select">Baza de date pentru care se face operatia: </p> 
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<select class="form-control" name="db">

				<?php $query = mysql_query("SELECT * FROM baze_de_date where user ='".$_SESSION['username']."' ");

				while($row = mysql_fetch_array($query))
				{
					$baza_de_date =  $row['nume'];?>

					<option value="<?=$baza_de_date?>"><?=$baza_de_date?></option>

				<?php } ?>

				</select><br>
			</div>
		</div>

		<b>Notă: pentru a vedea structura tabelului dorit, faceti click pe numele lui din dreapta</b><br><br>

		<p>Comanda MySQL pentru stergerea datelor dintr-un tabel:</p> 

		<textarea class="form-control" rows="10" type="text" name="comanda_mysql_stergere"></textarea><br>

		<input type="submit" value="Execută" class="btn btn-primary btn-md"><br><br><br>

		<?php //mysql_query("INSERT INTO Musafiri (firstname, lastname, email) VALUES ('Marinel', 'Covata', 'marinel@covata.com')") 
				//UPDATE Musafiri SET firstname='Marunus', lastname='Covor', email='marinel@covata.com' WHERE id=2 
				//DELETE FROM Musafiri WHERE id = 2

		if(empty($_POST)===false) {
			if(empty($_POST['comanda_mysql_stergere'])) {
				echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
			} else {

				$comanda = $_POST['comanda_mysql_stergere'];

				$cuv_comanda = explode(" ", $comanda);

				$tabel = $cuv_comanda[2]."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

				$cuv_comanda[2] = $tabel;

				$comanda = implode(" ", $cuv_comanda);

				$comanda = $comanda;

				$res = mysql_query($comanda);
				if(mysql_errno()) {
					?><script>
				   		window.location.href = "populare-tabel.php#stergere";
					</script><?php
	    			echo "<h4 class='error'>Comanda MySQL greșită</h4> ".mysql_error();
	    		} else {
					?><script>
				    	alert("Bravo! Ai șters cu succes datele din tabel");
				   		window.location.href = "populare-tabel.php";
					</script><?php
				}
	     	}
	     } ?>

	</form>

	<br>

</div>

<div class="col-md-4 col-lg-4 right">

	<?php include 'includes/sidebar.php'; ?>

</div>
</div>
</div>

<? } ?>

<?php include "includes/footer.php"; ?>