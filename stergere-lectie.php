<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 style="font-family: 'Times New Roman';">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { 

$id = $_GET['id'];

			//mysql_query("INSERT INTO lectii (titlu,continut) VALUES ('$titlu','$continut')"); 
			//mysql_query("UPDATE lectii SET titlu='$titlu', continut='$continut' WHERE id='$id'");
			mysql_query("DELETE FROM lectii WHERE id='$id'"); ?>
			<script>
		    	alert("Lecţia a fost stearsă!");
		   		window.location.href = "cont.php";
			</script>
<? } ?>

<?php include "includes/footer.php"; ?>