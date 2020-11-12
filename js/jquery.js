let x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
  let x = $("#resumen");
  x.click(ocultar);
}

function ocultar() {
  let x = $("#resumen");
  x.hide("slow", mostrarText);
}

function mostrarText() {
  let x = $("#info");
  x.show("slow");
}

