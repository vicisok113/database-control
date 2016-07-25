<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>

<script type="text/javascript" src="includes/aplicatie.js"></script>

<br><center><h2 class="heading">Aplicație</h2></center><br><br>

<div class="body">

<?php if(empty($_GET)) { ?>

<h4>Acesta este un exemplu de creare a creare a unei baze de date, unui tabel si popularea acestora cu continut, o aplicate cate vă va ajuta sa înțelegeți mai bine ce vom face in continuare.</h4>

<form action="aplicatie.php?progres=pas2" method="post">

	<h3>Pasul I: Crearea bazei de date</h3><br>

	<div class="row">

		<div class="col-sm-4 col-md-4 col-lg-4">
			<div class="form-group">
			    <h4>Intorduceți numele bazei de date:</h4>
			</div>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4">
			<div class="form-group">
				<input class="form-control" placeholder="Numele bazei de date" type="text" name="db" required>
			</div>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4">
			<button class="btn btn-primary btn-md">Pasul următor</button>
		</div>

	</div>

	</form>


<? } elseif($_GET['progres']=="pas2") { 

//creare db
if(isset($_POST['db'])) {
	$dbn=sanitize($_POST['db']); 

	$username=sanitize($_SESSION['username']);

	if(db_exists($dbn, $username)) {
		mysql_query("INSERT INTO baze_de_date (nume,user) VALUES ('$dbn','$username')");
	} else {
		echo '<script>
			window.alert("Aceasta baza de date exista deja.");
			window.location.href = "aplicatie.php";
		</script>';
	}

	
}
?>

<h3>Pasul 2: Crearea unui tabel</h3>

		<h4>Creați mai jos un tabel numit orase urmand instructiunile: </h4>

		<div class="pas2">

			<h4>Prima linie a tabelului trebuie să fie o chieie primară, numită deobicei	 ID, vom studia in lecțiile viitoare importanța acesteia.</h4>
			
			<h4>Creați tabelul cu urmatoarele campuri:</h4>
			
			<ul>
				<li>ID, tip de date int, lungime 11</li>

				<li>oras, tip de date varchar, lungime 255</li>

				<li>locuitori, tip de date int, lungime 11</li>

				<li>locuinte, tip de date int, lungime 11</li>
			</ul>

		<form action="aplicatie.php?progres=pas3" method="post">

			<div class="row">

				<div class="col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">
					    <h4>Nume tabel:</h4>
					</div>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<input class="form-control" placeholder="Nume tabel" type="text" name="nume_tabel" required>
						<input type="text" class="form-control hidden" value="<?=$dbn;?>" name="db">
					</div>
				</div>

			</div>

			<div class="panel-body">
			    <div class="table-responsive">
			        <table class="table table-hover">
			            <thead>
			                <tr>
			                    <th>Nume coloana</th>
			                    <th>Tip de date</th>
			                    <th>Lungime</th>
			                </tr>
			            </thead>
			        	<tbody class="cr_table">
			                <tr>
			                    <td>
								    <input type="text" id="disabledInput" class="form-control" value="ID" name="id" disabled>
			                    </td>
			                    <td>
			                    <fieldset disabled>
							          <select id="disabledSelect" class="form-control" name="tip_id">
							            <option value="INT">INT</option>
							          </select>
							      </fieldset>
			                    </td>
			                    <td>
			                    	<input type="text" id="disabledInput" class="form-control" value="11" name="lungime_id" disabled>
			                    </td>
			                </tr>
			                <tr>
			                	<td>
								    <input type="text" class="form-control" name="oras" required>
			                    </td>
			                    <td>
							        <select class="form-control" name="tip_oras">
							            <option value="INT">INT</option>
							            <option value="VARCHAR">VARCHAR</option>
							            <option value="TEXT">TEXT</option>
							            <option value="DATE">DATE</option>
							        </select>
			                    </td>
			                    <td>
			                    	<input type="text" class="form-control" name="lungime_oras">
			                    </td>
			                </tr>
			                <tr>
			                	<td>
								    <input type="text" class="form-control" name="nr_locuitori" required>
			                    </td>
			                    <td>
							        <select class="form-control" name="tip_locuitori">
							            <option value="INT">INT</option>
							            <option value="VARCHAR">VARCHAR</option>
							            <option value="TEXT">TEXT</option>
							            <option value="DATE">DATE</option>
							        </select>
			                    </td>
			                    <td>
			                    	<input type="text" class="form-control" name="lungime_locuitori">
			                    </td>
			                </tr>
			                <tr>
			                	<td>
								    <input type="text" class="form-control" name="locuinte" required>
			                    </td>
			                    <td>
							        <select class="form-control" name="tip_locuinte">
							            <option value="INT">INT</option>
							            <option value="VARCHAR">VARCHAR</option>
							            <option value="TEXT">TEXT</option>
							            <option value="DATE">DATE</option>
							        </select>
			                    </td>
			                    <td>
			                    	<input type="text" class="form-control" name="lungime_locuinte">
			                    </td>
			                </tr>
			        	</tbody>
			        </table>
			    </div>
			</div>
			<button class="btn btn-primary btn-md">Pasul următor</button>
		</form>
		</div>

<?php } elseif($_GET['progres']=="pas3") { ?>

<?php 

$db = sanitize($_POST['db']);
$oras = sanitize($_POST['oras']);
$lungime_oras = sanitize($_POST['lungime_oras']);
$tip_oras = sanitize($_POST['tip_oras']);
$nr_locuitori = sanitize($_POST['nr_locuitori']);
$tip_locuitori = sanitize($_POST['tip_locuitori']);
$lungime_locuitori = sanitize($_POST['lungime_locuitori']);
$locuinte = sanitize($_POST['locuinte']);
$lungime_locuinte = sanitize($_POST['lungime_locuinte']);
$tip_locuinte = sanitize($_POST['tip_locuinte']);

//creare tabel

$tabel = sanitize($_POST['nume_tabel']."_\$_".$_SESSION['username']."_\$_".$_POST['db']);

//echo $tabel;

mysql_query("CREATE TABLE $tabel ( ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, $oras $tip_oras($lungime_oras) NOT NULL, $nr_locuitori $tip_locuitori($lungime_locuitori) NOT NULL, $locuinte $tip_locuinte($lungime_locuinte) NOT NULL)");
?>

<h3>Pasul 3: Popularea bazei de date</h3>

<?php //echo checkdate("02.07.2012"); ?>

<h4>Popularea bazei de date constă în înregistrarea datelor structurate în tabele.</h4>

<h4>Vom adăuga o linie în tabel.</h4>

<h4>Completați tabelul următor cu date corespunzătoare numelui și tipului de date</h4>

<h4><strong>Rețineti: </strong> câmpul ID este cheie primară și se autocompletează, de aceea nu trebuie completat</h4>

		<form action="aplicatie.php?progres=succes" method="post">
			<input type="text" class="form-control hidden" value="<?=$db;?>" name="db">
			<input type="text" class="form-control hidden" value="<?=$tabel;?>" name="tabel">
			<input type="text" class="form-control hidden" value="<?=$oras;?>" name="oras_camp">
			<input type="text" class="form-control hidden" value="<?=$nr_locuitori;?>" name="camp_locuitori">
			<input type="text" class="form-control hidden" value="<?=$locuinte;?>" name="camp_locuinte">
			<div class="panel-body">
			    <div class="table-responsive">
			        <table class="table table-hover table_valori" style="text-align:center;">
			            <thead class="cr_table_head">
			                <tr>
			                    <th style="text-align:center;">Câmp</th>
			                    <th style="text-align:center;">Tip de date</th>
			                    <th style="text-align:center;">Valoare</th>
			                </tr>
			            </thead>
			        	<tbody class="cr_table">
			                <tr>
			                    <td>
								    ID
			                    </td>
			                    <td>
			                    	INT
			                    </td>
			                    <td>
			                    	<input type="text" id="disabledInput" class="form-control" value="11" name="valoare_id" disabled>
			                    </td>
			                </tr>
			                <tr>
			                    <td>
								    <?=$oras?>
			                    </td>
			                    <td>
			                    	<?=$tip_oras?>
			                    </td>
			                    <td>
			                    	<input type="text" class="form-control" name="valoare_oras" required>
			                    </td>
			                </tr>
			                <tr>
			                    <td>
								    <?=$nr_locuitori?>
			                    </td>
			                    <td>
			                    	<?=$tip_locuitori?>
			                    </td>
			                    <td>
			                    	<input type="text" class="form-control" name="valoare_locuitori" required>
			                    </td>
			                </tr>
			                <tr>
			                    <td>
								    <?=$locuinte?>
			                    </td>
			                    <td>
			                    	<?=$tip_locuinte?>
			                    </td>
			                    <td>
			                    	<input type="text" class="form-control" name="valoare_locuinte" required>
			                    </td>
			                </tr>
			        	</tbody>
			        </table>
			    </div>
			</div>
			<button class="btn btn-primary btn-md">Pasul următor</button><br><br>
		</form>
</div>

<? } elseif($_GET['progres']=="succes") {

	$tabel = sanitize($_POST['tabel']);
	$camp_oras = sanitize($_POST['camp_oras']);
	$camp_locuitori = sanitize($_POST['camp_locuitori']);
	$camp_locuinte = sanitize($_POST['camp_locuinte']);
	$valoare_oras = sanitize($_POST['valoare_oras']);
	$valoare_locuitori = sanitize($_POST['valoare_locuitori']);
	$valoare_locuinte = sanitize($_POST['valoare_locuinte']);

	/*if(!verificare_tip($tip_oras,$camp_oras)) {
		echo '<script>
				window.alert("Campul '.$camp_oras.' nu e de tipul selectat.");
				window.location.href = "aplicatie.php";
			</script>';
	} elseif(!verificare_tip($tip_locuitori,$camp_locuitori)) {
		echo '<script>
				window.alert("Campul '.$camp_locuitori.' nu e de tipul selectat.");
				window.location.href = "aplicatie.php";
			</script>';
	} elseif(!verificare_tip($tip_locuinte,$camp_locuinte)) {
		echo '<script>
				window.alert("Campul '.$camp_locuinte.' nu e de tipul selectat.");
				window.location.href = "aplicatie.php";
			</script>';
	}*/

	mysql_query("INSERT INTO $tabel ($camp_oras, $camp_locuitori, $camp_locuinte) VALUES ('$valoare_oras', '$valoare_locuitori', '$valoare_locuinte')");

 ?>

<div class="row">
	<div class="col-md-8 col-lg-8">

		<h3>Felicitări!</h3><br>

		<h4>Ai terminat aplicaţia în cadrul căreia ai creat o bază de date şi un tabel, pe care le-ai populat cu informaţii.</h4>
		
		<h4>Toate aceste pentru a avea o idee mai clară asupra ce vom studia in continuare.</h4>

		<h4>Poti vedea şi accesa baza de date şi tabelul in sidebarul din dreapta. </h4>

		<a href="lectie.php?id=14" class="btn btn-primary btn-lg">Continuă lecţiile</a>

		<br>

	</div>

	<div class="col-md-4 col-lg-4 right">

		<?php include 'includes/sidebar.php'; ?>

	</div>

<?php } ?>

</div>

<? } ?>

<?php include "includes/footer.php"; ?>