<?php 
include 'function/conexion.php';
$sql = "SELECT * FROM producto,categoriaprod WHERE producto.categoriaid = categoriaprod.idcategoria";
$res = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'function/header.php'; ?>

  <body>
<?php include 'function/menu.php'; ?>
    <div class="container">

      <div class="starter-template">
        <h1>Producto</h1>
        <a href="producto_add.php" class="btn btn-lg btn-success">Agregar producto</a>
        <br>
        <br>
        <table class="table table-striped">
            <tr>
                <td>Descripción</td>
                <td>Stock</td>
                <td>Precio</td>
                <td>Categoria</td>
                <td>Acción</td>
            </tr>
            <?php while ($row = mysqli_fetch_array($res)) {?>
            <tr>
                <td><?php echo $row['descProducto'];?></td>
                <td><?php echo $row['cantProd'];?></td>
                <td><?php echo $row['precio'];?></td>
                <td><?php echo $row['descripcionProd'];?></td>               
                <td>
                    <a href="producto_edit.php?id=<?php echo $row['idproducto'];?>" class="btn btn-default btn-warning">Editar</a> 
                    <a href="categoria_del.php?id=<?php echo $row['idcategoria'];?>" class="btn btn-default btn-danger" onclick="return confirmation()">Elimninar</a>
                </td>
            </tr>
            <?php }?>           
        </table>
      </div>

    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
