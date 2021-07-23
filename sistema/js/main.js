function toggleForm(button){
    $('.vista').slideUp()
    if($(button).hasClass('closeForm') ){
        $(button).text("insertar").removeClass('closeForm').removeClass('btn-dark')           
        $('.vista:first').slideDown()
    }
    else{
    $(button).text("cerrar").addClass('closeForm').addClass('btn-dark')
    $('.vista:last').slideDown()
    $('#Form')[0].reset();
    $('#btnSubmit').removeData('editar').text('Guardar')
}
}
$(document).ready(function(){

    $('#showform').click(function (e) {
        e.preventDefault(); 
        toggleForm($(this));
    })
})
console.log("main js")