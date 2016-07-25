<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>


<br><center><h2 class="heading">Interogări</h2></center><br><br>

<div class="body">
	<div class="row">
		<div class="col-md-8 col-lg-8">

			<h3>Scrieti interogarea dorită:</h3><br>
			<div class="help-tip">
				<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
			</div>

			<form action="" method="POST">

			<div class="row">
				<div class="col-sm-5 col-md-5 col-lg-5">
					<p class="p-select">Baza de date pentru care se face operatia: </p> 
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<select class="form-control" name="db">

					<?php $query = mysql_query("SELECT * FROM baze_de_date where user ='".$_SESSION['username']."' ");

					while($row = mysql_fetch_array($query))
					{
						$baza_de_date =  $row['nume'];?>

						<option value="<?=$baza_de_date?>"><?=$baza_de_date?></option>

					<?php } ?>

					</select><br>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4 col-md-2 col-lg-2">

					<div class="form-group">
				      <center><label>Comandă:*</label></center>
				      <input type="text" class="form-control" name="select">
				    </div>

				</div>
				<div class="col-sm-4 col-md-2 col-lg-2">
					<div class="form-group">
				      <center><label>Câmpuri:*</label></center>
				      <input type="text" class="form-control" name="campuri">
				    </div>
				</div>
				<div class="col-sm-4 col-md-2 col-lg-2">
					<div class="form-group">
				      <center><label>Clauză:*</label></center>
				      <input type="text" class="form-control" name="from">
				    </div>
				</div>
					<div class="col-sm-4 col-md-2 col-lg-2">
					<div class="form-group">
				      <center><label>Tabel:*</label></center>
				      <input type="text" class="form-control" name="tabel">
				    </div>
				</div>
				<div class="col-sm-4 col-md-2 col-lg-2">
					<div class="form-group">
				      <center><label>Clauză:</label></center>
				      <input type="text" class="form-control" name="where">
				    </div>
				</div>
				<div class="col-sm-4 col-md-2 col-lg-2">
					<div class="form-group">
				      <center><label>Condiție:</label></center>
				      <input type="text" class="form-control" name="instructiune">
				    </div>
				</div>
			</div>

			<input type="submit" value="Execută" class="btn btn-primary btn-md">

			</form>

			<br><center>
			<?php 

			if (empty($_POST)===false) {

				if(empty($_POST['select']) || empty($_POST['campuri']) || empty($_POST['from']) || empty($_POST['tabel']) ) {
					echo "<h4 class='error'>Câmpurile macate cu * trebuie completate</h4>";
				} else {

					$tabel = $_POST['tabel']."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

					$comanda = $_POST['select'].' '.$_POST['campuri'].' '.$_POST['from'].' '.$tabel.' '.$_POST['where'].' '.$_POST['instructiune'];

					$comanda = $comanda;

					$res = mysql_query($comanda);
						if(mysql_errno()) {
			    			echo "<h4 class='error'>Comanda MySQL greșită</h4> ".mysql_error();
			    		} else {
			    			echo "<h3>Datele preluate în urma interogării făcute: </h3>"; ?>

			    			<div class="panel-body">
							    <div class="table-responsive">
							        <table class="table table-hover">
							            <thead>
							                <tr>

			                <?php $n=1;

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
				        	<tbody> <?php

				    		if (mysql_num_rows($res) > 0) {
							    while ($row = mysql_fetch_assoc($res)) {
							    	echo "<tr>";
							    	for($i=1;$i<=$n;$i++) { ?>
				                    	<td><?=$row[$campuri[$i]]?></td>
					                <?php }
					                echo "</tr>";
				                }
				            } ?>
				            			</tbody>
							        </table>
							    </div>
							</div>

							<script>
						    	//alert("Bravo! Ai creat cu succes tabelul numit \" <?=$nmt?> \"");
						   		//window.location.href = "creare-tabel.php";
							</script><?php
						}
				}
				
			}
			?> </center>

		</div>

		<div class="col-md-4 col-lg-4 right">

			<?php include 'includes/sidebar.php'; ?>

		</div>
	</div>
</div>

<? } ?>

<?php include "includes/footer.php"; ?>