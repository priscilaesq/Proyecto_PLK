<?php date_default_timezone_set('America/Los_Angeles'); ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="/css/estilos.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link rel="shortcut icon" sizes="196x196" href="/imgs/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/estilos.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/funciones.js"></script>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

  <title>PLK Agency® CRM </title>
</head>
<body>

<section class="topnav-vendedor">
<div class="topnav" id="myTopnav">
  <a href="http://localhost/" class="active"><img class="imagen-size" src="/imgs/logo-nav.png"></a>
  <a class="space-navs" href="http://localhost/vendedor/">Mis Clientes</a>
  <a class="space-navs" href="http://localhost/vendedor/registrar_cliente">Registrar Cliente</a>
  <a class="space-navs" href="http://localhost/vendedor/archivados">Casos Archivados</a>
  <a class="space-navs" href="http://localhost/vendedor/perfil">Mi Perfil</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars">
      <img class="space-navs" src="/imgs/burger-menu.png">
    </i>
  </a>
</div>

</section>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


