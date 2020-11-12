<?php 
    require('header.php');
?>



<!DOCTYPE html>
<html>
    <link rel="StyleSheet" href="js/estilo.css">

<body>

<center>
<h2>Nuestro Servicio</h2>
  <div id="resumen" class="recuadro">
        <p>Los nuevos costos de los paquetes de hardsoft quedarán de la siguiente manera:
        Plan Básico, un dispositivo en calidad estándar: 139 pesos, desde 129 pesos.
        Plan Estándar, dos dispositivos en calidad HD: 196 pesos, desde 169 pesos.
        Plan Premium, cuatro dispositivos en calidad UHD: 266 pesos, desde 229 pesos...VER MAS</p>
  </div>

  <div id="info" class="recuadro">
    <p>Los nuevos costos de los paquetes de hardsoft quedarán de la siguiente manera:
        Plan Básico, un dispositivo en calidad estándar: 139 pesos, desde 129 pesos.
        Plan Estándar, dos dispositivos en calidad HD: 196 pesos, desde 169 pesos.
        Plan Premium, cuatro dispositivos en calidad UHD: 266 pesos, desde 229 pesos.</p>
    <p>hardsoft tiene tres planes: Básico, por un valor mensual de $9 dólares, Estándar ($14) y Premium ($18). ¿En qué se traducen estas tarifas en términos de contenido? En nada, porque el catálogo es el mismo para todos.

Las limitaciones se presentan en forma de resolución: el Básico no se transmitirá por encima de una resolución de definición SD, (Standard Definition), mientras que justamente el plan Estándar está restringido al Full HD. Si subes a Premium podrás disfrutar del material en 4K Ultra HD.

Hay otra diferencia notable entre los planes Básico, Estándar y Premium, y esa es la cantidad de personas que pueden usar la misma cuenta a la vez: un solo usuario en la opción más económica, y cuatro la más cara..</p>
  </div>
<center>


<button type="button" onclick="loadDoc()" class="btn btn-secondary" id="origen">Origen</button><br>
<button type="button" onclick="loadDoc2()" class="btn btn-secondary" id="nosotros">nosotros</button>

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("origen").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "origen.txt", true);
        xhttp.send();
    }

  function loadDoc2() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("nosotros").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "nosotros.txt", true);
    xhttp.send();
    }
</script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.js"></script>

</body>
</html>