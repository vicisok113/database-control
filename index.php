<?php include 'includes/init.php'; 

include "includes/header.php"; ?>

<br>


<div class="row casute">

	<div class="col-md-4 col-lg-4">
	<div class="div1">

		<center><h2>Lecţii</h2></center>

		<ul style="margin-left: 18%; font-size: 20px;">

		<?php $result = mysql_query("SELECT * FROM lectii");
			while ($row = mysql_fetch_assoc($result)) { 
				$id=$row['id'];
				$titlu=$row['titlu']; ?>

			<li><a href="lectie.php?id=<?=$id?>"><?=$titlu?></a></li>

		<?php } ?>

		</ul>
	</div>
	</div>

	<div class="col-md-4 col-lg-4">
	<div class="div2">

		<center><h2>Exerciţii</h2></center>

		<ul style="margin-left: 18%;margin-top: 8%; font-size: 20px;">

			<li><a href="crearedb.php">Crearea bazei de date</a></li>

			<li><a href="creare-tabel.php">Crearea unui tabel</a></li>

			<li><a href="populare-tabel.php">Popularea bazei de date</a></li>

			<li><a href="interogari.php">Interogari</a></li>

		</ul>

	</div>
	</div>
	
	<div class="col-md-4 col-lg-4">
	<div class="div3">

		<center><h2>Teste</h2></center>

		<ul style="margin-left: 18%; font-size: 20px; margin-top: 5%;">

			<li><a href="test-grila.php">Test grilă</a></li>

			<li><a href="test-practic.php">Test Practic</a></li>

		</ul>

	</div>
	</div>
</div>
<div class="row casute">
	<div class="col-md-4 col-lg-4"><a style="text-decoration: none;" href="aplicatie.php"><div class="div4">

		<center><h2>Aplicație</h2></center>

		<center><h3 style="font-size:23px;">O aplicaţie practică pentru crearea şi popularea unei baze de date care te va ajuta să iţi faci o idee mai clară asupra bazelor de date.</h3></center>

	</div></a></div>

	<div class="col-md-4 col-lg-4"><div class="div5">

		<center><h2>Atributele acestui site</h2></center>

		<ul style="margin-left: 10%; font-size: 20px; margin-top: 4%;">

			<li>Oferă supot pentru învăţarea interactivă a limbajelor de gestionare a bazelor de date.</li>


			<li>Aplicaţiile prezentate îl ajută pe utilizator să inteleagă practic gestionarea bazelor de date.</li>

		</ul>

	</div></div>

	<div class="col-md-4 col-lg-4"><div class="div6"	>

		<center><h2>Copyright</h2></center>

		<center><h3 style="font-size:23px;"><i class="fa fa-copyright" aria-hidden="true"></i> Site realizat de Tudosă Victor<br>Colegiul Naţional <i>Mihai Eminescu</i> Suceava</h3></center>

		</ul>

	</div></div>

</div>

<br><br><br>

<div class="body">

</div>

</body>

</html>

<?php include "includes/footer.php"; ?>