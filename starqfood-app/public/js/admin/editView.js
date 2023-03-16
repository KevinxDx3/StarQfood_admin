function alternarComponente(actual, siguiente, boton) {
    var componenteActual = document.getElementById(actual);
    var componenteSiguiente = document.getElementById(siguiente);
    var valorOriginalBoton = boton.textContent;
    componenteActual.style.display = 'none';
    componenteSiguiente.style.display = 'block';
    boton.textContent = 'Volver';
    boton.classList.remove('btn-primary');
    boton.classList.add('btn-success');
    boton.setAttribute('onclick', `alternarComponente('${siguiente}', '${actual}', this)`);

    if (valorOriginalBoton !== 'Volver') {
        boton.dataset.valorOriginal = valorOriginalBoton;
    } else {
        valorOriginalBoton = boton.dataset.valorOriginal;
        boton.textContent = valorOriginalBoton;
        boton.classList.remove('btn-success');
        boton.classList.add('btn-primary');
        boton.removeAttribute('data-valor-original');
    }

}
