<?php
$modulo = "Verificar";
require_once "controller/assets/validacion.php";

//Validacion de login
$login = new seguridad;
$login->iniciologin(true);

require_once "controller/assets/svrurl.php";
require_once "controller/assets/inicio.php"; 
?>


  <div class="row animated fadeIn" style="margin-top: 50px;"><!-- row principal-->
    <!-- Formulario para ingresar el numero de acceso por correo de 2step verification -->
    <div class="col s12 m6 offset-m3">
      <div class="card">
        <div class="card-content">
          <span class="card-title center-align">Verificar Código</span>
          <form id="form-verificar-codigo" method="POST">
            <div class="input-field">
              <input id="codigo" name="codigo" type="text" class="validate" required>
              <label style="font-size: 10px;" for="codigo">Ingrese el código de verificación</label>
            </div>
            <div class="center">
              <button id="botonVerificar" class="btn waves-effect waves-light" type="submit" name="action">Verificar
                <i class="material-icons right">check</i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Derechos reservados -->
  <div class="row center">
    <div class="col s12" style="position: fixed; bottom: 0;">
      <span class="black-text" style="font-size: 14px;">&copy; ProntoBPO 2024</span>
    </div>
  </div>
  <!-- Derechos reservados -->


<!-- SCRIPTS CARGA -->
<?php
require_once "controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->
<script>
  

  jQuery(document).on("submit", "#form-verificar-codigo", function (event) {
  event.preventDefault();
  //jQuery("#botonVerificar").addClass("disabled");
  
  console.log(jQuery("#form-verificar-codigo").serializeArray());

  
  jQuery.ajax({
    url: "controller/db/verificar.php",
    type: "POST",
    dataType: "json",
    data: jQuery("#form-verificar-codigo").serialize(),
    cache: "false",
    beforeSend: function () {
      M.toast({
        html: "Cargando...",
        classes: "rounded colorP",
        timeRemaining: 50,
      });
    },
  })
    .done(function (data) {
      if (data.acceso == "si") {
        console.log(data);
        swal("Bienvenido", "Codigo Correcto.", "success").then((value) => {
          window.location.href = "./view/dashboard.php";
        });
        jQuery("#botonlogin").removeClass("disabled");
      } else if (data.acceso == "no") {
        //Usuario Invalido
        swal("Sistema", "El codigo es incorrecto.", "warning");
        jQuery("#botonlogin").removeClass("disabled");
      } else if (data.error == true) {
        swal("Oops", "error", "info");
        jQuery("#botonlogin").removeClass("disabled");
      }
    })
    .fail(function (errordata) {
      console.log(errordata.responseText);
    });
  


});

  // Puedes agregar aquí alguna validación extra con JS si lo necesitas
  document.addEventListener('DOMContentLoaded', function() {
    M.updateTextFields(); // Para inicializar los campos correctamente en caso de que haya valores previos
  });
</script>

<!-- Fin HTML -->
<?php
require_once "controller/assets/fin.php";
?>
