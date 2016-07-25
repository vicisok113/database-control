<script type="text/javascript">
	function toggle_func() {			
		if(document.getElementById("nav_colapse").className == "row collapse navbar-toggleable-xs hidden-sm hidden-md hidden-lg visible-xs") {
			document.getElementById("nav_colapse").className = document.getElementById("nav_colapse").className.replace( /(?:^|\s)visible-xs(?!\S)/g , '' );
		} else {
			document.getElementById("nav_colapse").className += " visible-xs";
		}
			
	}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="includes/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="includes/ckfinder/ckfinder.js"></script>





