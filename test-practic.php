<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>

<br>

<br><center><h2 class="heading">Test practic</h2></center><br><br>

<div class="body">

<h3>La un centru de sănătate evidenţa consultaţiilor este ţinută cu ajutorul unui sistem informatic care are la bază două entităţi: PACIENT şi CONSULTAŢIE. Pentru fiecare consultaţie se reţine cnp-ul pacientului, data consultaţiei, numele medicului care efectuează consultaţia, specialitatea şi preţul. Opţional, dacă pacientul a fost diagnosticat cu o boală, se va reţine şi această informaţie.  ERD-ul pentru aplicaţie este următorul:</h3>

<br>

<center><img width="70%" src="includes/imagini/erd_pr.png"></center>

<br>

<h2>Cerințe:</h2>

<ol class="ol-style" type="a">
  <li>Construiţi baza de date cu tabele corespunzătoare şi relaţiile reprezentate în ERD. Populaţi tabelele cu înregistrări relevante pentru cerinţele următoare.</li>
  <li>Afişaţi alfabetic medicii care au efectuat consultaţii pe 1.XII.2012 . Se va afişa şi specialitatea medicului.</li>
  <li>Care este suma plătită la centrul de sănătate de pacientul Georgescu Paul de-a lungul timpului?</li>
</ol>

<br>
<h3>Tabela PACIENȚI: </h3>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>CNP_P</th>
                    <th>NUME</th>
                    <th>DATA_NAȘTERII</th>
                    <th>SEX</th>
                </tr>
            </thead>
        	<tbody>
                <tr>
                    <td>2921904555777</td>
                    <td>Grig Adela</td>
                    <td>19-03-1990</td>
                    <td>F</td>
                </tr>
                <tr>
                    <td>2890207555777</td>
                    <td>Alexa Mara</td>
                    <td>22-05-1989</td>
                    <td>F</td>
                </tr>
                <tr>
                    <td>2910410555777</td>
                    <td>Darie Ada</td>
                    <td>02-02-1991</td>
                    <td>F</td>
                </tr>
                <tr>
                    <td>1892411555777</td>
                    <td>Vlad Cristi</td>
                    <td>27-11-1988</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>2902512555777</td>
                    <td>Pop Ana</td>
                    <td>12-05-1990</td>
                    <td>F</td>
                </tr>
                <tr>
                    <td>1911708555777</td>
                    <td>Georgescu Paul</td>
                    <td>11-07-1992</td>
                    <td>B</td>
                </tr>
        	</tbody>
        </table>
    </div>
</div>

