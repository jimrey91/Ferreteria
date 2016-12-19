<?php 
include 'function/conexion.php';

//Traer categorias de los productos de la BD

$sqlCat = "SELECT * FROM categoriaProd";
$resCat = mysqli_query($con, $sqlCat);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM producto WHERE idproducto = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
}  else {
    echo "Debe especificar un 'id'.\n";
}

if (isset($_POST['actualizar'])) {
    if (!empty($_POST['descProducto']) and !empty($_POST['cantProducto']) and !empty($_POST['precioProducto'])) {
        $idProducto = $_POST['idProducto'];
        $descProducto = $_POST['descProducto'];
        $cantProducto = $_POST['cantProducto'];
        $precioProducto = $_POST['precioProducto'];
        $catProd = $_POST['catProducto'];
    
        $sqlUpdate = mysqli_query($con ,"UPDATE producto SET descProducto = '$descProducto', cantProd = '$cantProducto', precio = '$precioProducto',"
            . "categoriaid = '$catProd' WHERE idproducto = '$idProducto'") or die(mysqli_error());
        header("Location:producto.php");
    }  else {
        echo "debe llenar los campos";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include ("function/header.php"); ?>

  <body>
<?php include ("function/menu.php"); ?>
    <div class="container">
      <div class="starter-template">
            <h1>Editar Producto</h1>
            <form id="producto" name="producto" method="post" action="producto_edit.php" class="form-horizontal">
               <div class="form-group">    
                <label class="col-lg-2 control-label">Descripci&oacute;n:</label>
                 <div class="col-lg-8">
            <input class="form-control" name="descProducto" type="descProducto" size="45" value="<?php echo $row['descProducto']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Cantidad:</label>
                <div class="col-lg-8">
            <input class="form-control" name="cantProducto" type="cantProducto" size="6" value="<?php echo $row['cantProd']; ?>"/>
               </div>
            </div>
            <div class="form-group ">
            <label class="col-lg-2 control-label">Precio x Unidad:</label>
            <div class="col-lg-8">
                <div class="input-group">
            <span class="input-group-addon">$</span>   
            <input class="form-control" name="precioProducto" type="precioProducto" size="6" value="<?php echo $row['precio']; ?>"/>
            </div>
             </div>
              </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Categor&iacute;a:</label>         
            <div class="col-lg-8">
            <?php
            echo "<select name='catProducto' class='form-control'>";
            while ($rowCat = mysqli_fetch_array($resCat)) {
                echo "<option value='".$rowCat['idcategoria']."'";
                if ($rowCat['idcategoria']== $row['categoriaid']) {
                    echo "selected";
                }
                echo '>'.$rowCat['descripcionProd']."</option>";
            }
            echo "</select>";
            ?>
            </div>
            </div>
            <input type="hidden" name="idProducto" value="<?php echo $row['idproducto'];?>"/>
            
            <input class="btn btn-primary btn-lg" type="submit" name="actualizar" id="producto" value="Editar Producto"/>
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
