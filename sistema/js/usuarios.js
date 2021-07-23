console.log("el uso de JS esta en funcionamiento");
function selectData(respuesta = '') {
    console.log(respuesta)
    const obj = {
        accion: 'tabla_usuarios'
    }
    if(respuesta != ''){
        obj['type'] = respuesta.type
        obj['valor'] = respuesta.valor
        obj['forma'] = respuesta.forma
    }
   
    $.post('../../includes/_functions.php', obj, function(response){
       
       console.log(response);
        let html = ``;
        $("#toptex").html(html);
        if(response == "error"){
            html += `
            <div class="alert alert-warning" role="alert">
                        No se encontro su registro  <strong>"${obj.valor}"</strong>
                    </div>`
                    $("#toptex").html(html);
        }
        else {
        response.map(function(i){
     datosTabla = i;
            html += `    
            <tr>
            <td>${datosTabla.id}</td>
            <td>${datosTabla.nombre}</td>
            <td>${datosTabla.email}</td>
            <td>${datosTabla.password}</td>
            <td>${datosTabla.rango}</td>
            <td>${datosTabla.status}</td>
            <td>
                        <a  href="#" data-id="${datosTabla.id}" class="editar">
                        <div">
                        Editar
                        </div>
                        </a>
                        <a>|</a>
                        <a href="#" data-id="${datosTabla.id}" class="eliminar">
                        <div">
                        Eliminar
                        </div>
                        </a>
                        </td>
            </tr>
  
`
        })
        $("#table-data tbody").html(html);
     }}, 'JSON');
  }


$(document).ready(function(){
selectData();
$('#ordenar').change(function (){
 const valor = $(this).val();
 console.log(valor) 
selectData({type: 'ordenamiento',valor})
})
$('#btnBuscar').click(function(){
    const valor = $('#buscar').val()
     const forma = $('#buscarSelect').val()
     console.log(valor)  
     selectData({type: 'buscar',valor,forma})
})

})

$('#table-data').on('click','.eliminar', function(e) {
    e.preventDefault()
    const id = $(this).data('id')
    const confirmacion = confirm('¿Desea eliminar el registro?');
    let formularioDatos = new FormData()
    formularioDatos.append('accion', 'usuario_eliminar')
    formularioDatos.append('id', id)
  
    if (confirmacion) {
        fetch('../../includes/_functions.php', {
        method: 'POST',
        body: formularioDatos
        
     }) 
     .then((res) => res.json())
     .then((response) => {alert(`${response.tittle}:${response.text}`)
  })
     
  } 
  selectData()  
  
    
})