<h3>Tabela CONSULTAȚII: </h3>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CNP_PACIENT</th>
                    <th>DATA_CONSULT</th>
                    <th>MEDIC</th>
                    <th>SPECIALITATE</th>
                    <th>PREȚ</th>
                    <th>DIAGNOSTIC</th>
                </tr>
            </thead>
        	<tbody>
                <tr>
                    <td>11</td>
                    <td>2902512555777</td>
                    <td>04-04-2009</td>
                    <td>Filip Dan</td>
                    <td>generalist</td>
                    <td>130</td>
                    <td>Diabet</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>1892411555777</td>
                    <td>12-03-2010</td>
                    <td>Zota Ana</td>
                    <td>dentar</td>
                    <td>110</td>
                    <td> - </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>1911708555777</td>
                    <td>01-12-2012</td>
                    <td>Popescu Ion</td>
                    <td>generalist</td>
                    <td>75</td>
                    <td>obezitate</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>1911708555777</td>
                    <td>05-10-2010</td>
                    <td>Zota Ana</td>
                    <td>dentar</td>
                    <td>130</td>
                    <td> - </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>2921904555777</td>
                    <td>15-02-2010</td>
                    <td>Zota Ana</td>
                    <td>dentar</td>
                    <td>120</td>
                    <td> - </td>
                </tr>
                 <tr>
                    <td>16</td>
                    <td>2890207555777</td>
                    <td>01-12-2012</td>
                    <td>Zota Ana</td>
                    <td>dentar</td>
                    <td>90</td>
                    <td> - </td>
                </tr>
                
        	</tbody>
        </table>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
		<h3>Cerința b: </h3>
		<div class="panel-body">
		    <div class="table-responsive">
		        <table class="table table-hover">
		            <thead>
		                <tr>
		                    <th>MEDIC</th>
		                    <th>SPECIALITATE</th>
		                </tr>
		            </thead>
		        	<tbody>
		                <tr>
		                    <td>Zota Ana</td>
		                    <td>dentar</td>
		                </tr>
		        	</tbody>
		        </table>
		    </div>
		</div>
	</div>
	<div class="col-md-6">
		<h3>Cerința c: </h3>
		<div class="panel-body">
		    <div class="table-responsive">
		        <table class="table table-hover">
		            <thead>
		                <tr>
		                    <th>Suma plătită</th>
		                </tr>
		            </thead>
		        	<tbody>
		                <tr>
		                    <td>205</td>
		                </tr>
		                </tr>
		        	</tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-lg-8">
		<h3>Rezolvare: </h3>
		<div class="help-tip">
				<p>This is the inline help tip! You can explain to your users what this section of your web app is about.</p>
			</div>
		<h4>Crearea tabel: </h4>

		<form action="" method="POST">

			<div class="row">
				<div class="col-sm-5 col-md-5 col-lg-5">
					<p class="p-select">Selectați baza de date in cere creați tabelul:</p> 
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

				<p>Comanda MySQL:</p>
				<textarea class="form-control" rows="10" type="text" name="comanda_mysql"></textarea><br>

				<input type="submit" value="Execută" class="btn btn-primary btn-md"><br><br><br>

				<?php //mysql_query("CREATE TABLE MyGuests2 ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP )") 

				if(empty($_POST)===false) {
					if(empty($_POST['comanda_mysql'])) {
						echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
					} else {

						$comanda = $_POST['comanda_mysql'];

						$strArray = explode(' ',$comanda);
						$strArray[2]=$strArray[2]."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

						$comanda = implode(" ", $strArray);

						$comanda = $comanda;

						$res = mysql_query($comanda);
						if(mysql_errno()) {
			    			echo "<h4 class='error'>Comanda MySQL greșită</h4> ".mysql_error();
			    		} else {
							$tab = explode("_\$_", $strArray[2]);
							$nmt = $tab[0];
							?><script>
						    	alert("Bravo! Ai creat cu succes tabelul numit \" <?=$nmt?> \"");
						   		window.location.href = "test-practic.php";
							</script><?php
						}
			     	}
			     }
				?>

			</form>

			<h4>Populare tabel: </h4>

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

				<b>Notă: pentru a vedea structura tabelului dorit, faceti click pe numele lui din dreapta</b><br><br>

				<p>Comanda MySQL pentru inserarea datelor intr-un tabel:</p>

				<textarea class="form-control" rows="10" type="text" name="comanda_mysql_inserare"></textarea><br>

				<input id="actualizare" type="submit" value="Execută" class="btn btn-primary btn-md"><br><br><br>

				<?php //mysql_query("INSERT INTO Musafiri (firstname, lastname, email) VALUES ('Marinel', 'Covata', 'marinel@covata.com')") 

				if(empty($_POST)===false) {
					if(empty($_POST['comanda_mysql_inserare'])) {
						echo "<h4 class='error'>Comanda MySQL este necesară</h4>";
					} else {

						$comanda = $_POST['comanda_mysql_inserare'];

						$cuv_comanda = explode(" ", $comanda);

						$tabel = $cuv_comanda[2]."_\$_".$_SESSION['username']."_\$_".$_POST['db'];

						$cuv_comanda[2] = $tabel;

						$comanda = implode(" ", $cuv_comanda);

						$comanda = $comanda;

						$res = mysql_query($comanda);
						if(mysql_errno()) {
							?><script>
						   		window.location.href = "test-practic.php";
							</script><?php
			    			echo "<h4 class='error'>Comanda MySQL greșită</h4> <p>".mysql_error()."</p>";
			    		} else {
							?><script>
						    	alert("Bravo! Ai inserat cu succes datele in tabel\nPoți vedea datele adăugate selectand tabelul din sidebar");
						   		window.location.href = "test-practic.php";
							</script><?php
						}
			     	}
			     } ?>

			</form>


			<h4>Interogare tabel: </h4>
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

</div>

<?php } ?>

<?php include "includes/footer.php"; ?>