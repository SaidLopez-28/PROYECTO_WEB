<?php
global $mysqli;
global $urlweb;
$idproducto = $_GET['idprod'];
$strsql = "SELECT productos.idprod, productos.nombre_producto, categorias.idcategoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM productos INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria WHERE idprod=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param ("i", $idproducto);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idprod, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
        $stmt->fetch();
        ?>
        <div class="container">
            <h3 class="center"> Editar Productos </h3>
            <form class="" method="POST">
                <div class="row">
                    <div class="mb-3">
                        <label class="">Nombre del Producto:</label>
                        <input class="form-control" name="nombre_producto" type="text" class="validate" value="<?php echo $nombre_producto ?>">
                    </div>
                    <div class="mb-3">
                        <label class="">ID de Categoria:</label>
                        <input class="form-control" name="idcategoria" type="text" class="validate" value="<?php echo $categoria ?>">
                    </div>
                    <div class="mb-3">
                        <label class="">Descripcion del Producto:</label>
                        <textarea class="form-control" name="descripcion" type="text" class="validate"><?php echo $descripcion?></textarea>  
                    </div>
                </div>
                <div class="row">
                <div class="mb-3">
                        <label class="">URL de Imagen:</label>
                        <input class="form-control" name="url_imagen" type="text" class="validate" value="<?php echo $url_imagen ?>">
                    </div>
                    <div class="mb-3">
                        <label class="">Precio:</label>
                        <input class="form-control" name="precio" type="text" class="validate" value="<?php echo $precio ?>">
                    </div>
                    <div class="mb-3">
                        <label class="">Cantidad:</label>
                        <input class="form-control" name="cantidad" type="text" class="validate" value="<?php echo $cantidad ?>">
                    </div>
                    <button class="btn waves-effect waves-light purple lighten-1" type="submit" name="edit" class="validate">Actualizar Productos
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <div class="right-align">
                <a class="btn purple lighten-1" href="?modulo=admin_productos"><i class=""></i>Regresar</a>    
            </div>
        </div>
        <?php
    }
    if (isset($_POST['edit'])){
        if (strlen($_POST['nombre_producto']) >= 1 &&
        strlen($_POST['idcategoria']) >= 1 && 
        strlen($_POST['descripcion']) >= 1 &&
        strlen($_POST['precio']) >=1 &&
        strlen($_POST['cantidad']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {
            $nombre_producto= trim($_POST['nombre_producto']);
            $idcategoria= trim($_POST['idcategoria']);
            $descripcion= trim($_POST['descripcion']);
            $precio= trim($_POST['precio']);
            $cantidad= trim($_POST['cantidad']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="UPDATE productos SET nombre_producto = '$nombre_producto', idcategoria = '$idcategoria', descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', url_imagen = '$url_imagen' WHERE idprod = '$idprod'";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3 class="center">Producto Actualizado</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al actualizar el producto.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Debe de llenar todos los campos</h3>
            <?php
        }
    }
}
?>