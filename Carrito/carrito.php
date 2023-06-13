<?php
/*
 * Este archio muestra los productos en una tabla.
 */
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Carrito</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Carrito</h1>
                    <a href="./productos.php" class="btn btn-default">ProductosSub</a>
                    <br><br>
                    <?php
                    /*
                     * Esta es la consula para obtener todos los productos de la base de datos.
                     */
                    $libros = $con->query("select * from productosub");
                    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
                        ?>

                        <table class="table table-bordered">
                            <thead>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th></th>
                            </thead>
                            <?php
                            $_SESSION['precio']=0;
                            /*
                             * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
                             */
                            foreach ($_SESSION["cart"] as $c):
                                $libros = $con->query("select * from productosub where id=$c[product_id]");
                                $r = $libros->fetch_object();
                                ?>
                                <tr>
                                    <th><?php echo $c["q"]; ?></th>
                                    <td><?php echo $r->nombre; ?></td>
                                    <td>$ <?php echo $r->precio; ?></td>
                                    <td>$ <?php echo $c["q"] * $r->precio; ?></td>
                                    <?php $_SESSION['precio']=$_SESSION['precio']+$c["q"] * $r->precio?>
                                    <td style="width:260px;">
                                        <?php
                                        $found = false;
                                        foreach ($_SESSION["cart"] as $c) {
                                            if ($c["product_id"] == $r->id) {
                                                $found = true;
                                                break;
                                            }
                                        }
                                        
                                        ?>
                                        
                                        <a href="php/eliminarCarrito.php?id=<?php echo $c["product_id"]; ?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </table>

                        <form class="form-horizontal" method="post" action="./php/procesarCarrito.php">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Procesar Venta</button>
                                </div>
                            </div>
                        </form>


<?php else: ?>
                        <p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif; ?>

                </div>
            </div>
        </div>
    </body>
</html>