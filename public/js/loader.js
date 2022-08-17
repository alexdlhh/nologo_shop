//Creamos una función para generar un spiner, el cual tendrá una animación que hará una rotación
function spiner(){
    /**
     * Estilos para el spiner
     * debe ser un div con una clase spinner
     * y una clase spinner-loader
     * este debe tener una animación de rotación
     */
    var spinner = $('<div class="spinner"><div class="spinner-loader"></div></div>');
    //Agregamos el spiner a la página
    $('body').append(spinner);
    //añadimos estilos al spiner
    spinner.css({
        'position': 'fixed',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'background': 'rgba(0,0,0,0.5)',
        'z-index': '9999'
    });
    //añadimos estilos al spiner-loader
    spinner.find('.spinner-loader').css({
        'position': 'absolute',
        'top': '50%',
        'left': '50%',
        'transform': 'translate(-50%, -50%)',
        'width': '60px',
        'height': '60px',
        'border': '3px solid #fff',
        'border-radius': '50%',
        'border-top': '3px solid #000',
        'animation': 'rotation 1s linear infinite'
    });
}
function removeSpiner(){
    $('.spinner').remove();
}