<?php 

include 'function/conexion.php';
if (isset($_POST['descripcion'])) {
    $desccategoria = $_POST['descripcion'];
    
    $sql = "INSERT INTO categoriaprod(descripcionProd)";
    $sql .= "VALUES('".$desccategoria."')";
    $res = mysqli_query($con, $sql) or die(mysqli_error());
    header("Location:categoria.php");

}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("function/header.php"); ?>

  <body>
<?php include ("function/menu.php"); ?>
    <div class="container">

      <div class="starter-template">
        <h1>Categorías</h1>
        
        <form id="descripcion" class="form-horizontal" name="categoria" method="post" action="categoria_add.php" role="form">
            <div class="form-group">
                <label for="descripcion" class="col-lg-2 control-label">Descripci&oacute;n:</label>
                <div class="col-lg-10">
                    <input id="descripcion" class="form-control" name="descripcion" type="text" size="45" required="" value=""/>
                </div>
                </div>
            <input class="btn btn-default" type="submit" name="categoria" id="categoria" value="Agregar Categoria"/>
        </form>
      
      </div>
</form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
