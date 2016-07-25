<?php 

include 'includes/init.php'; 

include "includes/header.php";

?>

<div class="body">
<br>
<center><h2>Bun venit, <?php echo $_SESSION['username']; ?>!</h2></center><br>
	<div class="row">
		<div class="col-md-8 col-lg-8">

			

			<?php if(type_from_username($_SESSION['username']) == 1) {

					echo "<h3>Tip: Elev</h3>";

				} elseif(type_from_username($_SESSION['username']) == 2) {

					echo "<h3>Tip: Profesor</h3>";

				} elseif(type_from_username($_SESSION['username']) == 3) {

					echo "<h3>Tip: Administrator</h3>";

				} ?>
			<?php if(empty($_SESSION) === false){

				$logged_in = $_SESSION['logged_in'];

				if($logged_in == 1 && type_from_username($_SESSION['username']) == 2 || type_from_username($_SESSION['username']) == 3) { ?>

					<div><a style="margin-left: 3%; margin-top: 6px;" href="adaugare-lectie.php" class="btn btn-primary btn-lg">Adăugare lecţie</a></div>

				<?php }} ?>

			<?php if(empty($_SESSION) === false){

				$logged_in = $_SESSION['logged_in'];

				if($logged_in == 1 && type_from_username($_SESSION['username']) == 2 || type_from_username($_SESSION['username']) == 3) { ?>

					<div><a style="margin-left: 3%; margin-top: 6px;" href="adaugare-test.php" class="btn btn-primary btn-lg">Adăugare test</a></div>

				<?php 
					//$query99 = mysql_query("SELECT * FROM `intrebari`");

					//echo "Teste: ",mysql_num_rows($query99);

				?>
			<h3>Lecții:</h3>
			<div class="panel-body">
					    <div class="table-responsive">
					        <table class="table table-hover">
					            <thead>
					                <tr>
					                    <th>ID</th>
					                    <th>Lectie</th>
					                    <th>Vizualizare</th>
					                    <th>Modifică</th>
					                    <th>Şterge</th>
					                </tr>
					            </thead>
					        	<tbody>
					        	<?php $result = mysql_query("SELECT * FROM lectii");
									while ($row = mysql_fetch_assoc($result)) { 
											$id=$row['id'];
											$titlu=$row['titlu']; ?>
											<tr>
									        	<td><?=$id?></td>
									        	<td><a href="modificare-lectie.php?id=<?=$id?>"><?=$titlu?></a></td>
									        	<td><a href="lectie.php?id=<?=$id?>"><i style="color: #333;font-size:25px;" class="fa fa-eye" aria-hidden="true"></i></a></td>
							                	<td><a href="modificare-lectie.php?id=<?=$id?>"><i style="color: #333;font-size:25px;" class="fa fa-pencil" aria-hidden="true"></i></a></td>
							                	<td><a href="stergere-lectie.php?id=<?=$id?>"><i style="color: #333;font-size:25px;" class="fa fa-trash" aria-hidden="true"></i></a></td>
								<?php } ?>
					                
					                	
					                </tr>
					        	</tbody>
					        </table>
					    </div>
					</div>
				<?php }} ?>

				<h3>Punctajele obtinute la teste:</h3>
				<div class="panel-body">
					    <div class="table-responsive">
					        <table class="table table-hover">
					            <thead>
					                <tr>
					                    <th>Test</th>
					                    <th>Punctaj</th>
					                </tr>
					            </thead>
					        	<tbody>
					        	<?php 
					        	$user = $_SESSION['username'];
					        	$result = mysql_query("SELECT * FROM Scoruri WHERE user = '$user'");
									while ($row = mysql_fetch_assoc($result)) { 
											$test=$row['test'];
											$scor=$row['scor']; ?>
											<tr>
									        	<td><?=$test?></td>
									        	<td><?=$scor?></td>
								<?php } ?>
					                
					                	
					                </tr>
					        	</tbody>
					        </table>
					    </div>
					</div>
				</div>
		<div class="col-md-4 col-lg-4 right">

			<?php include 'includes/sidebar.php'; ?>

		</div>
	</div>
</div>

</body>

</html>

<br><br>

<?php include "includes/footer.php"; ?>