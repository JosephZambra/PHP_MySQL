const buscarTabla = () => {

    const tabla = document.getElementById('tablaDatos');
    const buscarTexto = document.getElementById('search').value.toLowerCase();
    
    // Recorremos todas las filas de la tabla
    for (let i = 1; i < tabla.rows.length; i++) {
        
        let encontrado = false;
        const celdaFila = tabla.rows[i].getElementsByTagName('td');
        
        // Recorremos cada celda de la fila
        for (let j = 0; j < celdaFila.length - 1 && !encontrado; j++) {
            const compararCon = celdaFila[j].innerHTML.toLowerCase();

            // Buscamos el texto en el contenido de la celda
            if (buscarTexto.length == 0 || compararCon.indexOf(buscarTexto) > -1) {
                encontrado = true;
            }
        }
        
        // Si hay coincidencia mostramos la fila de la tabla
        if (encontrado) {
            tabla.rows[i].style.display = '';
        } else {
            // Si no ha encontrado ninguna coincidencia, esconde lafila de la tabla
            tabla.rows[i].style.display = 'none';
        }
    }
}