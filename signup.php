<?php 

include 'includes/init.php'; 

include 'includes/header.php'; 

?>

<br><br>

<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inregistrare</h3>
                    </div>
                    <div class="panel-body">
                     <form method="post" action="signup.php">
                        <fieldset>
                        	<?php if(empty($_POST) === false) {
								$username = $_POST['username'];
								$password = $_POST['password'];
								if( empty($username) === true || empty($password) === true ){
									echo 'Toate câmpurile sunt obligatorii<br><br>';
								} else {
									if(user_exists($username)) {
										echo 'Numele de utilizator există deja<br><br>';
									}
									if (empty($_POST['type'])) {
									 	echo 'Ești elev sau profesor?<br><br>';
									} else {
										$pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
										mysql_query("INSERT INTO users (username, password, type) VALUES ('".$username."','".$pass."','".$_POST['type']."') ");
										$_SESSION['username'] = $username;
										$_SESSION['logged_in'] = "1"; ?>
										<script>
											window.alert("Te-ai inregistrat cu succes!");
											window.location.href = "index.php";
										</script>
										<?php 
									}
								}
							} ?>
                            <div class="form-group">
                                   <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Parola" name="password" type="password">
                            </div>
                            <div class="form-group row">
                            	<div class="col-md-3 col-lg-3">
                                <div class="radio">
									<label>
									    <input type="radio" name="type" id="optionsRadios1" value="1">
										Elev
									</label>
								</div>
								</div>
								<div class=" col-md-3 col-lg-3">
								<div class="radio">
									<label>
										<input type="radio" name="type" id="optionsRadios1" value="2">
									    Profesor
									</label>
								</div>
								</div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Sing up</button>
                        </fieldset>
                     </form>
                    </div>
                </div>
            </div>
        </div>
	</div>

<?php include "includes/footer.php"; ?>