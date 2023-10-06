function buscarTabla(){

    const tabla = document.getElementById('tablaDatos');
    const buscarTexto = document.getElementById('search').value.toLowerCase();
    console.log(tabla);
    let total = 0;
    for (let i = 1; i < tabla.rows.length; i++) {
        // Si el td tiene la clase "noSearch" no se busca en su cntenido
        if (tabla.rows[i].classList.contains("noSearch")) {
            continue;
        }

        let encontrado = false;
        const celdaFila = tabla.rows[i].getElementsByTagName('td');
        // console.log('Entra'.i);
        for (let j = 0; j < celdaFila.length && !encontrado; j++) {
            console.log('Entra'.j);
            const compararCon = celdaFila[j].innerHTML.toLowerCase();

            // Buscamos el texto en el contenido de la celda
            if (buscarTexto.length == 0 || compararCon.indexOf(buscarTexto) > -1) {
                encontrado = true;
                total++;
            }
        }

        if (encontrado) {
            tabla.rows[i].style.display = '';
        } else {
            // Si no ha encontrado ninguna coincidencia, esconde lafila de la tabla
            tabla.rows[i].style.display = 'none';
        }        
    }
}