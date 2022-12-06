<?php
global $mysqli; 
?>
<!-- Dropdown Structure -->
      <div class="container">
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
  </ul>
  <nav>
    <div class="nav-wrapper purple darken-4">
      <a href="#!" class=""><img src="app/img/music.jpg" height="80px" width="300px" alt=""></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="badges.html"></a></li>
        <!-- Dropdown Trigger -->
        <li><a class="" href="?modulo=admin_categorias" data-target="dropdown1">Categorías<i class="material-icons right">arrow_drop_down</i></a></li>
       <li><a href="?modulo=admin_productos"><span>Productos<i class=" material-icons right">store</i></span></a></li>
      </ul>
    </div>
  </nav>
</div>
      <!-- Slider -->
      
      <div class="container">
      <div class="slider">
        <ul class="slides">
          <li>
            <img height="100px" src="app/img/instrumentos.jpeg"> 
            <div class="caption center-align">
              <h3></h3>
              <h5 class="light grey-text text-lighten-3">.</h5>
            </div>
          </li>
          <li>
            <img src="https://noticiasargentinas.com/media/k2/items/cache/ff9026b91fd20e1c9994473a591ccdaa_L.jpg?t=20211116_002758"> <!-- random image -->
            <div class="caption left-align">
              <h3></h3>
              <h5 class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
          <li>
            <img src="https://www.bigbandmusica.es/images/2022/03/01/slide2.jpg"> <!-- random image -->
            <div class="caption right-align">
              <h3></h3>
              <h5 class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
          <li>
            <img src="https://img.freepik.com/fotos-premium/tablero-dj-controlador-musica-profesional-mezclar-musica-electronica-fiesta-club-nocturno_118086-3417.jpg?w=2000"> <!-- random image -->
            <div class="caption center-align">
              <h3></h3>
              <h5 class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
        </ul>
      </div>
    </div>
    
      <!--Bloque#1-->
    <div class="container center-align">
        <div class="row">
          <h5 class="center-align"> <br> Instrumentos para ti</h5>
          <?php 
           $strsql= "SELECT `idprod`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` LIMIT 4";
           if($stmt = $mysqli->prepare($strsql)) {
            $stmt -> execute();
            $stmt-> store_result();
            if($stmt->num_rows > 0){
              $stmt->bind_result($idprod,$nombre_producto,$idcategoria,$descripcion,$precio,$url_imagen);
              while($stmt->fetch()) {
                ?>
                <a href="?modulo=detalle_productos&idprod=<?php echo $idprod ?>">
                <div class="container">
                <div class="col s12 m7 l3">
                <img src="<?php echo $url_imagen ?>" class="responsive-img" alt=""> <!--cambiar url por php --> 
                <p class=""><?php echo $nombre_producto ?><br><?php echo "L ".number_format($precio,2) ?></p>
                </div>
                </div>
                </a>
                

                <?php
              }       
            }
            else {
              echo "No hay datos que mostrar"; 
             }
           }
          else {
            echo "no se pudo preparar la consulta"; 
           }
          ?>
      </div>
     <!--Bloque#2-->
      <div class="row">
      <h5 class="center-align">Lo más solicitado</h5>
      <?php 
           $strsql= "SELECT `idprod`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` LIMIT 5,2";
           if($stmt = $mysqli->prepare($strsql)) {
            $stmt -> execute();
            $stmt-> store_result();
            if($stmt->num_rows > 0){
              $stmt->bind_result($idprod,$nombre_producto,$idcategoria,$descripcion,$precio,$url_imagen);
              while($stmt->fetch()) {
                ?>
                <a href="?modulo=detalle_productos&idprod=<?php echo $idprod ?>">
                <div class="col s12 m3 l6">
                  <img src="<?php echo $url_imagen ?>" class="" height="300px" weight="300px" alt="">
                  <p><?php echo $nombre_producto ?><br><?php echo "L ".number_format($precio,2) ?></p>
                </div>
                </a>
        

                <?php
              }       
            }
            else {
              echo "No hay datos que mostrar"; 
             }
           }
          else {
            echo "no se pudo preparar la consulta"; 
           }
          ?>
      </div>
      
      <div class="row">
        <h5 class="center-align">Especial de Temporada</h5>
        <?php 
           $strsql= "SELECT `idprod`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` LIMIT 1";
           if($stmt = $mysqli->prepare($strsql)) {
            $stmt -> execute();
            $stmt-> store_result();
            if($stmt->num_rows > 0){
              $stmt->bind_result($idprod,$nombre_producto,$idcategoria,$descripcion,$precio,$url_imagen);
              if($stmt->fetch()) {
                ?>
                 <a href="?modulo=detalle_productos&idprod=<?php echo $idprod ?>">
                 <div class="col s12 m6 l12">
                    <img src="<?php echo $url_imagen ?>" class="circle" alt="">
                    <p class="center-align"><?php echo $nombre_producto ?><br><?php echo "L ".number_format($precio,2) ?></p>
                 </div>
        

                <?php
              }       
            }
            else {
              echo "No hay datos que mostrar"; 
             }
           }
          else {
            echo "no se pudo preparar la consulta"; 
           }
          ?>  
      </div> 

      <div class="row">
      <h5 class="center-align">Compra por Categoría</h5>
      <?php 
           $strsql= "SELECT `idcategoria`, `nombre_categoria`, `url_imagen`, `descripcion` FROM `categorias` LIMIT 4";
           if($stmt = $mysqli->prepare($strsql)) {
            $stmt -> execute();
            $stmt-> store_result();
            if($stmt->num_rows > 0){
              $stmt->bind_result($idcategoria,$nombre_categoria,$url_imagen,$descripcion);
              while($stmt->fetch()) {
                ?>
                 <a href="?modulo=detalle_categorias&idcategoria=<?php echo $idcategoria ?>">
                    <div class="col s12 m6 l3">
                      <img src="<?php echo $url_imagen ?>" class="responsive-img" alt="">
                    </div>     
              </a>
                <?php
              }       
            }
            else {
              echo "No hay datos que mostrar"; 
             }
           }
          else {
            echo "no se pudo preparar la consulta"; 
           }
          ?>
      </div>
<!--
     <div class="container">
      <h5 class="center-align">Las mejores marcas</h5>
      <div class="row center-align">
        <div class="col m3 l6">
      <img src="app/img/acer.webp" class="responsive-img" alt="">
      <p>New Balance zx568 <br>$37.59</p>
       </div>
       <div class="col m3 l6">
      <img src="app/img/dell.webp" class="responsive-img" alt="">
      <p>$37.59</p>
      <br>
       </div>  -->   
       <!--
       <h5 class="center-align">Oferta Especial</h5>
       <div class="col m6 l12">
        <img src="app/img/offers.webp" class="responsive-img" alt="">
        <p class="center-align">New Balance zx568 <br>$37.59</p>
       </div> -->
       <!--
       <div class="row">
       <h5 class="center-align">Compra por Categoría</h5>
       <div class="col s12 m6 l3">
        <img src="app/img/cels.webp" alt="">
        <p>Celulares</p>
       </div>
       <div class="col s12 m6 l3">
        <img src="app/img/pc.webp" alt="">
        <p>Computadoras</p>
       </div>
       <div class="col s12 m6 l3">
        <img src="app/img/apple.webp" alt="">
        <p>Apple</p>
       </div>
       <div class="col s12 m6 l3">
        <img src="app/img/canon.webp" alt="">
        <p>Camáras</p>
       </div>
      </div>
    </div>
          -->