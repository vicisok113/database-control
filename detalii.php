<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { 



if(empty($_GET['tabel'])) { ?>

<br><center><h2 class="heading">Structura bazei de date: <?=$_GET['db']?></h2></center><br><br>

<div class="body">

<div class="row">
	<div class="col-md-8 col-lg-8">
		<br><br>
		<h2>Tabele: </h2>
		<div class="row">
			<div class="col-sm-2 col-md-2 col-lg-2"></div>
			<div class="col-sm-10 col-md-10 col-lg-10">
			<?php $result2 = mysql_list_tables("zaomedia_database_control");

			$num_rows = mysql_num_rows($result2);

			for ($i = 0; $i < $num_rows; $i++) {

				$tabel = mysql_tablename($result2, $i);

				$tab = explode("_\$_", $tabel);

				if($tab[1]===$_SESSION['username'] && $tab[2]===$_GET['db']) {

					echo '<div class="dbb" >
					<img style="" width="16%; margin-top:25%;" src="includes/imagini/tabel.png">
					&nbsp; - &nbsp;
					<a style="text-decoration: none; color: #333;" href="detalii.php?db='.$_GET["db"].'&tabel='.$tab[0].'">' . $tab[0] . '</a>
					</div>
					<br>';

					//echo "Table: ", $tab[0], "\n<br>";

				}
			} ?>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4 right">

	<?php include 'includes/sidebar.php'; ?>

	</div>
</div>
</div>
<?php } else { ?>

<br><center><h2 class="heading">Tabelul: <?=$_GET['tabel']?></h2></center><br><br>

<div class="body">
<div class="row">
	<div class="col-md-8 col-lg-8">
		<h3>Structură:</h3>

		<div class="panel-body">
		    <div class="table-responsive">
		        <table class="table table-hover">
		            <thead>
		                <tr>
		                    <th>Câmp</th>
		                    <th>Tip</th>
		                    <th>Null</th>
		                    <th>Cheie</th>
		                    <th>Valoare prestabilită</th>
		                    <th>Extra</th>
		                </tr>
		            </thead>
		        	<tbody>
		        	<?php

					$tabel = $_GET['tabel']."_\$_".$_SESSION['username']."_\$_".$_GET['db'];

					$result = mysql_query("SHOW COLUMNS FROM $tabel");
					if (!$result) {
					    echo 'Could not run query: ' . mysql_error();
					    exit;
					}
					if (mysql_num_rows($result) > 0) {
					    while ($row = mysql_fetch_assoc($result)) {
					    	//echo "<pre>";
					        //print_r($row);
					    	//echo "</pre>";?>
		                <tr>
		                    <td><?=$row['Field']?></td>
		                    <td><?=$row['Type']?></td>
		                    <td><?=$row['Null']?></td>
		                    <td><?=$row['Key']?></td>
		                    <td><?=$row['Default']?></td>
		                    <td><?=$row['Extra']?></td>
		                </tr>
		                <?php }} ?>
		        	</tbody>
		        </table>
		    </div>
		</div>

		<?php 
			$tabel = $_GET['tabel']."_\$_".$_SESSION['username']."_\$_".$_GET['db'];

			$result = mysql_query("SELECT * FROM $tabel");

			if (mysql_num_rows($result) > 0) {

		?>

		<h3>Continut:</h3>


		<div class="panel-body">
		    <div class="table-responsive">
		        <table class="table table-hover">
		            <thead>
		                <tr>
		                <?php 

		                $n=1;

						$result = mysql_query("SHOW COLUMNS FROM $tabel");
						if (!$result) {
						    echo 'Could not run query: ' . mysql_error();
						    exit;
						}
		                if (mysql_num_rows($result) > 0) {
					    while ($row = mysql_fetch_assoc($result)) { 
					    	$campuri[$n++]=$row['Field'];?>
		                    <th><?=$row['Field']?></th>
		    			<?php }} ?>
		                </tr>
		            </thead>
		        	<tbody>
		        	<?php

					$tabel = $_GET['tabel']."_\$_".$_SESSION['username']."_\$_".$_GET['db'];

					$tabel = sanitize($tabel);

					$result = mysql_query("SELECT * FROM $tabel");
					if (!$result) {
					    echo 'Could not run query: ' . mysql_error();
					    exit;
					}
					if (mysql_num_rows($result) > 0) {
					    while ($row = mysql_fetch_assoc($result)) {
					    	?>
		                <tr>
		                	<?php for($i=1;$i<=$n;$i++) { ?>
		                    	<td><?=$row[$campuri[$i]]?></td>
			                    <?php } ?>
		                </tr>
		                <?php }} ?>
		        	</tbody>
		        </table>
		    </div>
		</div>
	
	
<?php } else { ?>
<center><h3>Acest tabel este gol</h3></center>

<?php } ?>

</div>
<div class="col-md-4 col-lg-4 right">

		<?php include 'includes/sidebar.php'; ?>

	</div>
</div>
</div>

<?php } ?>




<? } ?>

<?php include "includes/footer.php"; ?>