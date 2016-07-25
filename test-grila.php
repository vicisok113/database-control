<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>

<br>

<br><center><h2 class="heading">Test grilă</h2></center><br><br>

<div class="body">

<form action="rezultate-grila.php" method="POST">

<?php $query = mysql_query("SELECT * FROM `intrebari` ORDER BY RAND() LIMIT 9");

while($row = mysql_fetch_array($query))

{

	$id = $row['id'];

	$intrebare = $row['intrebare'];



	echo "<h3>",$intrebare,"</h3><br>";



		$raspuns[0] = $row['raspuns1'];

		$raspuns[1] = $row['raspuns2'];

		$raspuns[2] = $row['corect'];



		echo "<div class='varianta'>";

			shuffle($raspuns);

			foreach ($raspuns as $number) {

				if(empty($number)===false) {

			    	echo "<input type='radio' name='r_",$id,"' value='",$number,"'> ","$number","<br>";

				}

			}

		echo "</div>";



	echo "<br><br>";

} ?>



<input type="submit" value="Trimite" class="btn btn-primary btn-md"> <br><br><br>



</form>

</div>
<?php } ?>

<?php include "includes/footer.php"; ?>