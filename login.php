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
                        <h3 class="panel-title">Autentificare</h3>
                    </div>
                    <div class="panel-body">
                     <form method="post" action="login.php">
                            <fieldset>
                            <?php if(empty($_POST) === false) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                if( empty($username) === true || empty($password) === true ) {
                                    echo 'Trebuie să scrii numele și parola<br><br>';
                                } else {
                                    if(ok_us($username) != 1){
                                        echo 'Nume de utilizator gresit<br><br>';
                                    }
                                    if(!ok_pw($username, $password)){
                                        echo 'Parola gresita<br><br>';
                                    } else {
                                        $_SESSION['username'] = $username;
                                        $_SESSION['logged_in'] = "1";
                                        ?> <script>
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
                                <div class="form-group">
                                    <!-- &nbsp;&nbsp;Tine-ma minte -->
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                            </fieldset>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"; ?>