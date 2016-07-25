<?php include 'includes/init.php'; 

include "includes/header.php"; 

if($_SESSION['logged_in'] !== "1") { ?> <br><center><h2 class="heading">Trebuie să vă autentificatți pentru a avea acces la această pagină</h2></center><br><br> <?php } else { ?>

<br><center><h2 class="heading">Rezultatele căutării</h2></center><br><br>

<div class="body">
    <div class="row">
        <div class="col-md-8 col-lg-8">

        	<?php 
            $cautare = sanitize($_POST['cautare']);
        	$query = mysql_query("SELECT * FROM lectii where titlu LIKE '%".$cautare."%' ");
        	if (mysql_num_rows($query) <= 0) {
        		echo "<h3>Nu a fost găsita nici o lectie dupa criteriile căutate</h3><br><br>";
        	} else { ?>

        	<h3>Lectiile găsite: </h3>

        	<div style="margin-left:5%; width:85%;" id="tabel" class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lectie</th>
                            <th>Vizualizare</th>
                        </tr>
                    </thead>
                	<tbody>
                	<?php

        			if (mysql_num_rows($query) > 0) {
        			    while ($row = mysql_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><a href="lectie.php?id=<?=$row['id']?>"><?=$row['titlu']?></a></td>
                            <td><a href="lectie.php?id=<?=$row['id']?>"><i style="color: #333;font-size:25px;" class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php }} ?>
                	</tbody>
                </table>
            </div>
        	</div>
            <?php } ?>

            <?php 
            $query = mysql_query("SELECT * FROM users WHERE username LIKE '%".$cautare."%'");
            if (mysql_num_rows($query) <= 0) {
                echo "<h3>Nu a fost găsit niciun user dupa criteriile căutate</h3><br><br>";
            } else { ?>

            <h3>Useri găsiți: </h3>

            <div style="margin-left:5%; width:85%;" class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Tip</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (mysql_num_rows($query) > 0) {
                        while ($row = mysql_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['type']?></td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            </div>

            <?php } ?>

        </div>

        <div class="col-md-4 col-lg-4 right">

        	<?php include 'includes/sidebar.php'; ?>

        </div>
    </div>
</div>

<? } ?>

<?php include "includes/footer.php"; ?>