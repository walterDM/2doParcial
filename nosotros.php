<?php 
    require('header.php');
?>

<!DOCTYPE html>
<html>
<body>

<center>
<h2>Nuestro Servicio</h2>
    <div>
        Los nuevos costos de los paquetes de Netflix quedarán de la siguiente manera:
        Plan Básico, un dispositivo en calidad estándar: 139 pesos, desde 129 pesos.
        Plan Estándar, dos dispositivos en calidad HD: 196 pesos, desde 169 pesos.
        Plan Premium, cuatro dispositivos en calidad UHD: 266 pesos, desde 229 pesos.
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

</body>
</html>