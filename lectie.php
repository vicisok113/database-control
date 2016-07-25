<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>

<?php



$query = mysql_query("SELECT * FROM lectii where id ='".$_GET['id']."' ");

while($row = mysql_fetch_array($query))

{

	$titlu = $row['titlu'];

	$continut = $row['continut'];

	$obiective = $row['obiective'];

}



?>

<?php 

include "includes/obiective.php"; ?>

<br><center><h2 class="heading"><?=$titlu?></h2></center><br>

<div class="body">


<div class="text"><?=$continut?></div>


</div>

<?php } ?>

<?php include "includes/footer.php"; ?>