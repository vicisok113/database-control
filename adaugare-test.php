<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>


<br><center><h2 class="heading">Adăugare test</h2></center><br><br>

<div class="body">

	<form action="" method="POST">

		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Intrebare:</label>
					<textarea class="form-control" rows="5" name="intrebare" required></textarea>
				</div>
			</div>

		</div>
		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Raspuns 1:</label>
					<textarea class="form-control" rows="5" name="raspuns1" required></textarea>
				</div>
			</div>

		</div>
		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Raspuns 2:</label>
					<textarea class="form-control" rows="5" name="raspuns2" required></textarea>
				</div>
			</div>

		</div>
		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Raspuns corect:</label>
					<textarea class="form-control" rows="5" name="raspuns_corect" required></textarea>
				</div>
			</div>

		</div>
		
		<button class="btn btn-primary btn-md">Adăugare</button>

	</form>

	<br><center>
	<?php 

	if (empty($_POST)===false) {

			$intrebare=$_POST['intrebare'];
			$raspuns1=$_POST['raspuns1'];
			$raspuns2=$_POST['raspuns2'];
			$raspuns_corect=$_POST['raspuns_corect'];
	
			mysql_query("INSERT INTO `intrebari` (intrebare,raspuns1,raspuns2,corect) VALUES ('$intrebare','$raspuns1','$raspuns2','$raspuns_corect')"); ?>
			<script>
		    	alert("Test adaugat!");
		   		window.location.href = "adaugare-test.php";
			</script>
			<?php
		}
		
	?> </center>


</div>

<? } ?>

<?php include "includes/footer.php"; ?>