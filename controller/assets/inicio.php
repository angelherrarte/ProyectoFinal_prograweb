<?php

setlocale(LC_TIME, 'Spanish_Guatemala');
date_default_timezone_set("America/Guatemala");

if (!isset($modulo)) {
      $modulo = "Home";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
      <link type="text/css" rel="stylesheet" href="../../../dw/app/css/local.css" media="screen,projection" />
      <!--Import Google Icon Font-->
      <meta charset="UTF-8" />
      <!-- Chrome, Firefox OS y Opera -->
      <meta name="theme-color" content="#6428a1" />
      <!-- Windows Phone -->
      <meta name="msapplication-navbutton-color" content="#6428a1" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" href="<?php echo SERVERURL; ?>app/css/materialize.css" rel="stylesheet" media="screen,projection" />
      <link type="text/css" href="<?php echo SERVERURL; ?>app/css/local.css" rel="stylesheet" media="screen,projection" />
      <link type="text/css" href="<?php echo SERVERURL; ?>app/css/animate.css" rel="stylesheet" />
      <link type="text/css" href="<?php echo SERVERURL; ?>app/css/fa/css/all.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" />
      <script type="text/javascript" src="<?php echo SERVERURL; ?>app/js/jquery-3.2.1.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Icono !-->
      <link rel="icon" type="image/x-icon" href="<?php echo SERVERURL; ?>./docs/images/logo_mini.png" />
      <title><?php echo $modulo; ?> - Tableros de Negocios</title>
</head>

<?php if ($modulo == "Login") {
?>

      <body class="fondoLogin">
      <?php
} else {
      ?>
            <!-- chatbot -->

            <body id="bodyprin" class="fondowall2 responsivo">
                  <script>
                        window.addEventListener('mouseover', initLandbot, {
                              once: true
                        });
                        window.addEventListener('touchstart', initLandbot, {
                              once: true
                        });
                        var myLandbot;

                        function initLandbot() {
                              if (!myLandbot) {
                                    var s = document.createElement('script');
                                    s.type = 'text/javascript';
                                    s.async = true;
                                    s.addEventListener('load', function() {
                                          var myLandbot = new Landbot.Livechat({
                                                configUrl: 'https://storage.googleapis.com/landbot.site/v3/H-2675580-K2OL1BY3GCDMNVNV/index.json',
                                          });
                                    });
                                    s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
                                    var x = document.getElementsByTagName('script')[0];
                                    x.parentNode.insertBefore(s, x);
                              }
                        }
                  </script>
            <?php
      }
