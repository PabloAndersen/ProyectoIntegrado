<?php
session_start();
include "php/conection.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Clases disponibles</h1>
                    <a href="./index.php" class="btn btn-warning">Menu principal</a>
                    <br><br>
                    <?php
                    error_reporting(0);
                    /*
                     * Esta es la consula para obtener todos los productos de la base de datos.
                     */

                        $clases = $con->query("select * from clase");
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <th>Número</th>
                            <th>Nivel</th>
                            <th>Localización</th>
                            <th>Número Participantes</th>
                            <th>Número Máximo</th>
                            <th></th>
                            </thead>
                            <?php
                            /*
                             * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
                             */
                            while ($r = $clases->fetch_object()):
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $r->id; ?></td>
                                        <td><?php echo $r->nivel; ?></td>
                                        <td><?php echo $r->localizacion; ?></td>
                                        <td><?php echo $r->numParticipantes; ?></td>
                                        <td><?php echo $r->maxParticipantes; ?></td>
                                        <td style="width:260px;">
                                            <?php
                                            if ($_SESSION['usuario'] != null) {
                                                if ($_SESSION["clases"]<>''){
                                                    
                                                    ?>
                                                    <a class="btn btn-info">Ya inscrito a una clase</a>
                                                <?php }else{ 
                                                    if($r->numParticipantes < $r->maxParticipantes){?>
                                                    <form class="form-inline" method="post" action="./Inscripcion.php">
                                                        <input type="hidden" name="id_clase" value="<?php echo $r->id; ?>">
                                                        <button type="submit" class="btn btn-primary">Inscribirte</button>
                                                    </form>	
                                                <?php
                                                    }else{
                                                        print "<p>Clase llena</p>";
                                                    }
                                                }
                                            } else {
                                                ?>
                                                <a href="iniciarSesion.php">Iniciar sesión para inscribirte</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
    <?php endwhile;
 ?>
                    </table>
<?php 
    if($_SESSION["idclase"]<>''){
        print "<h3>Inscrito en la clase id ".$_SESSION["idclase"]."</h3>";
        ?>
        <form class="form-inline" method="post" action="./Inscripcion.php">
                                                        <input type="hidden" name="id_desClase" value="<?php echo $r->id; ?>">
                                                        <button type="submit" class="btn btn-primary">Desinscribirse</button>
                                                    </form>
                    <?php 
    }
?>
                </div>
            </div>
        </div>
    </body>
</html>