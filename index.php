<?php
    session_start();

    include "config/config.php";

    if (isset($_SESSION['user_id']) && $_SESSION!==null) {
       header("location: dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iniciar Sesión </title>

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
        

    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <?php 
                        $invalid=sha1(md5("contrasena y email invalido"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$invalid) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Contraseña o Correo Electrónico invalido
                                </div>";
                        }
                        $noexist=sha1(md5("el usuario no existe"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$noexist) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> El usuario no ha sido registrado... Puedes registrarte ahora mismo! 
                                </div>";
                        }
                    ?>
                    <section class="login_content">
                        <form action="action/login.php" method="post">
                            <h1>Iniciar Sesión</h1>
                            <h2>Registre sus datos</h2>
                            <div>
                                <input type="text" name="email" class="form-control" placeholder="Correo Electrónico" required />
                            </div>
                            <div>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required/>
                            </div>
                            <div>
                                <button type="submit" name="token" value="Iniciar Sesion" class="btn btn-primary" >Iniciar Sesion</button>
                                <a class="reset_pass" href="recoverp.php">¿Olvidaste Tu contraseña?</a>
                            </div>
                            <div>
                                <h5>¿Aun no te registras?</h5>
                                <a href="register.php" style="text-decoration:none"><button type="button" class="btn btn-default">Registrate</button></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-ticket"></i> R2Ticket</h1>
                                    <p> <a style="text-decoration: underline;" target="_blank" href="../inicio.html">Inicio</a>©R2 Systems, Inc. Todos los derecho reservados</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
