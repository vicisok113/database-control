<!DOCTYPE html>

<html>

<head>

<title>Title of the document</title>

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body>

<?php if($_SESSION['logged_in']=="1") { ?>

<nav class="nav_side">



<?php
		if(empty($_POST['note'])===false)
		{
			if(note_exists($_SESSION['username'], $_POST['note']) > 0) {
				note_update($_SESSION['username'], $_POST['note']);
			} else {
				note_submit($_POST['note'], $_SESSION['username']);
			}

			// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			echo '<div class="mesaj">Notițele au fost salvate</div>';
		}
	?>

	<div class="note_body">
	<br>
	<a href="#" class="nav_toggle"><i style="color: #fff;" class="fa fa-folder-open-o" aria-hidden="true"></i></a>

		<form method="post" action="">

		    <textarea class="imput" name="note"><?php echo nota_din_db($_SESSION['username']); ?></textarea>

		    <button class="sv_but"><i style="color: #fff;" class="fa fa-floppy-o" aria-hidden="true"></i></button>

		</form>

	</div>
	
</nav>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">

	$('.nav_side .nav_toggle').on('click', function(e) {

	e.preventDefault();

	$(this).closest('nav').toggleClass('nav_open');

});

</script>

</body>



</html>