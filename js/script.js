var i = 0;

function displayPreguntas() {
    contPreguntas = document.getElementById("preguntas");

    pregunta = document.createElement("input");
    palClave = document.createElement("textarea");
    salto = document.createElement("br");

    palClave.setAttribute("placeholder", "Palabras Clave");
    palClave.setAttribute("id", "pc" + i);
    palClave.setAttribute("name", "pc" + i);

    pregunta.setAttribute("type", "text");
    pregunta.setAttribute("placeholder", "Pregunta " + (i + 1));
    pregunta.setAttribute("id", "p" + i);
    pregunta.setAttribute("name", "p" + i);

    contPreguntas.appendChild(pregunta);
    contPreguntas.appendChild(palClave);
    contPreguntas.appendChild(salto);
    i++;
}

function displayRespuestas() {
    
}