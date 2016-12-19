<?php
include 'function/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM categoriaprod WHERE idcategoria = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
}  else {
    echo "Debe especificar un 'id'.\n";
}

if (isset($_POST['actualizar'])) {
    if (!empty($_POST['descripcion'])) {
        
        $idcategoria = $_POST['idcategoria'];
        $desccategoria = $_POST['descripcion'];
        
        $sqlUpdate = mysqli_query($con ,"UPDATE categoriaprod SET descripcionProd = '$desccategoria'"
                . "WHERE idcategoria = '$idcategoria'") or die(mysqli_error());
        header("location:categoria.php");
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
        <h1>Editar Categoría</h1>
        <form id="categoria" name="categoria" method="post" action="categoria_edit.php" class="form-horizontal" role="form">
            <div class="form-group" >
                <label for="descripcion" class="col-lg-2 control-label">Descripcion</label>
                <div class="col-lg-10">
                   <input class="form-control" name="descripcion" type="text" id="descripcion"  required="" 
                   value="<?php echo $row['descripcionProd']; ?>" size="45"/>
                </div>
            </div>
            <input type="hidden" name="idcategoria" value="<?php echo $row['idcategoria']; ?>"/>
            <input class="btn btn-default" type="submit" name="actualizar" id="categoria" value="Editar Categoria"/>
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
