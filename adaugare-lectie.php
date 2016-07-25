<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>


<br><center><h2 class="heading">Adăugare lecţie</h2></center><br><br>

<div class="body">
	<form action="" method="POST">

		<div class="row">
		
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
			    	<label>Titlu lecţie: </label>
					<input class="form-control" placeholder="Titlu" type="text" name="titlu" required>
				</div>
			</div>

		</div>

		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Conţinut lecţie:</label>
					<textarea class="ckeditor" name="continut" required></textarea>
				</div>
			</div>

		</div>

		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Obiective lecţie:</label>
					<textarea class="form-control" rows="10" name="obiective" required></textarea>
				</div>
			</div>

		</div>
		
		<button class="btn btn-primary btn-md">Adăugare</button>

	</form>

	<br><center>
	<?php 

	if (empty($_POST)===false) {

		if (empty($_POST['titlu'])) {
			echo "<h4 class='error'>Titlul lecţiei este necesar</h4>";
		} elseif (empty($_POST['continut'])) {
			echo "<h4 class='error'>Conţinutul lecţiei este necesar</h4>";
		} else {
			$titlu=sanitize($_POST['titlu']);
			$continut=mysql_real_escape_string($_POST['continut']);
			$obiective=mysql_real_escape_string($_POST['obiective']);
			mysql_query("INSERT INTO lectii (titlu,continut,obiective) VALUES ('$titlu','$continut','$obiective')"); ?>
			<script>
		    	alert("Lecţia \" <?=$titlu?> \" a fost adaugată!");
		   		window.location.href = "cont.php";
			</script>
			<?php
		}
		
	}
	?> </center>
</div>

<? } ?>
<?php include "includes/footer.php"; ?>