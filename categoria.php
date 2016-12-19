<?php 
include 'function/conexion.php';
$sql = "SELECT * FROM categoriaprod";
$res = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'function/header.php'; ?>

  <body>
<?php include 'function/menu.php'; ?>
    <div class="container">

      <div class="starter-template">
        <h1>Categor&iacutea</h1>
        <a href="categoria_add.php" class="btn btn-lg btn-success">Agregar categoria</a>
        <br>
        <br>
        <table class="table table-striped table-hover table-condensed">
            <tr>
                <td><b>Descripción</b></td>
                
                <td><b>Acción</b></td>
            </tr>
            <?php while ($row = mysqli_fetch_array($res)) {?>
            <tr>
                <td><?php echo $row['descripcionProd'];?></td>
                <td>
                    <a href="categoria_edit.php?id=<?php echo $row['idcategoria'];?>" class="btn btn-default btn-warning">Editar</a> 
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
