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
                    <h1>Catalogo de productos</h1>
                    <a href="./carrito.php" class="btn btn-warning">Ver Carrito</a>
                    <a href="./index.php" class="btn btn-warning">Menu principal</a>
                    <h3>Busqueda por nombre</h3>
                    <form action="" method="post">
                        <input type="text" name="busqueda">
                        <input type="submit" name="enviar" value="Buscar"><br>
                    </form>
                    <br><br>
                    <?php
                    error_reporting(0);
                    /*
                     * Esta es la consula para obtener todos los productos de la base de datos.
                     */
                    if (isset($_POST['busqueda'])) {
                        $clases = $con->query("select * from productosub where nombre like '%$_POST[busqueda]%'");
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
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
                                        <td><?php echo $r->nombre; ?></td>
                                        <td><?php echo $r->precio; ?></td>
                                        <td><?php print "<a href='$r->imagen'>Imagen producto</a>" ?></td>
                                        <td><?php echo $r->descripcion; ?></td>
                                        <td style="width:260px;">
                                            <?php
                                            $found = false;

                                            if (isset($_SESSION["cart"])) {
                                                foreach ($_SESSION["cart"] as $c) {
                                                    if ($c["product_id"] == $r->id) {
                                                        $found = true;
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php
                                            //Compruebo si la sesión esta iniciada no puede comprar sin su sesión
                                            if ($_SESSION['usuario'] != null) {
                                                if ($found):
                                                    ?>
                                                    <a href="carrito.php" class="btn btn-info">Agregado</a>
                                                <?php else: ?>
                                                    <form class="form-inline" method="post" action="./php/addCarrito.php">
                                                        <input type="hidden" name="product_id" value="<?php echo $r->id; ?>">
                                                        <div class="form-group">
                                                            <input type="number" name="q" value="1" style="width:100px;" min="1" max="1" class="form-control" placeholder="Cantidad">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                                    </form>	
                                                <?php
                                                endif;
                                            } else {
                                                ?>
                                                <a href="iniciarSesion.php">Iniciar sesión para comprar</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php endwhile; ?>
                        </table>
                        <?php
                    } else {

                        $clases = $con->query("select * from productosub");
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
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
                                        <td><?php echo $r->nombre; ?></td>
                                        <td><?php echo $r->precio; ?></td>
                                        <td><?php print "<a href='$r->imagen'>Imagen producto</a>" ?></td>
                                        <td><?php echo $r->descripcion; ?></td>
                                        <td style="width:260px;">
                                            <?php
                                            $found = false;

                                            if (isset($_SESSION["cart"])) {
                                                foreach ($_SESSION["cart"] as $c) {
                                                    if ($c["product_id"] == $r->id) {
                                                        $found = true;
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['usuario'] != null) {
                                                if ($found):
                                                    ?>
                                                    <a href="carrito.php" class="btn btn-info">Agregado</a>
            <?php else: ?>
                                                    <form class="form-inline" method="post" action="./php/addCarrito.php">
                                                        <input type="hidden" name="product_id" value="<?php echo $r->id; ?>">
                                                        <div class="form-group">
                                                            <input type="number" name="q" value="1" style="width:100px;" min="1" max="1" class="form-control" placeholder="Cantidad">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                                    </form>	
                                                <?php
                                                endif;
                                            } else {
                                                ?>
                                                <a href="iniciarSesion.php">Iniciar sesión para comprar</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
    <?php endwhile;
} ?>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>