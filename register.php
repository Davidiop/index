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

        <title>Registro </title>

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
                        $invalid=sha1(md5("correo existente"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$invalid) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> El correo ingresado ya ha sido registrado anteriormente...
                                </div>";
                        }
                        $correct=sha1(md5("registro correcto"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$correct) {
                            echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                                <strong>Exito!</strong> Se ha registrado correctamente
                                </div>";
                        }else{
                        $error=sha1(md5("error"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$correct) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Hubo un error... intentelo mas tarde
                                </div>";
                        }}
                    
                    ?>
                    <section class="login_content">
                        <form action="action/registers.php" method="post">
                            <h1>Registro</h1>
                            <h2>Registre sus datos</h2>
                            <div>
                                <h5 class="text-left">Correo Electronico:</h5>
                                <input type="text" name="email" class="form-control" placeholder="Correo Electrónico" required />
                            </div>
                            <div>
                                <h5 class="text-left">Nombre de usuario:</h5>
                                <input type="text" name="name" class="form-control" placeholder="Nombre de usuario" required/>
                            </div>
                            <div>
                                <h5 class="text-left">Contraseña:</h5>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required/>
                            </div>
                            <div>
                                <h5 class="text-left">Confirmar Contraseña:</h5>
                                <input type="password" name="confpassword" class="form-control" placeholder="Confirmar Contraseña" required/>
                            </div>
                            <div>
                                <button type="submit" name="register" value="register" class="btn btn-primary">Registrarse</button>
                            </div>
                            <div>
                                <br>
                                <h4>¿Ya tienes una cuenta?</h4>
                                <a href="index.php" style="text-decoration:none"><button type="button" class="btn btn-default">Iniciar Sesión</button></a>
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
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
