<?php
global $mysqli;
global $urlweb;
?>

<div class="alert container col-md-6 col-md-offset-3 shadow-lg p-3 mb-5 bg-body rounded ">
<h3 class="alert text-center fw-bold fst-italic"> Crear Categoria </h3>

    <form class="" method="POST">
        <div class="container row ">
            <div class="mb-3">
                <label class="fw-bold">Nombre del Producto:</label>
                <input class="form-control" name="nombre_categoria" type="text" class="validate">
            </div>
            <div class="mb-3">
                <label class="fw-bold">Descripcion del Producto:</label>
                <textarea  class="form-control" name="descripcion" type="text" class="validate"></textarea>
            </div>
            <div class="mb-3">
                <label class="fw-bold">URL de Imagen:</label>
                <input class="form-control" name="url_imagen" type="text" class="validate">
            </div>
            <button class="btn btn-success " type="submit" name="agregar">Agregar Producto
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </form>
    <div class="alert container col-md-6 col-md-offset-3">
        <a class="btn btn-primary col-lg-9" href="?modulo=admin_categoria"><i class="bi bi-arrow-left"></i> Volver atrás</a>
    </div>
</div>

<?php
    if (isset($_POST['agregar'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="INSERT INTO categorias(nombre_categoria, descripcion, url_imagen) VALUES ('$nombre_categoria','$descripcion','$url_imagen')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3>Producto agregado de Manera Exitosa</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al agregar el producto.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Debe de llenar todos los campos</h3>
            <?php
        }
    }
?>