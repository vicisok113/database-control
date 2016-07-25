
<center><h3>Baze de date</h3></center><br>

		<?php $query = mysql_query("SELECT * FROM baze_de_date where user ='".$_SESSION['username']."' ");
		$j = 0;
		while($row = mysql_fetch_array($query))
		{
			$j++;
			$baza_de_date =  $row['nume']; ?>

			<div style="font-size:22px;"><img style="float:left" width="10%" src="includes/imagini/db.png"> &nbsp; - &nbsp;
				<a style="text-decoration: none; color: #333;" href="detalii.php?db=<?=$baza_de_date?>"><?=$baza_de_date?></a>
				<button class="btn btn-default btn-sm" type="button" data-toggle="collapse" data-target="#collapse<?=$j?>" aria-expanded="false" aria-controls="collapse<?=$j?>">
				  <i class="fa fa-bars" aria-hidden="true"></i>
				</button>
			</div>
			<br>
			<div class="collapse" id="collapse<?=$j?>">

				<?php $result2 = mysql_list_tables("zaomedia_database_control");

				$num_rows = mysql_num_rows($result2);

				for ($i = 0; $i < $num_rows; $i++) {

					$tabel = mysql_tablename($result2, $i);

					$tab = explode("_\$_", $tabel);

					if($tab[1]===$_SESSION['username'] && $tab[2]===$baza_de_date) {

						echo '<div style="font-size:18px; margin-left:10%;"><img style="float:left"; width="12%; margin-top:25%;" src="includes/imagini/tabel.png"> &nbsp; - &nbsp;<a style="text-decoration: none; color: #333;" href="detalii.php?db='.$baza_de_date.'&tabel='.$tab[0].'">' . $tab[0] . '</a></div><br>';

						//echo "Table: ", $tab[0], "\n<br>";

					}
				}
			echo "</div>";
		} ?>
		
		<br><br>