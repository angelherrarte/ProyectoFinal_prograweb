<?php
$modulo = "Login";

require_once "controller/assets/validacion.php";

//Validacion de login
$login = new seguridad;
$login->iniciologin();

require_once "controller/assets/svrurl.php";
require_once "controller/assets/inicio.php";

//Numeros aleatorios
$num1 = rand(1, 10);
$num2 = rand(1, 10);

?>


<div class="row animated fadeIn" style="margin-bottom: 0;"><!-- row principal-->

  <nav class="colorP">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="./docs/images/logo_mini.png" style="width: 150%; height: auto;" /></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Mensaje acerca de-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <li><a href="#" onclick="mostrarMensaje()">Acerca de</a></li>

        <li><a href="https://www.uregional.edu.gt/">Uregional</a></li>
        <li><a href="https://energuate.com/">Home</a></li>
      </ul>
    </div>
  </nav>

  <!-- CARD BLANCO -->
  <div class="row center" style="margin-top: 4vh;">
    <div style="text-align: center;">
      <img src="./docs/images/logo-energuate.png" style="width: 20%; height: auto;" />
    </div>

    <div class="col s12">
      <h5 style="color: black;">Tableros de Negocios</h5>
      <h6 style="color: black;">Ingrese los siguientes datos:</h6>
    </div>
    <div class="col s8 offset-s4">
      <form id="login" accept-charset="utf-8" action="">
        <div class="row">
          <div class="col s12 m12">
            <div class="left">
              <span class="black-text" style="font-size: 18px;">Correo</span>
            </div>
          </div>
          <div class="col s12 m8">
            <div class="input-field col s11 m8">
              <input type="email" name="mail" id="mail" class="validate black-text login-input" required>
            </div>
          </div>
          <div class="col s12 m12">
            <div class="left">
              <span class="black-text" style="font-size: 18px;">Contraseña</span>
            </div>
          </div>
          <div class="col s12 m8">
            <div class="input-field col s11 m8">
              <input type="password" name="contra" id="pass" required class="validate black-text login-input" pattern=".{8,25}" title="La contraseña debe tener al menos 8 caracteres, incluyendo letras y números. No se permiten caracteres especiales no estándar.">
            </div>
          </div>

          <!-- Verificador humano -->
          <div class="col s12 m12">
            <div class="left">
              <span class="black-text" style="font-size: 18px;">¿Cuánto es <?php echo $num1; ?> + <?php echo $num2; ?>?</span>
            </div>
          </div>
          <div class="col s12 m8">
            <div class="input-field col s11 m8">
              <input type="number" name="human_check" id="human_check" class="validate black-text login-input" required>
              <input type="hidden" id="sum_result" value="<?php echo $num1 + $num2; ?>">
            </div>
          </div>
          <!-- Verificador humano -->
        </div>
        <div class="row">
          <div class="col s12 m12">
            <div class="col s4 offset-s4 m5">
              <div class="left">
                <input type="submit" id="botonlogin" class=" colorP btn-large  white-text" value="Ingresar" style="font-size: 18px; border-radius: 7px;">
              </div>
            </div>
          </div>
        </div>

        <!-- Botón Alta Usuario
        <div class="row">
          <div class="col s12 m12">
            <div class="col s4 offset-s4 m5">
              <div class="left">
                <input type="submit" id="botonalta" class=" colorP btn-large  white-text" value="Ingresar" style="font-size: 18px; border-radius: 7px;">
              </div>
            </div>
          </div>
        </div> -->

      </form>
    </div>
  </div>


  <!-- Derechos reservados -->
  <div class="row center" style="bottom: 0; width: 100%; text-align: center;">
    <div class="col s12">
      <img src="./docs/images/logo.png" style="width: 5%; height: auto;" />
    </div>
    <div class="col s12">
      <span class="black-text" style="font-size: 15px;"><a href="https://www.uregional.edu.gt/" class="black-text">Universidad Regional</a></span>

    </div>
  </div>

  <!-- Derechos reservados -->




</div><!-- row principal-->
<!-- row principal-->

<!-- SCRIPTS CARGA -->
<?php
require_once "controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->
<script>
  //Función para mostrar mensaje de acerca de
  function mostrarMensaje() {
    Swal.fire({
      title: 'Más información',
      html: "Universidad Regional de Guatemala<br>Tableros de Negocios usando DW<br>Curso: Programación Web<br>Angel de Jesús Herrarte Ambrocio<br>Carné 22-50-222",
      icon: 'info',
      confirmButtonText: 'Cerrar'
    });
  }

  jQuery(document).on("submit", "#login", function(event) {
    event.preventDefault();

    // Verificar si el usuario respondió correctamente a la pregunta
    const humanCheck = parseInt(jQuery("#human_check").val());
    const sum_Check = parseInt(jQuery("#sum_result").val());
    if (humanCheck !== sum_Check) {
      swal("Oops", "Respuesta incorrecta a la pregunta de verificación!", "error");
      return;
    }

    jQuery("#botonlogin").addClass("disabled");

    jQuery.ajax({
        url: "controller/db/login.php",
        type: "POST",
        dataType: "json",
        data: jQuery("#login").serialize(),
        cache: "false",
        beforeSend: function() {
          M.toast({
            html: "Cargando...",
            classes: "rounded colorP",
            //timeRemaining: 50,
          });
        },
      })
      .done(function(data) {
        if (data.acceso == "si") {
          console.log(data);
          window.location.href = "view/index.php";

          //swal ( "PM SCRUM" ,  "Bievenido al sistema" ,  "success" );
          jQuery("#botonlogin").removeClass("disabled");
        } else if (data.acceso == "no") {
          //Usuario Invalido
          swal("Sistema", "Usuario Bloqueado Informar a Desarrollo", "info");
          jQuery("#botonlogin").removeClass("disabled");
        } else if (data.error == true) {
          swal("Oops", "Correo o contraseña incorrecta! ", "info");
          jQuery("#botonlogin").removeClass("disabled");
        }
      })
      //funcion que está enviando codigo
      .done(function(data) {
        if (data.acceso === "codigo_enviado") {
          window.location.href = "index.php";
        } else if (data.acceso === "no") {
          swal("Sistema", "Usuario Bloqueado. Informar a Desarrollo.", "info");
          jQuery("#botonlogin").removeClass("disabled");
        } else if (data.error === true) {
          swal("Oops", "Correo o contraseña incorrecta.", "info");
          jQuery("#botonlogin").removeClass("disabled");
        }
      })

      .fail(function(errordata) {
        console.log(errordata.responseText);
      });

  });
</script>

<!-- Fin HTML -->
<?php
require_once "controller/assets/fin.php";
?>