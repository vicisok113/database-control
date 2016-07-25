<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>


<br><center><h2 class="heading">Crearea unui tabel</h2></center><br><br>

<div class="body">
	<div class="row">
		<div class="col-md-8 col-lg-8">

			<h3>Scrieti comanda pentru crearea unui tabel:</h3><br>
			<div class="help-tip">
				<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
			</div>

			<form action="" method="POST">

				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<p class="p-select">Baza de date: </p> 
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
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

				<p>Comanda MySQL:</p>

				<textarea class="form-control" rows="10" type="text" name="comanda_mysql"></textarea>

				<br>

				<input type="submit" value="Execută" class="btn btn-primary btn-md"><br><br><br>

				<?php //mysql_query("CREATE TABLE MyGuests2 ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP )") 

				if(empty($_POST)===false) {
					if(empty($_POST['comanda_mysql'])) {
						echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
					} else {

						$comanda = $_POST['comanda_mysql'];

						$strArray = explode(' ',$comanda);
						$strArray[2]=$strArray[2]."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

						$comanda = implode(" ", $strArray);

						$comanda = $comanda;

						$res = mysql_query($comanda);
						if(mysql_errno()) {
			    			echo "<h4 class='error'>Comanda MySQL greșită</h4> ".mysql_error();
			    		} else {
							$tab = explode("_\$_", $strArray[2]);
							$nmt = $tab[0];
							?><script>
						    	alert("Bravo! Ai creat cu succes tabelul numit \" <?=$nmt?> \"");
						   		window.location.href = "creare-tabel.php";
							</script><?php
						}
			     	}
			     }

				// nume tabele: http://php.net/manual/en/function.mysql-tablename.php
				// structura tabel: http://php.net/manual/en/function.mysql-list-fields.php
				?>

			</form>

			<br>

		</div>

		<div class="col-md-4 col-lg-4 right">

			<?php include 'includes/sidebar.php'; ?>

		</div>

	</div>

<? } ?>

<?php include "includes/footer.php"; ?>