<?php

setlocale(LC_ALL, "es_ES");
$modulo = "usuario";
$nav = '9';

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

//Validacion de login
$login = new seguridad;
$login->seguridadLogin();

require_once "../controller/assets/session.php";

?>
<!-- Usuario -->
<a id="idUsuarioPerfil" class="hide"><?php echo $template_id ?></a>
<a id="CorreoUsuarioPerfil" class="hide"><?php echo $template_email ?></a>
<a id="NombreUsuarioPerfil" class="hide"><?php echo $template_nombre ?></a>
<a id="TipoUsuarioPerfil" class="hide"><?php echo $template_tipo ?></a>
<a id="AccesoUsuarioPerfil" class="hide"><?php echo $template_acceso ?></a>
<!-- Usuario -->
<?php
////Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

<!-- BODDY -->
<div id="bodysecon" class="row">
  <center>
    <h1>Usuario</h1>
  </center>
  <div class="row container">
    <form class="col s12" method="post" id="EditarUsuario">
      <div class="row">
        <!-- Campo para el nombre -->
        <div class="input-field col s6">
          <input placeholder="Ingrese su nombre" id="template_nombre" name="template_nombre" type="text" class="validate" value="<?php echo $template_nombre; ?>">
          <label for="template_nombre">Nombre</label>
        </div>

        <!-- Campo para el email -->
        <div class="input-field col s6">
          <input placeholder="Ingrese su email" id="template_email" name="template_email" type="email" class="validate" value="<?php echo $template_email; ?>">
          <label for="template_email">Email</label>
        </div>
      </div>

      <div class="row">
        <!-- Campo para el tipo -->
        <div class="col s6">
          <div class="row nomargin">
            <div class="input-field col s11">
              <select id="template_tipo" name="template_tipo">
                <option value="" disabled selected>Seleccione el Tipo de Usuario </option>
                <option value="Admin">Admin</option>
                <option value="Usuario">Usuario</option>
                <option value="Supervisor">Supervisor</option>
              </select>
              <label>Tipo de Usuario</label>
            </div>
          </div>
        </div>

        <!-- Campo para el acceso -->
        <div class="col s6">
          <div class="row nomargin">
            <div class="input-field col s11">
              <select id="template_acceso" name="template_acceso">
                <option value="" disabled selected>Seleccione el Nivel de Acceso </option>
                <option value="0">Desbloquear</option>
                <option value="1">Bloquear</option>
              </select>
              <label>Nivel de Acceso</label>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Campo para la contraseña -->
        <div class="input-field col s6">
          <input placeholder="Ingrese la contraseña" id="template_contra" name="template_contra" type="password">
          <label for="template_contra">Contraseña</label>
        </div>


        <!-- Campo para confirmar la contraseña -->
        <div class="input-field col s6">
          <input placeholder="Confirme su contraseña" id="template_contra2" name="template_contra2" type="password">
          <label for="template_contra2">Confirme su contraseña</label>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <a>
            Dejar en blanco si no desea cambiar la contraseña.
          </a>
        </div>
      </div>

      <!-- Campo oculto para el id -->
      <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $template_id; ?>">

      <!-- Botón para enviar el formulario -->
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light">Guardar</button>
        </div>
      </div>
    </form>
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
  $(document).ready(function() {
    $('select').formSelect();
  });

  jQuery(document).on("submit", "#EditarUsuario", function(event) {
    event.preventDefault();

    // Validar que las contraseñas coincidan
    const contra = jQuery("#template_contra").val();
    const confirmarContra = jQuery("#template_contra2").val();

    //logica para validar que las contraseñas coincidan
    if (contra !== confirmarContra) {
      swal("Error", "Las contraseñas no coinciden", "error");
      return;
    }

    // Validar que los campos no estén vacíos
    //console.log(jQuery("#EditarUsuario").serializeArray());

    jQuery("#botonEditar").addClass("disabled");

    jQuery.ajax({
        url: "../controller/db/editar_usuario.php",
        type: "POST",
        dataType: "json",
        data: jQuery("#EditarUsuario").serialize(),
        cache: "false",
        beforeSend: function() {
          M.toast({
            html: "Guardando cambios...",
            classes: "rounded colorP",
            timeRemaining: 50,
          });
        },
      })
      .done(function(data) {
        if (data.error === false) {
          swal("Sistema", "Usuario actualizado correctamente!", "success");
          jQuery("#botonEditar").removeClass("disabled");
        } else {
          swal("Oops", "No se pudo actualizar el usuario. Intenta de nuevo!", "error");
          jQuery("#botonEditar").removeClass("disabled");
        }
      })
      .fail(function(errordata) {
        console.log(errordata.responseText);
        swal("Error", "Hubo un problema al procesar la solicitud!", "error");
        jQuery("#botonEditar").removeClass("disabled");
      });

  });
</script>
<!-- SCRIPTS  -->


<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>