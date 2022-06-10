<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cambios de contraseñas </title>

        <!-- Bootstrap -->
        <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="css/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="css/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">
        <style>
        login {
            background: linear-gradient(to bottom, rgba(44,83,158,1) 0%,rgba(44,83,158,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            }
        </style>

    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <?php 
                        $passchange="cambio";
                        if (isset($_GET['invalid']) && $_GET['invalid']==$passchange) {
                            echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                                <strong>Exito!</strong> Se han echo los cambios correctamente, Ahora puede ingresar!<br><br> <div class='text-center'><a href='index.php' style='text-decoration:none'><button type='button' class='btn btn-default'>Iniciar Sesión</button></div>
                                </div>";
                        }
                    ?>
                    <section class="login_content">
                        <?php
                    include "config/config.php";
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");
                        $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
                        $row = mysqli_num_rows($query);
                        if ($row == "") {
                            echo '<h2>Link Invalido</h2>';
                        } else {
                            $row = mysqli_fetch_assoc($query);
                            $expDate = $row['expDate'];
                            if ($expDate >= $curDate) {
                        ?> 
                        <form action="" method="post" name="update">
                            <input type="hidden" name="action" value="update" class="form-control"/>
                            <h1>Cambio de contraseña</h1>
                            <h2>Registre sus nuevas contraseñas</h2>
                            <div>
                                <input type="password" name="pass1" class="form-control" placeholder="Contraseña" required/>
                            </div>
                            <div>
                                <input type="password" name="pass2" class="form-control" placeholder="Confirmar Contraseña" required/>
                            </div>
                            <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                            <div>
                                <button type="submit" name="reset" value="Login" class="btn btn-primary">Cambiar</button>
                            </div>
                            <br><br>
                            <div>
                                <a href="index.php" style="text-decoration:none"><button type="button" class="btn btn-default">Regresar</button></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-ticket"></i> R2Ticket</h1>
                                    <p> <a style="text-decoration: underline;" target="_blank" href="../index.html">Inicio</a>©R2 Systems, Inc. Todos los derecho reservados</p>
                                </div>
                            </div>
                        </form>
                        <?php
                            } else {
                                echo "<h2>El link a expirado</h2>";
                            }
                        }
                        
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {    
                            $error .= "<p>Las contraseñas no coinciden, ambas deben coincidir.<br /><br /> <br><br></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $pass1 = md5($pass1);
                            mysqli_query($con, "UPDATE `user` SET `password` = '" . $pass1 . "' WHERE `email` = '" . $email . "'");

                            mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");

                            $passchange="cambio";
                            header("location: changep.php?invalid=$passchange");
                        }
                    }
                    ?>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>