<?php
global $mysqli;
global $urlweb;
$idcategoria = $_GET['idcategoria'];
$strsql = "SELECT idcategoria, nombre_categoria, descripcion, url_imagen FROM categorias WHERE idcategoria=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param ("i", $idcategoria);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_imagen);
        $stmt->fetch();
        ?>
        <div class="container">
        <h3 class="center"> Editar Categoría </h3>
            <form class="" method="POST">
                <div class="row">
                    <div class="">
                        <label class="">Nombre de la Categoría:</label>
                        <input class="form-control" name="nombre_categoria" type="text" class="validate" value="<?php echo $nombre_categoria ?>">
                    </div>
                    <div class="">
                        <label class="">Descripción de la Categoría:</label>
                        <textarea class="form-control" name="descripcion" type="text" class="validate"><?php echo $descripcion?></textarea>  
                    </div>
                </div>
                <div class="row">
                <div class="">
                        <label class="">URL de Imagen:</label>
                        <input class="form-control" name="url_imagen" type="text" class="validate" value="<?php echo $url_imagen ?>">
                    </div>
                    <button class="btn waves-effect waves-light purple lighten-1" type="submit" name="edit" class="validate">Actualizar Categorias
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <div class="right-align">
                <a class="btn purple lighten-1" href="?modulo=admin_categorias"><i class=""></i> Regresar</a>
            </div>
        </div>
        <?php
    }
    if (isset($_POST['edit'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);;
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="UPDATE categorias SET nombre_categoria = '$nombre_categoria', descripcion = '$descripcion', url_imagen = '$url_imagen' WHERE idcategoria = '$idcategoria'";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3 class="center-align">Categoria actualizada de forma exitosa</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al actualizar la categoria</h2>
                <?php
            }
        }else {
            ?>
            <h3>Llenar todos los campos</h3>
            <?php
        }
    }
}
?>