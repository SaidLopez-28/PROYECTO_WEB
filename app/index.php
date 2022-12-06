<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="app/css/styles.css">
</head>
<body class="grey lighten-4">
    <nav>
        <div class="nav-wrapper grey darken-4">
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="?modulo=inicio">Bienvenido</a></li>
            <li><a href="">Ofertas diarias</a></li>
            <li><a href="">Ayuda y contacto</a></li>
          </ul>
          <ul class="right hide-on-med-and-down">
            <li><a href=""><i class="material-icons">search</i></a></li>
            <li><a href=""><i class="material-icons">add_shopping_cart</i></a></li>
            <li><a href=""><i class="material-icons">notifications</i></a></li>
            <li><a href=""><i class="material-icons">more_vert</i></a></li>
          </ul>
        </div>
    </nav>

    <div class="">
     <?php $funciones->openModule($modulo); ?>
     </div>

    <!--Footer-->
    <footer class="page-footer grey darken-4 foot">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
           
          </div>
          <div class="col l6 offset-l2 s12">
          </div>
        </div>
      </div>
    <div class="footer-copyright">
      <div class="container">
      © 2022 Desarrollo de Aplicaciones en Internet
      <a class="grey-text text-lighten-4 right" href="#!">usap.edu</a>
      </div>
    </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
         var elems = document.querySelectorAll('.slider');
          var instances = M.Slider.init(elems);
         });
        
         //Dropdown 
         document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems);
         });
         
     
    </script>         
</body>
</html>
