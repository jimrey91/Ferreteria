<?php 

include 'function/conexion.php';

$getCategorias = "SELECT * FROM categoriaprod";
$resCatgoria = mysqli_query($con, $getCategorias);


if (isset($_POST['descProducto']) and isset($_POST['cantProducto']) and isset($_POST['precioProducto'])  ) {
    $descProducto = $_POST['descProducto'];
    $cantProducto = $_POST['cantProducto'];
    $precioProducto = $_POST['precioProducto'];
    $catProd = $_POST['catProducto'];
    
    $sql = "INSERT INTO producto(descProducto, cantProd, precio, categoriaid)";
    $sql .= "VALUES('".$descProducto."', '".$cantProducto."', '".$precioProducto."', '".$catProd."')";
    $res = mysqli_query($con, $sql) or die(mysqli_error());
    header("Location:producto.php");

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
          <h1>Agregar Producto</h1>
        <form id="descripcion" name="categoria" method="post" action="producto_add.php" class="form-horizontal">
            <div class="form-group">    
                <label class="col-lg-2 control-label">Descripci&oacute;n:</label>
                 <div class="col-lg-8">
                 <input class="form-control" name="descProducto" type="descripcion" size="45" required=""/>
                 </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Cantidad:</label>
                <div class="col-lg-8">
            <input class="form-control" name="cantProducto" type="cantidad" size="6" required=""/>
                </div>
            </div>
            <div class="form-group ">
            <label class="col-lg-2 control-label">Precio x Unidad:</label>
            <div class="col-lg-8">
                <div class="input-group">
            <span class="input-group-addon">$</span>   
            <input class="form-control" name="precioProducto" type="precio" size="6" required=""/>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Categor&iacute;a:</label>         
            <div class="col-lg-8">
            <?php
            echo "<select name='catProducto' class='form-control'>";
            while ($fila = mysqli_fetch_array($resCatgoria)) {
                echo "<option value='".$fila['idcategoria']."'>".$fila['descripcionProd']."</option>";
            }
            echo "</select>";
            ?>
            </div>
            </div>
            <input class="btn btn-primary btn-lg" type="submit" name="producto" id="producto" value="Agregar Producto"/>
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
