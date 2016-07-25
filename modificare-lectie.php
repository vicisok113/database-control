<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { 

$id = $_GET['id'];
$result = mysql_query("SELECT * FROM lectii WHERE id=$id");
while ($row = mysql_fetch_assoc($result)) {
	$titlu = $row['titlu'];
	$continut = $row['continut'];
	$obiective = $row['obiective'];
} ?>

<br><center><h2 class="heading">Adăugare lecţie</h2></center><br><br>

<div class="body">

	<form action="" method="POST">

	<div class="row">
		
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
			    	<label>Titlu lecţie: </label>
					<input class="form-control" placeholder="Titlu" type="text" name="titlu" required value="<?=$titlu?>">
				</div>
			</div>

		</div>

		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Conţinut lecţie:</label>
					<textarea class="ckeditor" name="continut" required><?=$continut?></textarea>
				</div>
			</div>

		</div>

		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
			    	<label>Obiective lecţie:</label>
					<textarea class="form-control" rows="10" name="obiective" required><?=$obiective?></textarea>
				</div>
			</div>

		</div>
		
		<button class="btn btn-primary btn-md">Modifică</button>

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
			//mysql_query("INSERT INTO lectii (titlu,continut) VALUES ('$titlu','$continut')"); 
			mysql_query("UPDATE lectii SET titlu='$titlu', continut='$continut' WHERE id='$id'"); ?>
			<script>
		    	alert("Lecţia \" <?=$titlu?> \" a fost modificată!");
		   		window.location.href = "cont.php";
			</script>
			<?php
		}
		
	}
	?> </center>


</div>

<? } ?>

<?php include "includes/footer.php"; ?>