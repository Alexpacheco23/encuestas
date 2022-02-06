<?php
require_once 'old/conexion.php';

use old\Conexion;

$consult = new Conexion;
//$consult->createTable();

$consult->ejecutar();
$consulta = $consult->consultaPreguntas();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">

<head>
  <meta charset="UTF-8">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <meta name="keywords" content="funvisis, sismos, geologia, amenaza sismica, boletines, terremotos, prevencion" />

  <title>FUNVISIS - Encuesta
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--  Para escoger CSS dependiendo de la Resolución -->
  <link rel="stylesheet" href="css/tables.css" type="text/css" />
  <link rel="stylesheet" href="includes/calendar/calendar-blue.css" type="text/css">
  <link rel="stylesheet" href="includes/limpia_caracteres.php" type="text/css">
  <script type="text/javascript" src="js/estiloxresolucion.js"></script>
  <script type="text/javascript" src="includes/varios.js"></script>
  <script type="text/javascript" src="includes/calendar/calendar.js"></script>
  <script type="text/javascript" src="includes/calendar/calendar-es.js"></script>
  <script type="text/javascript" src="includes/calendar/calendar-setup.js"></script>
  <script type="text/javascript" src="includes/jquery-1.9.0.js"></script>
  <script type="text/javascript" src="includes/mapa.js"></script>
  
  <!--[if lte IE 6]>

  <link href="css/ieonly.css" rel="stylesheet" type="text/css" />
  <style>
  #topnav ul li ul {
    left: -999em;
    margin-top: 0px;
    margin-left: 0px;
  }
  </style>
    <![endif]-->
  <?php

  ?>

</head>


<body>




