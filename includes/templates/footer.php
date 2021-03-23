
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <!--  BOOSTRAP  --->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!-- Sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  <!-- AGREGAMOS LIBRERIA SWEETALERT (solo usaremos una funcion para el login .then() ) -->
  <script src="js/sweetalert2.all.min.js"></script>

  <!--  Agregamos el formulario de login  -->
  <?php
    $actual = obtenerPaginaActual();
    //var_dump($actual);
    if($actual === 'login' || $actual == 'crear-cuenta'){
      echo '<script src="js/formularioLogin.js"></script>';
    }
  ?>


  <script src="js/app.js"></script>
  <script src="https://kit.fontawesome.com/04730c9c8a.js" crossorigin="anonymous"></script>
  <script src="js/jquery-3.5.1.min.js"></script>

  <!-- ICONOS DE BOOSTRAP  -->
  
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
  
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>