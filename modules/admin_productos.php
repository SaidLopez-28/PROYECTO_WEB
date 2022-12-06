<?php 
   global $mysqli; 
   global $urlweb; 
?>

<h3 class="center">Administrador de Productos</h3>
    <table class="centered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $strsql="SELECT productos.idprod, productos.nombre_producto, categorias.nombre_categoria,productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria ";
                if($stmt= $mysqli->prepare($strsql)) {
                    $stmt->execute();
                    $stmt->store_result();
                    if($stmt->num_rows > 0) {
                        $stmt->bind_result($idprod,$nombre_producto,$idcategoria,$descripcion,$url_imagen,$precio,$cantidad); 
                        while($stmt->fetch()) {
                            ?>
                              <tr id="<?php echo $idprod ?>">
                                    <td><?php echo $nombre_producto?></td>
                                    <td><?php echo $idcategoria ?></td>
                                    <td><?php echo $descripcion ?></td>
                                    <td><img src="<?php echo $url_imagen ?>" weight="100px" height="100px" alt=""></td>
                                    <td><?php echo $precio ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><a class="btn blue" href="<?php $urlweb?>?modulo=editar_productos&idprod=<?php echo $idprod ?>">Editar</a></td>
                                    <td><a class="btn red" href="javascript:eliminar(<?php echo $idprod ?>)">Eliminar</a></td>
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
    <a  class="btn waves-light green" href="<?php $urlweb ?>?modulo=insertar_productos">Agregar Productos</a>
    </div>
    <script>
        function eliminar(idprod)
        {
            var url = '<?php echo $urlweb ?>services/ws_admin_productos.php?accion=eliminar';
            fetch(url, {
                method: 'POST', 
                body: JSON.stringify({
                    "idprod": idprod
                })
            })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                const row = document.getElementById(idprod); 
                row.remove();
            })
            .catch((error) => {
                console.error(error);
            })
        }

    </script>

 