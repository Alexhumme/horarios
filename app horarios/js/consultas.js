function consultar(){ // extraer el valor del input y refrecsacar la pagina con el mismo para el metodo get
    ficha = $('input:text[name=ficha]').val()
    window.location.href = 'index.php?ficha='+ficha // pasar el valor de la ficha a la direccion
}

$(document).ready(()=> // cuando el documento este cargado
    {
        $('#btn_consultar').click(()=>{ // cuando des click al elmento con id btn_consultar
        consultar() // ejecuta la consulta
    })   
});

