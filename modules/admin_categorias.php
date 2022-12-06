
<?php 
   global $mysqli; 
   global $urlweb; 
?>

<h3 class="center">Administrador de Categorias</h3>
    <table class="centered">
        <thead>
            <tr>
                <th>Nombre Categoría</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $strsql="SELECT idcategoria, nombre_categoria, descripcion, url_imagen FROM `categorias`";
                if($stmt= $mysqli->prepare($strsql)) {
                    $stmt->execute();
                    $stmt->store_result();
                    if($stmt->num_rows > 0) {
                        $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_imagen); 
                        while($stmt->fetch()) {
                            ?>
                              
                              <tr id="<?php echo $idcategoria ?>">
                                    <td ><?php echo $nombre_categoria ?></td>
                                    <td width="600px"><?php echo $descripcion ?></td>
                                    <td class="center"><img src="<?php echo $url_imagen ?>" width="100px" alt=""></td>
                                    <td class="center"><a href="<?php $urlweb ?>?modulo=editar_categorias&idcategoria=<?php echo $idcategoria ?>" class="btn  ">Editar <i class="bi bi-pencil-square text-dark"></i></a></td>
                                    <td class="center"><a class="btn btn-danger editbtn" href="javascript:eliminar(<?php echo $idcategoria ?>)">Eliminar <i class="bi bi-trash-fill"></i></a></td>
                                </tr>
                            

                            <?php

                        
                        }
                    }   else {
                        echo "No hay registros"; 
                    }
                } else {
                    echo "No se pudo realizar la consulta";
                }

            ?>
           
        </tbody>
    </table>
    <div class="center">
    <a  class="btn waves-light" href="<?php $urlweb ?>?modulo=insertar_categorias">Agregar Categorias</a>
    </div>
    <script>
        function eliminar(idcategoria)
        {
            var url = '<?php echo $urlweb ?>services/ws_admin_categorias.php?accion=eliminar';
            fetch(url, {
                method: 'POST', 
                body: JSON.stringify({
                    "idcategoria": idcategoria
                })
            })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                const row = document.getElementById(idcategoria); 
                row.remove();
            })
            .catch((error) => {
                console.error(error);
            })
        }

    </script>