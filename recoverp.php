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

        <title>Recuperación de cuenta </title>

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
                        $noexist= "el usuario no existe";
                        if (isset($_GET['invalid']) && $_GET['invalid']==$noexist) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> El correo electronico no esta registrado.
                                </div>";
                        }
                       $correct="correo enviado";
                        if (isset($_GET['invalid']) && $_GET['invalid']==$correct) {
                            echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                                <strong>Exito!</strong> Se ha enviado el link a su correo!
                                </div>";
                        }
                    ?>
                    <section class="login_content">
                        <form action="action/recover.php" method="post" name="reset">
                            <h1>Recupera tu cuenta</h1>
                            <h2>Registre su Correo Electrónico</h2>
                            <div>
                                <input type="text" name="email" class="form-control" placeholder="Correo Electrónico" required />
                            </div>
                            <div>
                                <button type="submit" id="reset" value="recover" class="btn btn-primary">Enviar</button>
                            </div>
                            <br><br><br>
                            <div>
                                <h4>¿Aun no te registras?</h4>
                                <a href="register.php" style="text-decoration:none"><button type="button" class="btn btn-default">Registrate aqui</button></a>
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