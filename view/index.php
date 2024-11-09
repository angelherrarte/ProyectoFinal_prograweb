<?php

setlocale(LC_ALL, "es_ES");
$modulo = "Inicio";
$nav = '1';

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

//Validacion de login
$login = new seguridad;
$login->seguridadLogin();

require_once "../controller/assets/session.php";

?>
<!-- Usuario -->
<a id="tipodeusuario" class="hide"><?php echo $pm_tipo ?></a>
<!-- Usuario -->
<?php
////Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

<!-- BODDY -->
<div id="bodysecon" class="row">
  <h2>Bienvenido <?php echo $template_nombre ?></h2>
  <div>

    <!-- Tableros -->
    <center>
      <p>Tracking de Lecturas</p>
      <iframe class="colorPB" frameborder="0" allowFullScreen="true" title="Tracking de Lecturas" width="100%" height="541.25" src="https://app.powerbi.com/view?r=eyJrIjoiNjQzYzA2N2ItY2UzMy00ODNjLTk4MjQtMzY2ZjA3YzZmM2E5IiwidCI6IjVhM2E4NWE5LTA2MDktNDMzMC04ZGNmLWQ2YWI1NzdkNTg2MyIsImMiOjR9"></iframe>
      <p>Recaudo</p>
      <iframe class="colorPB" frameborder="0" allowFullScreen="true" title="Recaudo" width="100%" height="541.25" src="http://dsw2k12pbip/reports/powerbi/Comercial/Recaudo/Recaudo%20RS"></iframe>
    </center>
  </div>
</div>
<!--Datos-->
<!-- BODDY -->

<!-- SCRIPTS CARGA -->
<?php
require_once "../controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->

<!-- SCRIPTS -->
<script>


</script>
<!-- SCRIPTS  -->


<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>