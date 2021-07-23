function selectVisitas(){
    //petición AJAX
    const obj= {
        accion: 'select_visitas'
    };
    $.post(
        "../../includes/_functions.php", 
        obj, 
        function(response){
            let html = ``;
            response.map(function(a,b){
                console.log(a,b);
                var color=""
                if(a.date <=15){
                color = "#E07D07"
                }
                if (a.date <=5) {
                color = "tomato"    
                } 
                html += `
                <tr style="Color:#FFFFFF">
                    <td>${a.cliente}</td>
                    <td>${a.servicio}</td>
                    <td>${a.empleado}</td>
                    <td>${a.registro}</td>
                    
                    <td style="color: ${color}">${a.cita}</td>
                    
                    
                    
                    
                    <td>
                        <a href="#" style="color: yellow" data-id="${a.id}" class="editar">Editar</a> |
                        <a href="#" style="color: tomato" data-id="${a.id}" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                `
            })
            $("#table-visitas tbody").html(html);
        },
        'JSON');

}