<form name="formulario" action="respuestas.php">
<div class="container-fluid">
  <div class="img">
    <img src="logo.png" class="img-fluid" alt="Funvisis">
  </div>
  
  
    <!-- Content here -->
    <h3>ENCUESTA DE INTENSIDAD SÍSMICA
      (REPORTE DE SISMOS SENTIDOS)</h3>
    <p> La siguiente encuesta permitirá calcular la intensidad Sísmica. Si sintió el sismo responda las siguientes preguntas a continuación con la veracidad que corresponde</p>

    
    <div class="datos">
      <h4>INFORMACIÓN PERSONAL</h4>
    
      <div class="input-group mb-3">
        <input type="text" value="fidel alexander" name="nombre" class="form-control" placeholder="Nombre y Apellido" aria-label="First name">
      </div>

      <div class="input-group mb-3">
        <input type="email" value="asdasdad@gmail.com" name="apellido" class="form-control" placeholder="Correo" aria-label="First name">
      </div>
      <div class="input-group mb-3">
        <input type="text" value="09086765654" name="telefono" class="form-control" placeholder="Telefono (Opcional)" aria-label="First name">
      </div>

      <div>
        <p>Fecha: </p>
      </div>
      <div class="input-group mb-3">
        <input type="date" name="fecha" class="form-control" placeholder="fecha" aria-label="First name">
      </div>
      </div>
      <div class="sismo">
        <h4>INFORMACIÓN DEL SISMO SENTIDO</h4>
      

      <?php while ($row = mysqli_fetch_assoc($consulta)) {
        echo "<p>" . $row['pregunta0'] . "</p>";
      ?>
        <div class="input-group mb-3">

          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option name="mfuerte">Muy fuerte</option>
            <option name="fuerte">Fuerte</option>
            <option name="regular">Regular</option>
            <option name="leve">Leve</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta1'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="vibración">Vibración</option>
            <option value="ruido">Ruido</option>
            <option value="balanceo">Balanceo</option>
            <option value="equilibrio">Perdió el equilibrio</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta2']; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="nssintio" name="nssintio">No se sintió </option>
            <option name="apocos">Sentido por pocos </option>
            <option name="muchos">Sentido por muchos </option>
            <option name="todos">Sentido por todos </option>
            <option name="nose">No sé </option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta3']; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="1-10s"> 1 a 10 segundos </option>
            <option value="10-30s"> 10 a 30 segundos </option>
            <option value="30-60s"> 30 a 60 segundos </option>
            <option value="60s"> Mayor a 60 segundos </option>
            <option value="nose"> No sé </option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta4']; ?>
        <div class="input-group mb-3">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; width: 400px;"></textarea>
            <label for="floatingTextarea2">Comentario</label>
          </div>
        </div>
        </div>

        <div class="localidad">
        <h4>AL OCURRIR EL SISMO, USTED SE ENCONTRABA EN</h4>
        <?php echo "<p>" . $row['pregunta5']; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="pais" id="pais" onchange="seleccionpais(this.value)">
            <option selected>Abrir menu de opciones</option>
            <option value="venezuela"> Venezuela </option>
            <option value="0"> Aruba </option>
            <option value="1"> Bonaire </option>
            <option value="2"> Colombia </option>
            <option value="3"> Curaçao </option>
            <option value="4"> Trinidad y Tobago </option>
          </select>
        </div>
        

        <?php echo "<p>" . $row['pregunta6']; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" select name="estados" id="estados" onchange="mostrarMapa(this.value)">

            <option selected>Abrir menu de opciones</option>
            <option value='1_4.300_-65.960_7'>Amazonas</option>
            <option value='2_9.040_-64.340_8'>Anzoategui</option>
            <option value='3_7.180_-68.940_7'>Apure</option>
            <option value='4_10.010_-67.080_8'>Aragua</option>
            <option value='5_8.270_-69.390_7'>Barinas</option>
            <option value='6_6.420_-64.340_7'>Bol&iacute;var</option>
            <option value='7_10.190_-68.010_9'>Carabobo</option>
            <option value='8_9.400_-68.010_8'>Cojedes</option>
            <option value='9_8.690_-61.340_8'>Delta Amacuro</option>
            <option value='10_11.740_-66.000_7'>Depend. Federales</option>
            <option value='11_10.480_-66.950_11'>Dtto. Capital</option>
            <option value='12_11.250_-69.730_8'>Falc&oacute;n</option>
            <option value='13_8.820_-66.510_7'>Gu&aacute;rico</option>
            <option value='14_10.220_-69.450_8'>Lara</option>
            <option value='15_8.630_-71.170_8'>M&eacute;rida</option>
            <option value='16_10.300_-66.400_8'>Miranda</option>
            <option value='17_9.410_-63.030_8'>Monagas</option>
            <option value='18_10.970_-64.070_10'>Nueva Esparta</option>
            <option value='19_9.170_-69.250_8'>Portuguesa</option>
            <option value='20_10.460_-63.270_8'>Sucre</option>
            <option value='21_7.970_-72.050_9'>T&aacute;chira</option>
            <option value='22_9.520_-70.470_9'>Trujillo</option>
            <option value='23_10.580_-66.810_9'>La Guaira</option>
            <option value='24_10.350_-68.690_9'>Yaracuy</option>
            <option value='25_9.950_-71.720_7'>Zulia</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta7']; ?>
        <div class="input-group mb-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16234109.045032343!2d-75.69654498920514!3d6.596417008106777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2853cb36cbd801%3A0xdca0f2587cd54dd3!2sVenezuela!5e0!3m2!1ses!2sve!4v1642293379353!5m2!1ses!2sve" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
          
        </div>

        
        

        <?php echo "<p>" . $row['pregunta8'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="lugar" id="lugar" onchange="mostrarCE(this.value)">
            <option selected>Abrir menu de opciones</option>
            <option value="casa"> En una casa </option>
            <option value="edificio"> En un edificio </option>
            <option value="calle"> En la calle </option>
            <option value="campo"> En el campo </option>
            <option value="vehiculo"> En un vehículo en movimiento </option>
            <option value="otro"> En otro lugar </option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta9'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="consiente" id="consiente" onchange="mostrarD(this.value)">
            <option selected>Abrir menu de opciones</option>
            <option value="despierto"> Despierto </option>
            <option value="dormido"> Dormido y me desperte </option>
            <option value="nodesperte"> Dormido y No me desperte </option>
          </select>
        </div>
        </div>

        <div class="efectos">
        <h4>INDIQUE LOS EFECTOS QUE OBSERVÓ</h4>
        <?php echo "<p>" . $row['pregunta10'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="si">Sí</option>
            <option value="no">No</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta11'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="vibracionc" id="vibracionc" onchange="mostrarobjeto('vibracionc','dncristalesrotos','si')">
            <option selected>Abrir menu de opciones</option>
            <option value="si">Sí </option>
            <option value="no">No</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta12'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No oscilaron</option>
            <option value="ligera">Ligera</option>
            <option value="moderada">Moderada</option>
            <option value="fuerte">Fuerte</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta13'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No oscilaron</option>
            <option value="ligera">Ligera</option>
            <option value="fuerte">Fuerte</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta14'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No oscilaron</option>
            <option value="ligera">Ligera</option>
            <option value="fuerte">Fuerte</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta15'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="si">Sí </option>
            <option value="no">No</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta16'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No se vieron afectados</option>
            <option value="ovolcados">Objetos volcados</option>
            <option value="ligera">Cuadros fuera de lugar</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta17'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No se vieron afectados</option>
            <option value="mligero">Se movieron ligeramente</option>
            <option value="brusco">Se movieron bruscamente</option>
            <option value="volcado">Se volcaron</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta18'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="ligero">Ligera</option>
            <option value="moderado">Moderada</option>
            <option value="fuerte">Fuerte</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta19'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="si">Sí</option>
            <option value="no">No</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta20'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No sonaron</option>
            <option value="pequena">Sonaron campanas pequeñas</option>
            <option value="moderada">Sonaron campanas grandes</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta21'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="eramas" id="eramas" onchange="mostrarobjeto('eramas','dramas','fuerte')">
            <option selected>Abrir menu de opciones</option>
            <option value="pequena">Ligera</option>
            <option value="moderada">Moderada</option>
            <option value="fuerte">Fuerte</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta22'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="ondas">Se generaron ondas</option>
            <option value="aturbia">El agua se tornó turbia</option>
            <option value="arebaso">El agua rebasá las orillas</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta23'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="pozo">Pozos o manantiales secos recobran la afluencia de agua</option>
            <option value="cflujo">Cambios permanentes o temporales en el flujo de agua</option>
            <option value="ctemperatura">Cambios de temperatura</option>
            <option value="cnivel">Cambios a nivel o cota del agua</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta24'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="si">Sí;</option>
            <option value="no">No</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta25'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No</option>
            <option value="poco">Pocas</option>
            <option value="mucha">Muchas</option>
            <option value="na">No aplica</option>
          </select>
        </div>

        <?php echo "<p>" . $row['pregunta26'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="si">Sí</option>
            <option value="no">No</option>
            <option value="na">No aplica</option>
          </select>
        </div>


        <?php echo "<p>" . $row['pregunta27'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No</option>
            <option value="leve">Leve</option>
            <option value="moderado">Moderado o mayor</option>
            <option value="nose">No sé</option>
            <option value="na">No aplica</option>
          </select>
        </div>


        <?php echo "<p>" . $row['pregunta28'] . "</p>"; ?>
        <div class="input-group mb-3">
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Abrir menu de opciones</option>
            <option value="no">No</option>
            <option value="leve">Leve</option>
            <option value="moderado">Moderado o mayor</option>
            <option value="nose">No s&eacute;</option>
            <option value="na">No aplica</option>
            
          </select>
        </div>
        </div>
        <div class="button-click">
        <input type="submit" class="btn btn-outline-primary">
        <button type="button" class="btn btn-outline-danger">Cancelar</button>
        </div>

  </div>
  
<?php } ?>
</form>


<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBTljAqEUJSZdy3XbM7SywUducS6yXrac&sensor=true&libraries=drawing"></script>-->

<!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>