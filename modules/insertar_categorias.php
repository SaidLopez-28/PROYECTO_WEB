<?php
global $mysqli;
global $urlweb;
?>

<div class="container">
<h3 class="center"> Agregar Categorias </h3>

    <form class="" method="POST">
        <div class="">
            <div class="">
                <label class="fw-bold">Id de la Categoria:</label>
                <input class="form-control" name="idcategoria" type="text" class="validate">
            </div>
            <div class="">
                <label class="fw-bold">Nombre de la Categoria:</label>
                <input class="form-control" name="nombre_categoria" type="text" class="validate">
            </div>
            <div class="">
                <label class="fw-bold">Descripción de la Categoria:</label>
                <textarea  class="form-control" name="descripcion" type="text" class="validate"></textarea>
            </div>
            <div class="">
                <label class="fw-bold">URL de Imagen:</label>
                <input class="form-control" name="url_imagen" type="text" class="validate">
            </div>
            
            <button class="btn waves-effect waves-light purple lighten-1" type="submit" name="agregar">Agregar Categoria
            <i class="material-icons right">send</i>
            
            </div>
        </div>
    </form>
    <div class="container right-align">
        <a class="btn purple lighten-1" href="?modulo=admin_categorias"><i class=""></i> Regresar</a>
    </div>
</div>

<?php
    if (isset($_POST['agregar'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {   
            $id_categoria= trim($_POST['idcategoria']);
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="INSERT INTO categorias(idcategoria,nombre_categoria, descripcion, url_imagen) VALUES ('$id_categoria','$nombre_categoria','$descripcion','$url_imagen')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3 class="center">Categoría Agregada</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al agregar la categoria.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Llenar todos los campos</h3>
            <?php
        }
    }
?>