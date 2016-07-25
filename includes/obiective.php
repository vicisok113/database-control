<!DOCTYPE html>

<html>

<head>

<title>Title of the document</title>

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body>

<?php if($_SESSION['logged_in']=="1") { ?>

<nav class="nav_side2">

	<div class="note_body2">

		<br><br><br><br>
		<a href="#" class="nav_toggle2"><i style="color: #fff;" class="fa fa-eye" aria-hidden="true"></i></a>

		<form method="post" action="">

		    <div class="imput2" name="note"><?php echo $obiective; ?></div>

		</form>

	</div>
	
</nav>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">

	$('.nav_side2 .nav_toggle2').on('click', function(e) {

	e.preventDefault();

	$(this).closest('nav').toggleClass('nav_open');

});

</script>

</body>



</html>