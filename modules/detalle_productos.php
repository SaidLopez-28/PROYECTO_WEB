<?php
    global $mysqli; 
    $idprod = $_GET['idprod']; 
    $strsql = "SELECT idprod, nombre_producto, descripcion, precio, cantidad, url_imagen FROM productos where idprod=?"; 
    if($stmt = $mysqli->prepare($strsql)) {
        $stmt->bind_param("i",$idprod); 
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0) {
            $stmt->bind_result($idprod,$nombre_producto,$descripcion,$precio,$cantidad,$url_imagen);
            $stmt->fetch();
        }else {
            echo "No hay nada que mostrar"; 
        }
    } else {
        echo "No se pudo preparar la consulta";  
    }
?>

 
    <div class="row">
    <div class="col l6 m6 s12">
        <img src="<?php echo $url_imagen ?>" alt="">  
    </div class="col l6 m6 s12">
        <h4><?php echo $nombre_producto	?></h4>
        Descripción del producto: <b><span><span><?php echo $descripcion ?></span></span></b>
        Cantidad en existencia: <b><span><span><?php echo $cantidad ?></span></span></b>
        <h5>Precio: <b><?php echo $precio ?></b></h5>
        <a href="" class="red darken-3 btn"><i class="material-icons left">add_shopping_cart</i>AGREGAR AL CARRITO</a>
    </div>
 </div>
