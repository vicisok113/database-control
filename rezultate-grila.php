<?php include 'includes/init.php'; 
include "includes/header.php"; ?>
<br>

<br><center><h2 class="heading">Rezultele testului grilă</h2></center><br><br>

<div class="body">

<?php 

$scor=10;

echo "<h2>Răspunsuri greşite:</h2>";

foreach ($_POST as $key => $value) {
	$id = substr($key, 2, 2);
    //echo "ID: $id Value: $value<br />\n";
    
    echo "<br>";

    $query = mysql_query("SELECT * FROM intrebari WHERE id ='$id'");
	while($row = mysql_fetch_array($query))
	{
		$intrebare = $row['intrebare'];
		$corect = $row['corect'];
		//echo "<h2>".$corect."</h2>";
		if($corect === $value) {
			$scor = $scor+10;
		} else {
			echo "<h4><b>Întrebare: </b>",$intrebare,"</h4>";
			echo "<h4><b>Răspunsul tău: </b>",$value,"</h4>";
			echo "<h4><b>Răspunsul corect: </b>",$corect,"</h4>";
		}
	}

	//echo "<h2>".$scor."</h2>";


   	// $key = numele elementului din array;
   	// $value = valoarea elementului

}
echo "<br><br><h2>Punctajul tău: ".$scor."/100</h2>";

$user = $_SESSION['username'];

mysql_query("INSERT INTO `Scoruri` (scor,test,user) VALUES ('$scor','Test grilă','$user')"); ?>

</div>

<?php include "includes/footer.php"; ?>